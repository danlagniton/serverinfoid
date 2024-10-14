<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmittedFormRequest;
use App\Models\Role;
use App\Models\SubmittedForm;
use App\Models\Template;
use App\Services\AnswerService;
use App\Services\SendEmailService;
use App\Services\SubmittedFormService;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubmittedFormController extends Controller
{

    public function __construct(SubmittedForm $model)
	{
		$this->model = $model;
	}


    public function index(Request $request) {

        $query = $this->model;

        $submittedForms = app(SubmittedFormService::class)->getSubmittedForms($query, $request, Auth::user());

        return $submittedForms;
    }

    public function getCountByStatus(){
        $statusCounts = app(SubmittedFormService::class)->getCountByStatus(Auth::user());

        return $statusCounts;
        
    }

    public function store(SubmittedFormRequest $request) {
        
        try {
            $templateName = Template::find($request->template_id)->template_name;
            $user = Auth::user();
            $appointmenSchedule = new DateTime($request->appointment_schedule);

            $submittedForm = new SubmittedForm();
            $submittedForm->form_name = $user->last_name . '_' . $templateName . '_' . Carbon::now('UTC')->toDateString(); 
            $submittedForm->template_id = $request->template_id;
            $submittedForm->user_id = $user->id;
            $submittedForm->appointment_schedule = $appointmenSchedule->format('Y-m-d\TH:i:s.u');
            $submittedForm->site_id = $request->site_id;
            $submittedForm->status = "For Approval";
            $submittedForm->approval_date = null;

            if($submittedForm->save()){
                app(AnswerService::class)->saveFormAnswers($request, $submittedForm->id);

                app(SendEmailService::class)->sendFormEmailNotification($submittedForm, $request->method());

                return response()->json(['status' => 'success', 'message' => 'Saved successfully', 'data' => $submittedForm]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);

        }

    }

    public function show($id){
        return SubmittedForm::findOrFail($id);
    }

    public function showWithAnswers($id){
        $submittedForm = SubmittedForm::findOrFail($id);
        $submittedForm->answers;
        $submittedForm->template;
        return $submittedForm;
    }

    public function updateAppointmentSchedule(Request $request, $id){
        try {
            $foundSubmittedForm = SubmittedForm::findOrFail($id);
            $appointmenSchedule = new DateTime($request->appointment_schedule);

            if($foundSubmittedForm->status === "Approved"){
                $foundSubmittedForm->status = "For Approval";
                $foundSubmittedForm->approval_date = null;
            }

            $foundSubmittedForm->appointment_schedule = $request->appointment_schedule; // ->format('Y-m-d\TH:i:s.u')
            
            if($foundSubmittedForm->update()){
                app(SendEmailService::class)->sendFormEmailNotification($foundSubmittedForm, $request->method());

                return response()->json(['status' => 'success', 'message' => 'Saved successfully', 'data' => $foundSubmittedForm]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);

        }
    }

    public function updateStatus(Request $request, $id){
        try {
            $status = $request->status;
            $foundSubmittedForm = SubmittedForm::findOrFail($id);
            $foundSubmittedForm->status = $status;

            if($status === "Approved"){
                $approvedDate = new DateTime();
                $foundSubmittedForm->approval_date = $approvedDate->format('Y-m-d\TH:i:s.u');
            }

            // return $foundSubmittedForm;

            if($foundSubmittedForm->update()){

                app(SendEmailService::class)->sendFormEmailNotification($foundSubmittedForm, $request->method());

                return response()->json(['status' => 'success', 'message' => 'Saved successfully', 'data' => $foundSubmittedForm]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);

        }
    }
}

