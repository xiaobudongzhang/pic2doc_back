<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use Illuminate\Support\Facades\Response;

class PageController extends Controller
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

        Page::create([
            'title' => $request->input('title'),
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
        $lists = Page::get();
        foreach ($lists as &$item) {
            if ($item['pic'])
            {
                $item['pic'] = env('APP_URL') . $item['pic'];
            }
        }

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
        Page::where('id', $request->input('id'))
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
        Page::where('id', $request->input('id'))
            ->delete();

        return Response::format("200");
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function detail(Request $request)
    {

        $info = Page::where('id', $request->input('id'))
            ->first();
        $info['pic'] = $info['pic'] ? env('APP_URL') . $info['pic'] : '';
        return Response::format("200", ['info' => $info]);
    }
}
