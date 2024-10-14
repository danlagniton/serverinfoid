<?php

namespace App\Services;

use App\Models\Role;
use App\Models\SubmittedForm;
use App\Models\User;
use App\utils\CollectionUtils;
use Carbon\Carbon;

class SubmittedFormService {
    

    public function getSubmittedForms($query, $request, $currentUser) {
        $userRole = $currentUser->role_id;
        $user = $request['user'];
        $appointmentDate = $request['appointment_schedule'];
        $status = $request['status'];
        $approvalDate = $request['approval_date'];
        $fromAppointmentDate = $request['from_appointment_date'];
        $toAppointmentDate = $request['to_appointment_date'];
        $fromApprovalDate = $request['from_approval_date'];
        $toApprovalDate = $request['to_approval_date'];

        /* 
            filter using scopes
        */
        if($userRole === Role::IS_REQUESTOR){
            $query = SubmittedForm::filterByRole($currentUser->id);
        }

        if($appointmentDate){
            $appointmentDate = Carbon::createFromDate($appointmentDate);
            $query = SubmittedForm::filterByAppointmentDate($appointmentDate);
        }
        
        if($status){
            $query = SubmittedForm::filterByStatus($status);
        }

        if($approvalDate){
            $approvalDate = Carbon::createFromDate($approvalDate);
            $query = SubmittedForm::filterByApprovalDate($approvalDate);
        }

        if($fromAppointmentDate && $toAppointmentDate){
            // $fromAppointmentDate = Carbon::createFromDate($fromAppointmentDate);
            $fromAppointmentDate = Carbon::createFromFormat('m-d-Y', $fromAppointmentDate);
            // $toAppointmentDate = Carbon::createFromDate($toAppointmentDate)->addDay(1);
            $toAppointmentDate = Carbon::createFromFormat('m-d-Y', $toAppointmentDate)->addDay(1);
            $query = SubmittedForm::filterByAppointmentDateRange($fromAppointmentDate, $toAppointmentDate);
        } else {
            if($fromAppointmentDate) {
                $fromAppointmentDate = Carbon::createFromFormat('m-d-Y', $fromAppointmentDate);
                // $fromAppointmentDate = Carbon::createFromDate($fromAppointmentDate);
                $query = SubmittedForm::filterByGreaterThanAppointmentDate($fromAppointmentDate);
            }
            
            if($toAppointmentDate) {
                $toAppointmentDate = Carbon::createFromFormat('m-d-Y', $toAppointmentDate);
                // $toAppointmentDate = Carbon::createFromDate($toAppointmentDate);
                $query = SubmittedForm::filterByLessThanAppointmentDate($toAppointmentDate);
            }
        }
        
        if($fromApprovalDate && $toApprovalDate){
            $fromApprovalDate = Carbon::createFromFormat('m-d-Y', $fromApprovalDate);
            // $fromApprovalDate = Carbon::createFromDate($fromApprovalDate);
            $toApprovalDate = Carbon::createFromFormat('m-d-Y', $toApprovalDate)->addDay(1);
            // $toApprovalDate = Carbon::createFromDate($toApprovalDate)->addDay(1);
            $query = SubmittedForm::filterByApprovalDateRange($fromApprovalDate, $toApprovalDate);
        } else {
            if($fromApprovalDate) {
                $fromApprovalDate = Carbon::createFromFormat('m-d-Y', $fromApprovalDate);
                // $fromApprovalDate = Carbon::createFromDate($fromApprovalDate);
                $query = SubmittedForm::filterByGreaterThanApprovalDate($fromApprovalDate);
            }
            
            if($toApprovalDate) {
                $toApprovalDate = Carbon::createFromFormat('m-d-Y', $toApprovalDate);
                // $toApprovalDate = Carbon::createFromDate($toApprovalDate);
                $query = SubmittedForm::filterByLessThanApprovalDate($toApprovalDate);
            }
        }
        

        $forms = $query->get();

        /* 
            filter by custom attributes using collection filter
        */
        if($user){
            $forms = $forms->filter(function($item) use ($user){
                return str_contains(strtolower(data_get($item, 'user')), strtolower($user));
            });
        }

        /* 
            Global searching
            Used Collection searching instead of scopes to be able to search custom attributes
        */
        $forms = app(CollectionUtils::class)->searchObject($forms, $request['searchKeyword']);

        /* 
            Sorting and pagination
        */
        $forms = app(CollectionUtils::class)->sortCollection($forms, $request['sortBy'], $request['sortDirection']);

        return app(CollectionUtils::class)->paginate($forms, $request['per_page']);;
    }

    public function getCountByStatus($currentUser){
        $userRole = $currentUser->role_id;
        
        /* 
            filter using scopes
        */
        if($userRole === Role::IS_REQUESTOR){
            $forApprovalCount = SubmittedForm::filterByRole($currentUser->id)->getCountByStatus("For Approval");
            $approvedCount = SubmittedForm::filterByRole($currentUser->id)->getCountByStatus("Approved");
            $rejectedCount = SubmittedForm::filterByRole($currentUser->id)->getCountByStatus("Rejected");
        } else {
            $forApprovalCount = SubmittedForm::getCountByStatus("For Approval");
            $approvedCount = SubmittedForm::getCountByStatus("Approved");
            $rejectedCount = SubmittedForm::getCountByStatus("Rejected");
        }

        return [
            'for_appoval_count' => $forApprovalCount,
            'approved_count' => $approvedCount,
            'rejected_count' => $rejectedCount,
        ];

    }
}