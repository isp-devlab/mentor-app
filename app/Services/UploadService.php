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
    /**
     * @var string|null
     */
    protected ?string $apiUrl;

    /**
     * @var string|null
     */
    protected ?string $apiToken;

    /**
     * @var string
     */
    protected string $storage;

    protected array $savedFile;

    public function __construct($apiUrl, $apiToken)
    {
        $this->apiUrl = $apiUrl;
        $this->apiToken = $apiToken;
    }

    /**
     * @return $this
     */
    public function api(): UploadService
    {
        $this->storage = 'api';

        return $this;
    }

    /**
     * @return $this
     */
    public function local(): UploadService
    {
        $this->storage = 'local';

        return $this;
    }

    /**
     * @param $file
     * @param $path
     * @return array
     * @throws Exception
     */
    public function save($file, $path): array
    {
        if ($this->storage === 'api') {
            $this->savedFile = $this->uploadApi($file, $path);
        } else {
            $this->savedFile = $this->uploadLocal($file, $path);
        }

        return $this->savedFile;
    }

    public function saveFromUrl($response, $path): array
    {
        $fileExt = explode('/', $response->header('Content-Type'))[1];
        $fileName = Str::random(40) . '_' . uniqid() . '.' . $fileExt;
        $path = $path . $fileName;

        Storage::disk('public')->put($path, $response->body());

        return [
            'originalPath' => $path,
            'storage'      => $this->storage
        ];
    }

    /**
     * @param UploadedFile $file
     * @param string $path
     * @return array
     * @throws Exception
     */
    private function uploadApi(UploadedFile $file, string $path): array
    {
        $endpoint = $this->apiUrl . '/upload?token=' . $this->apiToken;

        try {
            $response = Http::attach(
                'file',
                file_get_contents($file),
                $file->hashName()
            )
                ->attach('path', $path)
                ->post($endpoint);

            if ($response->failed())
                throw new Exception('Failed to upload file');

            return [
                'url'          => $response->json(0),
                'originalPath' => $path,
                'originalName' => $file->getClientOriginalName(),
                'storage'      => 'api'
            ];

        } catch (Throwable $e) {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * @param UploadedFile $file
     * @param string $path
     * @return array
     * @throws Exception
     */
    private function uploadLocal(UploadedFile $file, string $path): array
    {
        try {
            $path = $file->store($path, 'public');

            return [
                'originalPath' => $path,
                'originalName' => $file->getClientOriginalName(),
                'storage'      => 'local'
            ];

        } catch (Throwable $e) {
            throw new Exception($e->getMessage());
        }
    }
}