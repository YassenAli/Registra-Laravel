<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileUploadService {
    public function upload($file, $directory = 'uploads')
    {
        $extension = $file->extension();
        $filename = uniqid().'_'.bin2hex(random_bytes(8)).'.'.$extension;

        $path = $file->storeAs($directory, $filename, 'public');

        return $filename;
    }
}