<?php


namespace Todo\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

abstract class Service
{
    /*
     * Example function although unused,
     * the only purpose I put it here to describe why I have created this class.
     * and how it can be used in near future.
     */

    protected function upload($file, $path, $fileName, $disk = 'public')
    {
        Storage::disk($disk)->put($path, $file, $fileName);
    }

    public abstract function create(Request $request);

    public abstract function update(Request $request);
}
