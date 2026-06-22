<?php

namespace App\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Jobs\ResizeImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;

class CreateArticleForm extends Component
{
    use WithFileUploads;

    #[Validate('required|min:5')]
    public string $title = '';

    #[Validate('required|min:10')]
    public string $description = '';

    #[Validate('required|numeric')]
    public string $price = '';

    #[Validate('required|exists:categories,id')]
    public string $category_id = '';

    public ?Article $article = null;

    public array $images = [];
    public array $temporary_images = [];

    public function updatedTemporaryImages(): void
     {
         $this->validate([ 'temporary_images' => 'array', 'temporary_images.*' => 'image|max:1024', ]); 
         foreach ($this->temporary_images as $image) { if (count($this->images) >= 6) { break; } 
    $this->images[] = $image; } $this->temporary_images = [];
     }

    public function removeImage(int $key): void
    {
        unset($this->images[$key]);
        $this->images = array_values($this->images);
    }

    public function store()
    { 
        $this->validate();
          $this->article = Article::create([ 
            'title' => $this->title, 
            'description' => $this->description, 
            'price' => (float) $this->price, 
            'category_id' => (int) $this->category_id, 
            'user_id' => Auth::id(), 
            ]); 
            if (count($this->images) > 0) {
                foreach ($this->images as $image) {
                    $newFileName = "articles/{$this->article->id}";
                    $newImage = $this->article->image()->create([
                        'path' => $image->store($newFileName, 'public')]);
                        //1vecchio codice:
                   // dispatch(new ResizeImage($newImage->path, 300, 300));
                    //dispatch(new GoogleVisionSafeSearch($newImage->id));
                    //dispatch(new GoogleVisionLabelImage($newImage->id));
                    //!nuovo codice:
                    RemoveFaces::withChain([
                        new ResizeImage($newImage->path, 300, 300),
                        new GoogleVisionSafeSearch($newImage->id),
                        new GoogleVisionLabelImage($newImage->id),
                    ])->dispatch($newImage->id);
                }
                File::deleteDirectory(storage_path('/app/livewire-tmp'));
            }
            session()->flash('success', 'Article created successfully!'); 
            $this->cleanForm(); 

             }

    protected function cleanForm(): void 
    {
         $this->title = '';
          $this->description = '';
           $this->price = '';
            $this->category_id = '';
             $this->images = [];
              $this->temporary_images = [];
               $this->resetValidation();
                }

    public function render()
    {
        return view('livewire.create-article-form', [
            'categories' => Category::all(),
        ]);
    }
}