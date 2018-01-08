<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class FileController extends Controller
{
    //
    /**
     * Upload file
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function upload(Request $request)
    {

        if ($request->file('img')->isValid()) {
            $fileName = $request->file('img')->store('img');
            return Response::format("200", ['imgUrl' =>  '/' . $fileName, 'host' => env('APP_URL') ]);
        }
        return Response::format("404");
    }
}
