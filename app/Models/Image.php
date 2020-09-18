<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Image extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public static function store(string $imageUrl): self
    {
        // get content
        $imageUrl = trim($imageUrl);
        $imageContent = file_get_contents($imageUrl);
        // get extension
        $pathInfo = pathinfo($imageUrl);
        $imageExtension = $pathInfo['extension'];
        // set name
        $name = Str::random(36) . '.' . $imageExtension;
        $imagePath = "images/{$name}";

        Storage::disk('public')->put($imagePath, $imageContent);

        $imageURL = str_replace(env('APP_URL'), '', Storage::disk('public')->url($imagePath));
        $imageModel = new self([
            'path' => $imagePath,
            'url' => $imageURL
        ]);

        $imageModel->save();
        return $imageModel;
    }
}
