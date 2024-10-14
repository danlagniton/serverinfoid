<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\utils\AuthUtils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function index(){
        app(AuthUtils::class)->hasPermission(Auth::user(), 'view_roles_list');

        $roles = Role::all();

        foreach ($roles as $role) {
            $role->permissions;
        }

        return $roles;
    }

    public function show($id){
        app(AuthUtils::class)->hasPermission(Auth::user(), 'view_role');

        $role = Role::findOrFail($id);
        $role->permissions;

        return $role;

    }
}
