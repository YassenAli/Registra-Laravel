<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileUploadService
{
    public function upload(UploadedFile $file)
    {
        // Generate a unique filename
        $filename = time() . '_' . $file->getClientOriginalName();

        // Store the file in the public disk under uploads directory
        $path = $file->storeAs('uploads', $filename, 'public');

        if (!$path) {
            throw new \Exception('Failed to upload file');
        }

        // Return the filename for database storage
        return $filename;
    }
}
