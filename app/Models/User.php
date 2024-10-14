<?php

namespace App\Models;

use App\utils\AuthUtils;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;

class User extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject
{
    use Authenticatable, Authorizable, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'last_name',
        'first_name',
        'middle_name',
        'address',
        'email',
        'contact_number',
        'is_uas_employee',
        'company_name',
        'department_id',
        'position_id',
        'is_active',
        'is_locked',
        'failed_attempts',
        'role_id',
        'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be visible in arrays.
     *
     * @var array
     */
    protected $visible = [
        'id',
        'last_name',
        'first_name',
        'middle_name',
        'full_name',
        'permissions',
        'department_id'
    ];

    public function getFullNameAttribute(){
        return $this->first_name . " " . $this->last_name;
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function getPermissionsAttribute(){
        return app(AuthUtils::class)->getRolePermissions($this);
    }

    public function getRoleNameAttribute(){
        return empty($this->role_id) ? null : Role::find($this->role_id)->role;
    }

    public function getPositionAttribute(){
        return empty($this->position_id) ? null : Position::find($this->position_id)->position;
    }
    
    public function getDepartmentAttribute(){
        return empty($this->department_id) ? null : Department::find($this->department_id)->department;
    }

    public function getStatusAttribute(){
        $activeStatus = $this->is_active === "true" ? "Active" : "Inactive"; 
        $lockStatus = $this->is_locked === "true" ? "Locked" : "Open"; 
        return $activeStatus . "-" . $lockStatus;
    }

    protected $appends = ['full_name', 'permissions', 'role_name', 'position', 'department', 'status'];

    /* 
        JWT functions
    */

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return ['user' => $this];
    }

    /* 
        Validation rules
    */
    public const VALIDATION_RULES = [
        'last_name' => ['required'],
        'first_name' => ['required'],
        'address' => ['required'],
        'email' => [
            'required', 
            'unique:users'
        ],
        'contact_number' => ['required'],
        // 'is_uas_employee'
        'company_name' => ['required'],
        'department_id' => ['required'],
        'position_id' => ['required'],
        'role_id' => ['required'],
        'password' => ['required'],
    ];

    public const USER_PROFILE_VALIDATION_RULES = [
        'last_name' => ['required'],
        'first_name' => ['required'],
        'address' => ['required'],
        'email' => [
            'required', 
            'unique:users'
        ],
        'contact_number' => ['required'],
        // 'is_uas_employee'
        'company_name' => ['required']
    ];


    /* 
        Scopes
    */
    public function scopeIsActive($query){
        return $query->where('is_active', "true");
    }

    public function scopeIsInactive($query){
        return $query->where('is_active', "false");
    }

    public function scopeIsLocked($query){
        return $query->where('is_locked', "true");
    }

    public function scopeIsOpen($query){
        return $query->where('is_locked', "false");
    }

    public function scopeSearch($query, $searchKeyword) {        

        return $query->where('last_name', 'like', '%'. $searchKeyword .'%')
                    ->orWhere('first_name', 'like', '%'. $searchKeyword .'%')
                    ->orWhere('middle_name', 'like', '%'. $searchKeyword .'%')
                    ->orWhere('address', 'like', '%'. $searchKeyword .'%')
                    ->orWhere('email', 'like', '%'. $searchKeyword .'%');
    }

    public function scopeFilterByLastName($query, $lastName){
        return $query->where('last_name', 'like', '%'. $lastName .'%');
    }
    
    public function scopeFilterByFirstName($query, $firstName){
        return $query->where('first_name', 'like', '%'. $firstName .'%');
    }
    
    public function scopeFilterByMiddleName($query, $middleName){
        return $query->where('middle_name', 'like', '%'. $middleName .'%');
    }
    
    public function scopeFilterByEmail($query, $email){
        return $query->where('email', 'like', '%'. $email .'%');
    }

    public function scopeIsNurse($query){
        return $query->where('role_id', 2);
    }
}
