<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateArticleForm extends Component
{
#[Validate('required|min:5')]
public  string $title;
#[Validate('required|min:10')]
public string $description;
#[Validate('required|numeric')]
public string $price;
#[Validate('required')]
public string $category;
public string $article;

public function save()
{
    $this->validate();

    $this->article = Article::create([
        'title' => $this->title,
        'description' => $this->description,
        'price' => (float) $this->price,
        'category' => $this->category,
        'user_id' => Auth::id(),
    ]);

    Session::flash('success', 'Article created successfully!');

    $this->cleanform();
}

protected function cleanform()
{
    $this->title = '';
    $this->description = '';
    $this->price = '';
    $this->category = '';
}

    public function render()
    {
        return view('livewire.create-article-form', [
            'categories' => Category::all(),
        ]);
    }
}
