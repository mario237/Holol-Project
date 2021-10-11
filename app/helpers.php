<?php


if (!function_exists('upload')) {
    function upload($fileNameFromRequest, $collection = 'files')
    {
        if (request()->hasFile($fileNameFromRequest)) {
            $file = request()->file($fileNameFromRequest);

            $fileName = time() . '.' . $file->getClientOriginalName();

            request()->$fileNameFromRequest->move(public_path("storage/$collection"), $fileName);

            return "storage/$collection/$fileName";
        }
    }
}



if (!function_exists('get_url')) {
    function get_url($path)
    {
        return url("$path");
    }
}
