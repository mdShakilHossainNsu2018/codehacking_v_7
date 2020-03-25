<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use test\Mockery\ArgumentObjectTypeHint;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $roles = Role::pluck('name', 'id')->all();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //

        $input = $request->all();

        if ($file = $request->file('file'))
        {

            $name = time().$file->getClientOriginalName();
            $file->move('image', $name);
            $input['photo_path'] = $name;
            $input['password'] = Hash::make($input['password']);

            User::create($input);

        } else{
            User::create($input);
        }



        return redirect()->to('admin/users');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id')->all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        //


        $input = $request->all();

        if ($file = $request->file('file'))
        {

            $name = time().$file->getClientOriginalName();
            $file->move('images', $name);
            $input['photo_path'] = $name;
            $input['password'] = Hash::make($input['password']);


            User::find($id)->update($input);

        } else{
            User::find($id)->update($input);
        }



        return redirect()->to('admin/users');




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);
        $user->delete();
        unlink(public_path().$user->photo_path);

        return redirect()->to('admin/users')->with('delete_message', 'user deleted!!!');

    }
}
