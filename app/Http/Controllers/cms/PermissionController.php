<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Models\Module;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('userManager', new User());
        $data['permissions']  =   Permission::with("module")->get();

        return view("cms.permission.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('superAdmin', new User());
        $data['object']         =   new Permission();
        $data['modules']        =   Module::all()->pluck("name","id")->toArray();
        $data['url']            =   route("cms.permission.store");
        $data['method']         =   "POST";

        return view("cms.permission.form",$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionRequest $request)
    {
        Gate::authorize('superAdmin', new User());
        $duplicatePermission                =   Permission::where(['module_id'=>$request->module_id,'name'=>strtolower($request->name)])->exists();
        if($duplicatePermission){return back()->with("error","Permission already exists");}
        $permission                         =   new Permission();
        $permission->module_id              =   $request->module_id;
        $permission->name                   =   strtolower($request->name);
        $permission->description            =   $request->description;
        $permission->save();

        Session::flash("success","Permission Created");

        return redirect(route("cms.permission.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        Gate::authorize('superAdmin', new User());
        $data['object']     =   Permission::with("module")->find($id);
        if(empty($data['object']))
        {
            Session::flash("error","Permission Already Deleted");
            return back();
        }
        $data['modules']    =   Module::all()->pluck("name","id")->toArray();
        $data['url']        =   route("cms.permission.update",['permission'=>$id]);
        $data['method']     =   "PUT";

        return view("cms.permission.form",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionRequest $request, string $id)
    {
        Gate::authorize('superAdmin', new User());
        $duplicatePermission                =   Permission::where("id","<>",$id)->
        where(['module_id'=>$request->module_id,'name'=>strtolower($request->name)])->exists();
        if($duplicatePermission){return back()->with("error","Permission already exists");}
        $permission                         =   Permission::find($id);
        if(empty($permission))
        {
            Session::flash("error","Permission Already Deleted");
            return redirect(route("cms.permission.index"));
        }

        $permission->module_id              =   $request->module_id;
        $permission->name                   =   strtolower($request->name);
        $permission->description            =   $request->description;
        $permission->update();
        Session::flash("success","Permission Updated");

        return redirect(route("cms.permission.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('superAdmin', new User());
        $permission                         =   Permission::find($id);
        if(empty($permission))
        {
            Session::flash("error","Permission Already Deleted");
            return back();
        }
        $permission->roles()->detach();
        $permission->delete();
        Session::flash("success","Permission Deleted");

        return redirect(route("cms.permission.index"));
    }
}
