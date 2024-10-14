<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;


class AuthService {

    public function resetFailedAttempts($user){
        $user->failed_attempts = 0;
        $user->update();
    }

    public function checkIsActive($user){
        if($user->is_active === "false"){
            throw new HttpResponseException(response()->json(['status' => 'error', 'message' => 'Inactive account'], 200));
        }
    }
    
    public function checkIsLocked($user){
        if($user->is_locked === "true"){
            throw new HttpResponseException(response()->json(['status' => 'error', 'message' => 'Locked account'], 200));
        }
    }
    
    public function validateLogin($request){
        $email = $request->email;
        $password = $request->password;
        
        // Check if field is empty
        if(empty($email) or empty($password)){
            throw new HttpResponseException(response()->json(['status' => 'error', 'message' => 'You must fill all the fields'], 200));
        }

        $credentials = request(['email', 'password']);
        
        $user = User::firstWhere('email', $email);
        
        if($user){
            // check if user is inactive
            $this->checkIsActive($user);
            
            // check if user is locked
            $this->checkIsLocked($user);
        }

        // login failed attempt handler
        if (! $token = auth()->setTTL(240)->attempt($credentials)) {
            if($user){
                // increment failed attempts
                $user->failed_attempts = $user->failed_attempts + 1;
                
                // lock account after 3 failed attempts
                if($user->failed_attempts > 2) {
                    $user->is_locked = "true";
                }

                // update user details
                $user->update();
                
                throw new HttpResponseException(response()->json(['status' => 'error', 'message' => 'Invalid credentials'], 200));
            }

            // return email not found if invalid email
            throw new HttpResponseException(response()->json(['status' => 'error', 'message' => 'Email not found'], 200));    
        }

        // reset failed attempts if successful login and return token
        $this->resetFailedAttempts($user);
        return $token;
    }
}