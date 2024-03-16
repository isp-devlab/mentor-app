<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use InvalidArgumentException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use Throwable;

class UploadService
{
  public static function api()
  {
      return new self();
  }

  public function save($file, $path)
  {
    $apiEndpoint = config('storage.storage_api');

      $fileName = Str::random(20) . '.' . $file->getClientOriginalExtension();

      $response = Http::attach('file', file_get_contents($file->path()), $fileName)
          ->attach('path', $path)
          ->post($apiEndpoint);

      return $response->json(0);
  }
}