<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
//    protected $guarded = ['ext', 'path', 'status', 'uid', 'name', 'width', 'height'];
    protected $guarded = [];

    public function imageable()
    {
        return $this->morphTo();
    }

    static function upload_image(\Illuminate\Http\UploadedFile $image, $pid = 0, $class='')
    {
        list($width, $height, $type, $attr) = getimagesize($image->path());
        $destination_path = '/public/images/' . (rand(0, 100) % 100) . '/';
        $uploaded = $image->store($destination_path);
        if (!$uploaded) return;
        $file_info = pathinfo($uploaded);
        $image_data = [
            'ext' => $image->extension(),
            'path' => str_replace('public', '', $file_info['dirname']),
            'status' => 1,
            'uid' => \Illuminate\Support\Facades\Auth::id(),
            'caption' => $image->getClientOriginalName(),
            'name' => $file_info['filename'],
            'width' => $width,
            'height' => $height,
            'size' => $image->getClientSize(),
            'imageable_type' => $class,
            'imageable_id' => $pid,
        ];

        \App\Image::create($image_data);

        $resize = \Intervention\Image\ImageManagerStatic::make($image);
        $resize->resize(1000, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        \Illuminate\Support\Facades\Storage::put("{$destination_path}/lg/{$file_info['filename']}." . $image->extension(), (string)$resize->encode());

        $resize->resize(500, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        \Illuminate\Support\Facades\Storage::put("{$destination_path}/md/{$file_info['filename']}." . $image->extension(), (string)$resize->encode());

        $resize->resize(200, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        \Illuminate\Support\Facades\Storage::put("{$destination_path}/sm/{$file_info['filename']}." . $image->extension(), (string)$resize->encode());
    }

    public static function delete_image($image){
        \Illuminate\Support\Facades\Storage::delete("/public{$image['path']}/{$image['name']}.{$image['ext']}");
        \Illuminate\Support\Facades\Storage::delete("/public{$image['path']}/lg/{$image['name']}.{$image['ext']}");
        \Illuminate\Support\Facades\Storage::delete("/public{$image['path']}/md/{$image['name']}.{$image['ext']}");
        \Illuminate\Support\Facades\Storage::delete("/public{$image['path']}/sm/{$image['name']}.{$image['ext']}");
    }
}