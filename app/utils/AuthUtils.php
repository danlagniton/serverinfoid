<?php

namespace App\utils;

use App\Models\Role;
use Illuminate\Http\Exceptions\HttpResponseException;

class AuthUtils{

    // returns array of permissions
    public function getRolePermissions($user){
        $userRolePermissions = Role::find($user->role->id)->permissions;
        $permissions = [];
        foreach ($userRolePermissions as $permission) {
            array_push($permissions, $permission->permission);
        }

        return $permissions;
    }

    /* 
    * checks if logged in user has permission to do specific action/request
    * throws unauthorized response if user has no permission
    */
    public function hasPermission($user, $permission){
        $userPermissions = $this->getRolePermissions($user); 

        if(!in_array($permission, $userPermissions)){
            throw new HttpResponseException(response('Unauthorized', 401));
        }

    }
}