<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UserProfileRequest;
use App\Models\Department;
use App\Models\Position;
use App\Models\Role;
use App\Models\User;
use App\Services\UserService;
use App\utils\AuthUtils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct(User $model)
	{
		$this->model = $model;
	}

    public function index(Request $request){
        app(AuthUtils::class)->hasPermission(Auth::user(), 'view_users_list');

        $query = $this->model;
        
        /* 
            See getUsers function in UserService class for searching, filtering, 
            sorting, and pagination functions
        */
        $users = app(UserService::class)->getUsers($query, $request);

        return $users;
    }

    public function getUsersCount(){
        $allUsersCount = User::all()->count();
        $uasUsersCount = User::where('is_uas_employee', 'true')->count();
        $guestUsersCount = User::where('is_uas_employee', 'false')->count();

        return ['all_users_count' => $allUsersCount, 'uas_users_count' => $uasUsersCount, 'guest_users_count' => $guestUsersCount];

    }

    public function store(StoreUserRequest $request) {
        try {
            $newUser = new User();
            $user = $this->saveData("POST", $newUser, $request);

            if($user->save()){
                return response()->json(['status' => 'success', 'message' => 'Saved successfully', 'data' => $user]);
            }
            
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);

        }
    }

    public function show($id){

        return User::findOrFail($id)->makeVisible([
                'id',
                'last_name', 
                'first_name', 
                'middle_name', 
                'email',
                'contact_number',
                'address',
                'is_uas_employee',
                'company_name',
                'position_id',
                'position',
                'department_id',
                'department',
                'role_id',
                'role_name',
                'is_active',
                'is_locked',
                'status'
            ])
            ->makeHidden(['permissions']);
    }

    public function getUserContactDetails($id){
        return User::findOrFail($id)->makeVisible([
                'id',
                'full_name',
                'email',
                'contact_number',
                'address',
            ])
            ->makeHidden([
                'permissions',
                'last_name', 
                'first_name', 
                'middle_name', 
                'is_uas_employee',
                'company_name',
                'position_id',
                'position',
                'department_id',
                'department',
                'role_id',
                'role_name',
                'is_active',
                'is_locked',
                'status'
            ]);
    }

    public function update(StoreUserRequest $request, $id){
        try {
            $foundUser = User::findOrFail($id);
            $user = $this->saveData("PUT", $foundUser, $request);

            if($user->update()){
                return response()->json(['status' => 'success', 'message' => 'Saved successfully', 'data' => $user]);
            }
            
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);

        }
    }

    public function updateProfile(UserProfileRequest $request, $id){
        try {
            $foundUser = User::findOrFail($id);
            $foundUser->last_name = $request->last_name;
            $foundUser->first_name = $request->first_name;
            $foundUser->middle_name = $request->middle_name;
            $foundUser->address = $request->address;
            $foundUser->email = $request->email;
            $foundUser->contact_number = $request->contact_number;
            $foundUser->company_name = $request->company_name;

            if($foundUser->update()){
                return response()->json([
                    'status' => 'success', 
                    'message' => 'Saved successfully', 
                    'data' => $foundUser->makeVisible([
                            'address',
                            'email',
                            'contact_number',
                            'is_uas_employee',
                            'company_name',
                            'department',
                            'position',
                            'role_name',
                            'is_active',
                            'is_locked',
                        ])->makeHidden(['permissions'])
                    ]);
            }
            
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);

        }
    }

    public function updateActiveStatus(Request $request, $id){
        try {
            $foundUser = User::findOrFail($id);
            $updatedStatus = $foundUser->is_active === "true" ? "false" : "true";
            // dd($updatedStatus);
            $foundUser->is_active = $foundUser->is_active === "true" ? "false" : "true";
            
            if($foundUser->update()){
                return response()->json(['status' => 'success', 'message' => 'Saved successfully', 'data' => $foundUser]);
            }

        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);

        }
    }
    
    public function updateLockStatus(Request $request, $id){
        try {
            $foundUser = User::findOrFail($id);
            $updatedStatus = $foundUser->is_locked === "true" ? "false" : "true";
            // dd($updatedStatus);
            $foundUser->is_locked = $foundUser->is_locked === "true" ? "false" : "true";
            
            if($foundUser->update()){
                return response()->json(['status' => 'success', 'message' => 'Saved successfully', 'data' => $foundUser]);
            }

        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);

        }
    }

    public function changePassword(Request $request, $id) {
        try {
            $foundUser = User::findOrFail($id);
            $foundUser->password = Hash::make($request->password);

            if($foundUser->update()){
                return response()->json(['status' => 'success', 'message' => 'Saved successfully', 'data' => $foundUser]);
            }
            

        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);

        }
    }

    public function importUsers(Request $request){
        $users = $request->all();
        $newUsers = array();
        $errors = array();

        foreach($users as $user){
            $foundUser = User::firstWhere('email', $user['email']);
            $department = Department::firstWhere('department', $user['department']);
            $position = Position::firstWhere('position', $user['position']);

            $userFullName = $user['first_name'] . " " . $user['last_name'];

            if($foundUser){
                $error_message = "Duplicate entry for " . $userFullName;
                array_push($errors, $error_message);

            } else {
                if($department && $position){
                    /* 
                        check if contact number is valid
                    */
                    if(!$user['contact_number'] || !$this->isDigits($user['contact_number'])){
                
                        $error_message = "Invalid Contact Number for " . $userFullName;
                        array_push($errors, $error_message);
                        
                    } else if(!$user['last_name'] || !$user['first_name'] || !$user['address']) {

                        $error_message = "Missing details for " . $userFullName;
                        array_push($errors, $error_message);
                    
                    } else {
                        $newUser = new User();
                        $newUser->last_name = $user['last_name'];
                        $newUser->first_name = $user['first_name'];
                        $newUser->middle_name = $user['middle_name'];
                        $newUser->address = $user['address'];
                        $newUser->email = $user['email'];
                        $newUser->contact_number = $user['contact_number'];
                        $newUser->is_uas_employee = "true";
                        $newUser->company_name = "Universal Access and Systems Solutions Inc.";
                        $newUser->department_id = $department->id;
                        $newUser->position_id = $position->id;
                        $newUser->is_active = "true";
                        $newUser->is_locked = "false";
                        $newUser->failed_attempts = 0;
                        $newUser->role_id = 3; // default role is Requestor
                        $newUser->password = Hash::make('p@ssw0rd');
        
                        $newUser->save();
            
                        array_push($newUsers, $newUser->full_name);

                    }
    
                } else {
                    if(!$department && !$position){
                        $error_message = "Invalid department and position for " . $userFullName;
                    } else {
                        if(!$department) {
                            $error_message = "Invalid department for " . $userFullName;
                        } else {
                            $error_message = "Invalid position for " . $userFullName;
                        } 
                    }
    
                    array_push($errors, $error_message);
                 }

            }

        }

        $response = [
            'status' => count($errors) > 0 ? "error" : "success",
            'message' => count($errors) > 0 ? "Found invalid data" : "Import Successful",
            'errors' => $errors,
            'imported_users' => $newUsers
        ];

        return $response;
    }

    public function saveData($requestType, $user, $request) {
        $user->last_name = $request->last_name;
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->contact_number = $request->contact_number;
        $user->is_uas_employee = $request->is_uas_employee;
        $user->company_name = $request->company_name;
        $user->department_id = $request->department_id;
        $user->position_id = $request->position_id;
        $user->is_active = $requestType === "POST" ? "true" : $request->is_active;
        $user->is_locked = $requestType === "POST" ? "false" : $request->is_locked;
        $user->failed_attempts = 0;
        $user->role_id = $request->role_id;
        
        if($requestType === "POST") {
            $user->password = Hash::make($request->password);
        }
        return $user;
    }

    function isDigits(string $s, int $minDigits = 8, int $maxDigits = 11): bool {
        return preg_match('/^[0-9]{'.$minDigits.','.$maxDigits.'}\z/', $s);
    }
}
