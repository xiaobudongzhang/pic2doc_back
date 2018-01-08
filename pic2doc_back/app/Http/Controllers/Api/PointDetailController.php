<?php

namespace App\Http\Controllers\Api;

use App\PointDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class PointDetailController extends Controller
{
    //
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function replace(Request $request)
    {

        PointDetail::updateOrCreate(
                [
                    'point_id' => $request->input('point_id'),
                    'type_index' => $request->input('type_index')
                ],
                [
                    'point_id' => $request->input('point_id'),
                    'type_index' => $request->input('type_index'),
                    'content' => $request->input('content'),
                ]
            );

        return Response::format("200");
    }
    /**
     * get list
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function lists(Request $request)
    {
        $lists = PointDetail::where('point_id', $request->input('point_id'))->get();
        return Response::format("200", $lists);
    }

    /**
     * detail
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function detail(Request $request)
    {

        $info = PointDetail::where('id', $request->input('id'))
            ->first();
        return Response::format("200", ['info' => $info]);
    }
}
