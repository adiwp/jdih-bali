<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Setting;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    protected $pageTitle;
    protected $limit = 25;

    public function __construct()
    {
        $this->pageTitle = ' - ' . strip_tags(Setting::where('key', 'appName')->first()->value);
    }

    protected function createImageThumbnail($path, $extension, $width = 440)
    {
        $thumbnail = Str::replace(".{$extension}", "_md.{$extension}", $path);
        if (Storage::disk('public')->exists($path)) {
            $manager = new \Intervention\Image\ImageManager(new \Intervention\Image\Drivers\Gd\Driver());
            $image = $manager->read(storage_path('app/public/' . $path));
            $image->scaleDown(width: $width);
            $image->save(storage_path('app/public/' . $thumbnail));
        }
    }

    protected function createFitImage($path, $extension, $dimension = 285)
    {
        $thumbnail = Str::replace(".{$extension}", "_sq.{$extension}", $path);
        if (Storage::disk('public')->exists($path)) {
            $manager = new \Intervention\Image\ImageManager(new \Intervention\Image\Drivers\Gd\Driver());
            $image = $manager->read(storage_path('app/public/' . $path));
            $image->cover($dimension, $dimension);
            $image->save(storage_path('app/public/' . $thumbnail));
        }
    }

    protected function removeMedia($media)
    {
        if (!empty($media)) {
            $ext            = substr(strrchr($media, '.'), 1);
            $thumbnail      = str_replace(".{$ext}", "_md.{$ext}", $media);
            $cropped        = str_replace(".{$ext}", "_sq.{$ext}", $media);

            if (Storage::disk('public')->exists($media)) {
                Storage::disk('public')->delete($media);
            }

            if (Storage::disk('public')->exists($thumbnail)) {
                Storage::disk('public')->delete($thumbnail);
            }

            if (Storage::disk('public')->exists($cropped)) {
                Storage::disk('public')->delete($cropped);
            }
        }
    }
}
