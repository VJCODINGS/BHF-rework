<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PermissionController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware('permission:view permissions', only: ['index']),
            new Middleware('permission:edit permissions', only: ['edit']),
            new Middleware('permission:create permissions', only: ['create']),
            new Middleware('permission:delete permissions', only: ['destroy']),
        ];

    }

    //show permission page
    public function index() {
        $permissions = Permission::orderBy('created_at', 'ASC')->paginate(10);
        return view('Permissions.list', [
            'permissions' => $permissions
        ]);
    }

    //create permission
    public function create() {
        return view('Permissions.create');
    }

    //insert permission in db
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions|min:3'
        ]);

        if ($validator->passes()) {
            Permission::create(['name' => $request->name]);
            return redirect()->route('permissions.index')->with('success', 'Permission added successfully.');
        } else {
            return redirect()->route('permissions.create')->withInput()->withErrors($validator);
        }
    }

    //show edit permission
    public function edit($id) {
        $permission = Permission::findOrFail($id);
        return view('Permissions.edit', [
            'permission' => $permission
        ]);
    }

    //update permisson
    public function update($id, Request $request) {
        $permission = Permission::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions,name,'.$id.',id'
        ]);

        if ($validator->passes()) {
            $permission->name = $request->name;
            $permission->save();
            return redirect()->route('permissions.index')->with('success', 'Permission updated successfully.');
        } else {
            return redirect()->route('permissions.edit', $id)->withInput()->withErrors($validator);
        }
    }

    //delete permission in db
    public function destroy(Request $request) {
        $id = $request->id;

        $permission = Permission::find($id);

        if($permission == null) {
            session()->flash('error', 'Permissoin not found');
            return response()->json([
                'status' => false
            ]);
        }

        $permission->delete();

        session()->flash('success', 'Permissoin deleted successfully.');
        return response()->json([
            'status' => true
        ]);
    }
}
