<?php

namespace App\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class FileService
{
    public function uploadFile($configKey, $file, $type='image'): string
    {
        $acceptableFileList = config('file.acceptable.'.$type);
        $mediaType          = $file->getClientMimeType();
        if (!array_key_exists($mediaType, $acceptableFileList)) {
            return false;
        }

        $ext    = Arr::get($acceptableFileList, $mediaType);
        $seed     = $configKey.time().rand();
        $postFix = $file->getClientOriginalName();
        $fileName = $this->generateFileName($seed, $postFix, $ext);

        return Storage::putFileAs($configKey, $file, $fileName);
    }

    /**
     * @param string      $seed
     * @param string|null $postFix
     * @param string|null $ext
     *
     * @return string
     */
    private function generateFileName(string $seed, ?string $postFix, ?string $ext): string
    {
        $filename = $seed;
        if (!empty($postFix)) {
            $filename .= '/'.$postFix;
        }
//        if (!empty($ext)) {
//            $filename .= '.'.$ext;
//        }

        return $filename;
    }

    public function delete(string $fileName): bool
    {
        return Storage::delete($fileName);
    }

    public function isImage($fileType)
    {
        if (!array_key_exists($fileType, config('file.acceptable.image'))) {
            return false;
        }

        return true;
    }
}
