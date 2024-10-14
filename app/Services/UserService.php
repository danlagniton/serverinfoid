<?php

namespace App\Services;

use App\Models\User;
use App\utils\CollectionUtils;

class UserService {

    public function getUsers($query, $request){
        $searchKeyword = $request['searchKeyword'];
        $lastName = $request['last_name'];
        $firstName = $request['first_name'];
        $middleName = $request['middle_name'];
        $email = $request['email'];
        $status = $request['status'];
        $userType = $request['userType'];
        
        /* 
        *
        * apply searching and filtering using Eloquent Scope
        * view User.php for searching and filtering syntax
        *
        */

        if($searchKeyword) {
            $isStatusSearch = str_contains(strtolower($searchKeyword), "inactive") || str_contains(strtolower($searchKeyword), "active") ||
                            str_contains(strtolower($searchKeyword), "locked") || str_contains(strtolower($searchKeyword), "open");
            if($isStatusSearch) {
                $query = $this->searchStatus($query, $searchKeyword);
            } else {
                $query = User::search($searchKeyword);
            }

        }

        if($lastName) {
            $query = User::filterByLastName($lastName);
        }
        
        if($firstName) {
            $query = User::filterByFirstName($firstName);
        }
        
        if($middleName) {
            $query = User::filterByMiddleName($middleName);
        }
        
        if($email) {
            $query = User::filterByEmail($email);
        }

        if($status) {
            $query = $this->searchStatus($query, $status);
        }

        /* 
            Customize model attributes to be included in response
        */
        $users = $query->get()
                    ->makeVisible(['id', 'email', 'status'])
                    ->makeHidden(['full_name', 'permissions']);

        /* 
            See CollectionUtils class for sorting and paginate functions
        */
        // $users = app(CollectionUtils::class)->searchObject($users, $searchKeyword);    

        $users = app(CollectionUtils::class)->sortCollection($users, $request['sortBy'], $request['sortDirection']);

        return app(CollectionUtils::class)->paginate($users, $request['per_page']);

    }

    public function searchStatus($query, $keyword){
        if(str_contains(strtolower($keyword), "inactive")) {
            $query = User::isInactive();
        } else if(str_contains(strtolower($keyword), "active")) {
            $query = User::isActive();
        } else if(str_contains(strtolower($keyword), "locked")) {
            $query = User::isLocked();
        } else if(str_contains(strtolower($keyword), "open")) {
            $query = User::isOpen();
        }

        return $query;
    } 
}