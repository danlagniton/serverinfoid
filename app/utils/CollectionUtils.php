<?php

namespace App\utils;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class CollectionUtils {
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function paginate($items, $perPage, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage)->values(), $items->count(), $perPage, $page, $options);
    }

    public function searchObject($items, $searchKeyword){
        if($searchKeyword){
            $filteredItems = collect();
        
            foreach ($items as $item) {
                // $values = array_values($item->getAttributes());
                // $valuesString = implode(",", $values);
                // dd($valuesString);
                if(str_contains(strtolower($item->__toString()), strtolower($searchKeyword))){

                // if(str_contains(strtolower($valuesString), strtolower($searchKeyword))){
                    $filteredItems->push($item);
                }
            }
    
            return $filteredItems;
        }

        return $items;
    }

    public function sortCollection($items, $sortBy, $sortDirection){
        if($sortBy){
            $items = $items->sortBy([
                [$sortBy, $sortDirection]
            ]);
        }

        return $items;
    }

}