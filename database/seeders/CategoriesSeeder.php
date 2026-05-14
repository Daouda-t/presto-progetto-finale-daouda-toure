<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    public $categories = [
        'Action',
        'Adventure',
        'Comedy',
        'Crime',
        'Historical',
        'Mystery',
        'Romance',
        'Science Fiction',
        'abbigliamento',
        'elettronica',
        'casa',
        'giardino',
        'sport',
        'giocattoli',
        'automobili',
        'musica',
        'film',
        'libri',
        'videogiochi',
        'moda'
    ];
    
    public function run(): void
    {
        foreach ($this->categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    
    }
}
