<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class, 'roles_permissions');
    }

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public const IS_ADMIN = 1;
    public const IS_NURSE = 2;
    public const IS_REQUESTOR = 3;

}
