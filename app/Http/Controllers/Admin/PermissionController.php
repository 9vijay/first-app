<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
   
    public function index(Request $request)
    {
        $permissions = Permission::all();
        return view('admin.permission.index', compact('permissions'));
    }
    public function show(Request $request)
    {
        
        return view('admin.permission.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate(['name'=>'required']);
        Permission::create($validated);
        return to_route('admin.permission.index');
    }

}
