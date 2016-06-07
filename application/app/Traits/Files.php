<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait Files
{
    protected $files = null;

    /**
     * @return array|null
     */
    protected function getFilesAttribute()
    {
        if ($this->files === null) {
            $this->files = $this->loadFiles();
        }
        return $this->files;
    }

    /**
     * @return array
     */
    protected function loadFiles()
    {
        $directory = $this->getUploadDirPath();
        try {
            return Storage::disk('uploads')->allFiles($directory);
        } catch (\Exception $e) {
            return [];
        }
    }

    /**
     * @return string
     */
    protected function getUploadDirPath()
    {
        $className = $this->getClassName();
        return $className . '/' . $this->id;
    }

    // TODO: Should not have function here.
    protected function getClassName()
    {
        $reflect = new \ReflectionClass($this);
        return $reflect->getShortName();
    }
}