<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'path',
        
    ];
    public function article() : BelongsTo
    {
        return $this->belongsTo(Article::class);
    }

    protected function casts(): array
    {
        return[
            'labels' => 'array',
        ];
    }

    public static function getUrlByFilePath($filePath, $w = null, $h = null)
    {
        if (!$w && !$h) {
            return Storage::url($filePath);
        }
        $path = dirname($filePath);
        $filename = basename($filePath);
        $file = "{$path}/crop_{$w}_x{$h}_{$filename}";
        return Storage::url($file);
    }

    public function getUrl($w = null, $h = null)
    {
       return self::getUrlByFilePath($this->path, $w, $h);
    }
}
