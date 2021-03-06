<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use Illuminate\Support\Facades\Response;

class ProjectController extends Controller
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

        Project::create([
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
        return Response::format("200", Project::get());
    }
    /**
     * update one item
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function update(Request $request)
    {
        Project::where('id', $request->input('id'))
            ->update(['title' => $request->input('title')]);

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
        Project::where('id', $request->input('id'))
            ->delete();

        return Response::format("200");
    }
}
