<?php

namespace App\Http\Controllers;

use App\Handlers\ImageUploadHandlers;
use App\Http\Requests\UserRequest;
use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except' => ['show']]);
    }
    //
    public function show(Users $user)
    {
        return view("users.show",compact('user'));
    }

    public function edit(Users $user)
    {

        $this->authorize('update',$user);
        return view('users.edit',compact('user'));
    }

    public function update(UserRequest $request, ImageUploadHandlers $upload,Users $user)
    {
        $this->authorize('update',$user);
        $data = $request->all();
        if($request->avatar){
           $result = $upload->save($request->avatar,'avatar',$user->id,362);
           if($result){
               $data['avatar'] = $result['path'];
           }
        }
        $user->update($data);
        return redirect()->route('users.show',$user->id)->with('success','个人资料更新成功');
    }
}
