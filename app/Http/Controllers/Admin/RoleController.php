<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRolesRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function searchView(Request $request)
    {
        $global = [
            'slug' => ['admin','role_list'],
        ];
        $respond = [
            'search' => $request->get('search')
        ];
        $roles = Role::where('name','LIKE',"%{$request->get('search')}%")->paginate(4);
        $pagination = $roles->appends(array(
            "search" => $request->get('search')
        ));
        return view('admin/roles/index', compact('global','respond','roles'));
    }

    public function search(Request $request)
    {
        $global = [
            'slug' => ['admin','role_list'],
        ];
        $respond = [
            'search' => $request->get('search')
        ];
        $roles = Role::where('name','LIKE',"%{$request->get('search')}%")->paginate(4);
        $pagination = $roles->appends(array(
            "search" => $request->get('search')
        ));

        return view('admin/roles/index', compact('global','respond','roles'));
    }

    public function index(Request $request)
    {        
        $global = [
            'slug' => ['admin','role_list'],
        ];
        $roles = Role::latest()->paginate(4);
        return view('admin/roles/index', compact('global','roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect(route('role.index'));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRolesRequest $request)
    {
        Role::create($request->validated());
        return redirect(route('role.index'))->with("success","Your data created successfully.");        
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
            'slug' => ['admin','role_list'],
        ];
        $roles = Role::find($id);
        return view('admin/roles/edit', compact('global','roles'));
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
        request()->validate([
            'name' => 'required|max:20|unique:roles,name,'.$id,
            'status' => 'required'
        ]);

        $preview = Role::find($id);
        $preview->name = $request->get("name");
        $preview->status = $request->get("status");
        $preview->update(); 
        return redirect()->route('role.index')->with('success','Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!empty($id)) {
            Role::where('id', $id)->delete();
            return redirect()->route('role.index')->with('success','Role deleted successfully');
        }        
    }
}
