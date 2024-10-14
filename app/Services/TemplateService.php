<?php

namespace App\Services;

use App\Models\Template;
use App\utils\CollectionUtils;

class TemplateService {

    public function getTemplates($query, $request) {
        $templateName = $request['template_name'];
        $created_by = $request['created_by'];
        $status = $request['status'];

        /* 
            filter using scopes
        */
        if($templateName){
            $query = Template::filterByTemplateName($templateName);
        }

        if($status){
            $query = str_contains(strtolower($status), "inactive") ?
                Template::filterInactiveTemplates() :
                Template::filterActiveTemplates();
        }

        $templates = $query->get();

        /* 
            filter by custom attributes using collection filter
        */
        if($created_by){
            $templates = $templates->filter(function($item) use ($created_by){
                return str_contains(strtolower(data_get($item, 'created_by')), strtolower($created_by));
            });
        }

        /* 
            Global searching
            Used Collection searching instead of scopes to be able to search custom attributes
        */
        $templates = app(CollectionUtils::class)->searchObject($templates, $request['searchKeyword']);    


        /* 
            Sorting and pagination
        */
        $templates = app(CollectionUtils::class)->sortCollection($templates, $request['sortBy'], $request['sortDirection']);

        return app(CollectionUtils::class)->paginate($templates, $request['per_page']);
    }

    public function filterTemplates($request, $templates){
        $templateName = $request['template_name'];
        $created_by = $request['created_by'];
        $status = $request['status'];

        if($templateName){
            $templates = $templates->filter(function($item) use ($templateName){
                return str_contains(strtolower(data_get($item, 'template_name')), strtolower($templateName));
            });
        }
        
        if($created_by){
            $templates = $templates->filter(function($item) use ($created_by){
                return str_contains(strtolower(data_get($item, 'created_by')), strtolower($created_by));
            });
        }
        
        if($status){
            $templates = $templates->filter(function($item) use ($status){
                return str_contains(strtolower(data_get($item, 'status')), strtolower($status));
            });
        }

        return $templates;

    }
}