<?php

namespace App\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class FileService
{
    public function uploadImage($configKey, $file): string
    {
        $acceptableFileList = config('file.acceptable.image');
        $mediaType          = $file->getClientMimeType();
        if (!array_key_exists($mediaType, $acceptableFileList)) {
            return false;
        }

        $ext    = Arr::get($acceptableFileList, $mediaType);
        $seed     = $configKey.time().rand();
        $fileName = $this->generateFileName($seed, null, $ext);

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
        $filename = md5($seed);
        if (!empty($postFix)) {
            $filename .= '_'.$postFix;
        }
        if (!empty($ext)) {
            $filename .= '.'.$ext;
        }

        return $filename;
    }

    public function delete(string $fileName): bool
    {
        return Storage::delete($fileName);
    }
}
