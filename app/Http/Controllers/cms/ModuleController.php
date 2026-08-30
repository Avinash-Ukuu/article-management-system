<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModuleRequest;
use App\Models\Module;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('userManager', new User());
        $data['modules']  =   Module::all();

        return view("cms.module.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('superAdmin', new User());
        $data['object']     =   new Module();
        $data['url']        =   route("cms.module.store");
        $data['method']     =   "POST";

        return view("cms.module.form",$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ModuleRequest $request)
    {
        Gate::authorize('superAdmin', new User());
        $module                   =   new Module();
        $module->name             =   $request->name;
        $module->save();

        Session::flash("success","Module Created");

        return redirect(route("cms.module.index"));
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
        $data['object']     =   Module::find($id);
        if(empty($data['object']))
        {
            Session::flash("error","Module Already Deleted");
            return back();
        }
        $data['url']        =   route("cms.module.update",['module'=>$id]);
        $data['method']     =   "PUT";

        return view("cms.module.form",$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ModuleRequest $request, string $id)
    {
        Gate::authorize('superAdmin', new User());
        $module                   =   Module::find($id);
        if(empty($module))
        {
            Session::flash("error","Module Already Deleted");
            return redirect(route("cms.module.index"));
        }

        $module->name             =   $request->name;
        $module->update();
        Session::flash("success","Module Updated");

        return redirect(route("cms.module.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Gate::authorize('superAdmin', new User());
        $module                   =   Module::find($id);
        if(empty($module))
        {
            Session::flash("error","Module Already Deleted");
            return back();
        }

        Permission::where('module_id',$module->id)->delete();
        $module->delete();
        Session::flash("success","Module Deleted");

        return redirect(route("cms.module.index"));
    }
}
