<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileController extends Controller
{
    //
    public  function upload(Request $request): string
    {
        // $pictureSemua = $request->allFiles()
        $picture = $request->file('picture');
        // menyimpan file yang di upload di dalam folder picture dengan nama sama denganyang di upload dan di simpan di folder public
        $picture->storePubliclyAs('pictures',$picture->getClientOriginalName(), 'public');
        return "OK". $picture->getClientOriginalName();
    }
}
