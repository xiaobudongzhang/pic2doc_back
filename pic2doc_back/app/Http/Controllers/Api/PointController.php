<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Point;
use Illuminate\Support\Facades\Response;

class PointController extends Controller
{
    //
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {

        Point::create([
            'point_x' => $request->input('point_x'),
            'point_y' => $request->input('point_y'),
            'page_id' => $request->input('page_id'),
            'create_time' => time(),
        ]);
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
        $lists = Point::where('page_id', $request->input('page_id'))->get();
        return Response::format("200", $lists);
    }
    /**
     * update one item
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function update(Request $request)
    {
        $upItemName ='title';
        if ($request->input('pic'))
        {
            $upItemName ='pic';
        }
        Point::where('id', $request->input('id'))
            ->update([$upItemName => $request->input($upItemName)]);

        return Response::format("200");
    }
    /**
     * delete one item
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function delete(Request $request)
    {
        Point::where('id', $request->input('id'))
            ->delete();

        return Response::format("200");
    }
    /**
     * detail
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function detail(Request $request)
    {

        $info = Point::where('id', $request->input('id'))
            ->first();
        $info['pic'] = $info['pic'] ? env('APP_URL') . $info['pic'] : '';
        return Response::format("200", ['info' => $info]);
    }
}
