<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->post('/api/login', 'AuthController@login');
$router->post('/api/register', 'AuthController@register');
$router->post('/api/forgot-password', 'AuthController@forgotPassword');
$router->post('/api/validate-reset-password-token/{token}', 'AuthController@validateResetPasswordToken');
$router->put('/api/reset-password/{token}', 'AuthController@resetPassword');

$router->group(['prefix' => 'api'], function () use ($router) {

    $router->group(['middleware' => 'auth'], function () use ($router){
        $router->get('/me', 'AuthController@me');
        $router->get('/refresh', 'AuthController@refresh');
        $router->post('/logout', 'AuthController@logout');
        $router->get('/roles', 'RoleController@index');
        $router->get('/roles/{id}', 'RoleController@show');
        $router->put('/update-profile/{id}', 'UserController@updateProfile');

        // user management routes
        $router->group(['prefix' => '/users'], function () use ($router) {
            $router->get('/', 'UserController@index');
            $router->get('/get-users-count', 'UserController@getUsersCount');
            $router->post('/', 'UserController@store');
            $router->get('/{id}', 'UserController@show');
            $router->get('/get-user-contact-details/{id}', 'UserController@getUserContactDetails');
            $router->put('/{id}', 'UserController@update');
            $router->put('/update-active-status/{id}', 'UserController@updateActiveStatus');
            $router->put('/update-lock-status/{id}', 'UserController@updateLockStatus');
            $router->put('/change-password/{id}', 'UserController@changePassword');
            $router->post('/import-users', 'UserController@importUsers');
            // $router->delete('/{id}', 'UserController@destroy');

        });
        
        // department routes
        $router->group(['prefix' => '/departments'], function () use ($router) {
            $router->get('/', 'DepartmentController@index');
            // $router->post('/', 'DepartmentController@store');
            // $router->get('/{id}', 'DepartmentController@show');
            // $router->put('/{id}', 'DepartmentController@update');
            // $router->delete('/{id}', 'DepartmentController@destroy');

        });

        // position routes
        $router->group(['prefix' => '/positions'], function () use ($router) {
            $router->get('/', 'PositionController@index');
            // $router->post('/', 'PositionController@store');
            // $router->get('/{id}', 'PositionController@show');
            // $router->put('/{id}', 'PositionController@update');
            // $router->delete('/{id}', 'PositionController@destroy');

        });

        // templates routes
        $router->group(['prefix' => '/templates'], function () use ($router) {
            $router->get('/', 'TemplateController@index');
            $router->get('/get-active-templates', 'TemplateController@getActiveTemplates');
            $router->post('/', 'TemplateController@store');
            $router->get('/{id}', 'TemplateController@show');
            $router->put('/{id}', 'TemplateController@update');
            $router->put('/update-template-status/{id}', 'TemplateController@updateTemplateStatus');
            $router->delete('/{id}', 'TemplateController@destroy');

            $router->get('/{id}/questions', 'TemplateController@getQuestionsByTemplateId');
        });
        
        // questions routes
        $router->group(['prefix' => '/questions'], function () use ($router) {
            $router->get('/', 'QuestionController@index');
            $router->post('/', 'QuestionController@store');
            $router->get('/{id}', 'QuestionController@show');
            $router->put('/{id}', 'QuestionController@update');
            $router->delete('/{id}', 'QuestionController@destroy');
    
        });
        
        // sub questions routes
        $router->group(['prefix' => '/sub-questions'], function () use ($router) {
            $router->get('/', 'SubQuestionController@index');
            $router->post('/', 'SubQuestionController@store');
            $router->get('/{id}', 'SubQuestionController@show');
            $router->put('/{id}', 'SubQuestionController@update');
            $router->delete('/{id}', 'SubQuestionController@destroy');
    
        });
       
        // sites routes
        $router->group(['prefix' => '/sites'], function () use ($router) {
            $router->get('/site-options', 'SitesController@getSiteOptions');
            // $router->post('/', 'SubQuestionController@store');
            // $router->get('/{id}', 'SubQuestionController@show');
            // $router->put('/{id}', 'SubQuestionController@update');
            // $router->delete('/{id}', 'SubQuestionController@destroy');
    
        });
        
        // submitted forms routes
        $router->group(['prefix' => '/submitted-forms'], function () use ($router) {
            $router->get('/', 'SubmittedFormController@index');
            $router->get('/get-status-count', 'SubmittedFormController@getCountByStatus');
            $router->post('/', 'SubmittedFormController@store');
            $router->get('/{id}', 'SubmittedFormController@show');
            $router->get('/get-with-answers/{id}', 'SubmittedFormController@showWithAnswers');
            $router->put('/update-appointment-schedule/{id}', 'SubmittedFormController@updateAppointmentSchedule');
            $router->put('/update-status/{id}', 'SubmittedFormController@updateStatus');
            // $router->delete('/{id}', 'SubmittedFormController@destroy');
    
        });

    });

});
