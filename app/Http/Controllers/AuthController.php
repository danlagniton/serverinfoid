<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\AuthService;
use App\Services\SendNotificationService;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{


    public function login(Request $request) {
        $token = app(AuthService::class)->validateLogin($request);
        
        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        $user = auth()->user()->makeVisible([
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
        ])->makeHidden(['permissions']);
        $user->role;

        return response()->json($user);
    }


    /* 
        Register user
    */
    public function register(Request $request){
        try {
            $newUser = new User();
            $user = app(UserController::class)->saveData("POST", $newUser, $request);

            if($user->save()){
                // $token = app(AuthService::class)->validateLogin($request);
                
                // return app($this->respondWithToken($token));
                return response()->json(['status' => 'success', 'message' => 'Registered successfully', 'data' => $user]);
            }
            
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);

        }
    }

    public function forgotPassword(Request $request){
        $user = User::firstWhere('email', $request->email);

        if($user) {
            $change_password_token = Str::random(10);
            $user->change_password_token = $change_password_token;
            $user->update();

            // app(SendEmailService::class)->sendForgotPasswordEmail($user, $request->clientPort);
            app(SendNotificationService::class)->sendForgotPasswordNotification($request);

            return response()->json(['status' => 'success', 'message' => 'Change password link sent in email']);
        }

        throw new HttpResponseException(response()->json(['status' => 'error', 'message' => 'Email not found'], 200));    
       
    }

    public function validateResetPasswordToken(Request $request, $token){
        $user = User::firstWhere('change_password_token', $token);

        if($user){
            $httpHost = $request->getHttpHost();
            $port = explode(":", $httpHost);
            $host= gethostname();
            $url = "http://" . gethostbyname($host) . ":" . $port[1];
            return response()->json(['status' => 'success', "url" => $url]);
        }

        throw new HttpResponseException(response()->json(['status' => 'error', 'message' => 'Invalid reset password token'], 200));    
        
    }

    public function resetPassword(Request $request, $token){
        $user = User::firstWhere('change_password_token', $token);

        try {
            if($user){
                $user->password = Hash::make($request->password);
    
                if($user->update()){

                    $user->change_password_token = null;
                    $user->update();

                    return response()->json(['status' => 'success', 'message' => 'Password updated successfully']);
                }
    
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);

        }

    }


    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->setTTL(240)->refresh());
    }


    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Login successful',
            'access_token' => $token,
            // 'token_type' => 'bearer',
            // 'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
