<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTemplateRequest;
use App\Models\Question;
use App\Models\Role;
use App\Models\Template;
use App\Services\TemplateService;
use App\utils\AuthUtils;
use App\utils\CollectionUtils;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;

class TemplateController extends Controller
{

    public function __construct(Template $model)
	{
		$this->model = $model;
	}

    // public function index(Request $request){
    //     app(AuthUtils::class)->hasPermission(Auth::user(), 'view_templates_list');
        
    //     // $templates = Template::all()->makeVisible(['template_name', 'created_by', 'status']);
    //     // $templates = Template::all();
    //     $templates = Template::query()->get();
    //     // return $templates;
        
    //     // search keyword to all fields
    //     $templates = app(CollectionUtils::class)->searchObject($templates, $request['searchKeyword']);    

    //     // filter templates
    //     $templates = app(TemplateService::class)->filterTemplates($request, $templates);

    //     // sort templates
    //     $templates = app(CollectionUtils::class)->sortCollection($templates, $request['sortBy'], $request['sortDirection']);

    //     return app(CollectionUtils::class)->paginate($templates, $request['per_page']);
    // }

    public function index(Request $request){

        $query = $this->model;

        $templates = app(TemplateService::class)->getTemplates($query, $request);

        return $templates;
    }

    public function getActiveTemplates(){
        return Template::getActiveTemplates()
                        ->get()
                        ->makeHidden([
                            'instructions',
                            'form_footer',
                            'user_id',
                            'status',
                            'created_at',
                            'updated_at',
                            'created_by',
                        ]);
    }

    // show questions by template id
    public function getQuestionsByTemplateId($id){
        $questions = Question::where('template_id', $id)->get();

        foreach($questions as $question) {
            $question->subQuestions;
        }

        return $questions;
    }

    public function store(StoreTemplateRequest $request) {
        
        try {
            $template = new Template();
            $template->template_name = $request->template_name;
            $template->instructions = $request->instructions;
            $template->form_footer = $request->form_footer;
            $template->status = "Inactive";
            $template->user_id = Auth::user()->id;

            if($template->save()){
                return response()->json(['status' => 'success', 'message' => 'Saved successfully', 'data' => $template]);
            }

        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);

        }
        
    }

    public function show($id){
        return Template::findOrFail($id);
    }

    public function update(StoreTemplateRequest $request, $id) {
        try {
            $template = Template::findOrFail($id);
            $template->template_name = $request->template_name;
            $template->instructions = $request->instructions;
            $template->form_footer = $request->form_footer;
            $template->status = $request->status;

            if($template->save()){
                return response()->json(['status' => 'success', 'message' => 'Saved successfully', 'data' => $template]);
            }

        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);

        }
    }

    public function updateTemplateStatus($id) {
        try {
            $foundTemplate = Template::findOrFail($id);

            $questionsCount = Question::getQuestionsCountByTemplateId($id);

            $foundTemplate->status = $foundTemplate->status === "Active" ? "Inactive" : "Active";

            if($foundTemplate->status === "Active" && $questionsCount === 0){
                return response()->json(['status' => 'error', 'message' => 'No questions found on template']);
            } else {
                if($foundTemplate->update()){
                    return response()->json(['status' => 'success', 'message' => 'Saved successfully', 'data' => $foundTemplate]);
                }
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function destroy($id) {

        app(AuthUtils::class)->hasPermission(Auth::user(), 'delete_template');

        try {
            $template = Template::findOrFail($id);

            if($template->delete()){
                return response()->json(['status' => 'success', 'message' => 'Deleted successfully']);
            }

        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);

        }
    }

    
}
