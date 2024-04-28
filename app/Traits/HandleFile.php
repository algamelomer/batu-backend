<?php

namespace App\Traits;

use Illuminate\Http\Request;
use App\Traits\CrudOperationsTrait;

trait HandleFile
{
    use CrudOperationsTrait;
    /*
    |--------------------------------------------------------------------------
    | Domain Name
    |--------------------------------------------------------------------------
    */

    // private $DomainName = 'https://batechu.com';
    private $DomainName = 'http://127.0.0.1:8000';

    /*
    |--------------------------------------------------------------------------
    | Upload Files Function
    |--------------------------------------------------------------------------
    */
    public function UploadFiles($file, $name = null, $fileType)
    {
        $folder = '';
        $disk = '';

        switch ($fileType) {
            case 'image':
                $folder = 'images';
                $disk = 'image';
                break;
            case 'video':
                $folder = 'videos';
                $disk = 'video';
                break;
            default:
                $folder = 'files';
                $disk = 'file';
        }

        return $this->uploadFile($file, $name, $folder, $disk);
    }

    /*
    |--------------------------------------------------------------------------
    | Upload File Function
    |--------------------------------------------------------------------------
    */
    private function uploadFile($uploadedFile, $name, $folder, $disk)
    {
        $randomName = uniqid();
        $fileName = ($name ?? pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME)) . '_' . $randomName;
        $extension = $uploadedFile->getClientOriginalExtension();
        $fileFullName = $fileName . '.' . $extension;
        $domain = $this->DomainName;
        $path = $uploadedFile->storeAs($folder, $fileFullName, $disk);
        $fullPath = $domain . '/assets/' . $path;
        return $fullPath;
    }

    /*
    |--------------------------------------------------------------------------
    | Create File Function
    |--------------------------------------------------------------------------
    */
    public function createFile(Request $request, $input, $fileName, $type)
    {
        if ($request->hasFile($input)) {
            return $this->UploadFiles($request->file($input), $fileName, $type);
        } else {
            return $request->input($input);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Update File Function
    |--------------------------------------------------------------------------
    */
    public function updateFile(Request $request, $input, $currentPath, $fileName, $type)
    {
        if ($request->hasFile($input)) {
            $this->deleteFile($currentPath);
            return $this->UploadFiles($request->file($input), $fileName, $type);
        } else {
            if ($request->$input !== $currentPath) {
                return $request->$input;
            } else {
                return $currentPath;
            }
        }
    }

    /*
    |--------------------------------------------------------------------------
    | save Image Social Function
    |--------------------------------------------------------------------------
    */
    public function imageSocial($socialName)
    {
        $socialPath = [
            'Facebook' => '/assets/default/facebook_icon.png',
            'Instagram' => '/assets/default/instagram_icon.png',
            'X' => '/assets/default/x_icon.png',
            'LinkedIN' => '/assets/default/linkedin_icon.png',
            'GitHub' => '/assets/default/github_icon.png'
        ];

        if (array_key_exists($socialName, $socialPath)) {
            return $this->DomainName . $socialPath[$socialName];
        }

        return null;
    }

}
