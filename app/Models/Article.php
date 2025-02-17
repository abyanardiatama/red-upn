<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRichTextImages($content)
    {
        preg_match_all('/<img[^>]+src="([^"]+)"/i', $content, $matches);
        
        if (!isset($matches[1])) {
            return [];
        }

        return array_map(function ($url) {
            // Pastikan hanya mengambil bagian setelah '/storage/'
            if (str_contains($url, '/storage/article_images/uploads/')) {
                return str_replace('/storage/', '', $url);
            }
            return null;
        }, $matches[1]);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($article) {
            // Ambil gambar dari body artikel sebelum dihapus
            $images = array_filter($article->getRichTextImages($article->body)); // Hapus nilai null

            // Hapus gambar yang tersimpan di storage
            foreach ($images as $image) {
                Storage::disk('public')->delete($image);
            }
        });

        static::updating(function ($article) {
            // Ambil gambar sebelum update
            $oldImages = array_filter($article->getRichTextImages($article->getOriginal('body')));
            // Ambil gambar setelah update
            $newImages = array_filter($article->getRichTextImages($article->body));

            // Cari gambar yang dihapus dari body
            $deletedImages = array_diff($oldImages, $newImages);

            // Hapus hanya gambar yang sudah tidak digunakan
            foreach ($deletedImages as $image) {
                Storage::disk('public')->delete($image);
            }
        });
    }

}
