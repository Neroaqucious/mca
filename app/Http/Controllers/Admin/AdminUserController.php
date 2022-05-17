<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $global = [
            'slug' => ['admin','user_list'],
        ];
        $roles = Role::where('status', 1)->get();
        $users = DB::table('users')
                ->select('users.name','users.id','users.email','users.created_at','users.updated_at','roles.name as role_name')
                ->leftJoin('roles', 'roles.id', '=', 'users.role_id')->orderBy('role_id')->paginate(4);

        return view('admin/user/index', compact('global','users','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'userName' => 'required|max:30',
            'userPassword'=>'required|min:8|required_with:confirmPassword|same:confirmPassword',
            'confirmPassword'=>'required|min:8',
            'userEmail' => 'required|min:4|max:30|unique:users,email',
            'userRole' => 'required',
        ],[
            'userName.required' => 'Please fill the name',
            'userEmail.required' => 'Please fill the email address',
            'userEmail.unique' => 'Email address is already exist.',
            'userPassword.required' => 'Please fill the password',
            'userPassword.min' => 'Password must be 8 character long',
            'userPassword.required_with' => 'Password and confirm password must same',
            'confirmPassword.required' => 'Please fill the confirm password',
            'userRole.required' => 'Please file the role'
        ]);

        $userData = [
           'name' => $request->get('userName'),
           'email' => $request->get('userEmail'),
           'password' => Hash::make($request->get('userPassword')),
           'role_id' => $request->get('userRole'),
           'status' => $request->get('status'),
           'created_at' => date('Y-m-d H:i:s'),
        ];

        User::create($userData);
        return redirect()->route('user.index')->with('success','Admin user inserted successfully');    
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
        $global = [
            'slug' => ['admin','user_list'],
        ];
        $roles = Role::where('status', 1)->get();
        $users = User::first('id', $id)->get();
        return view('admin/user/edit', compact('global','users','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
