<?php

namespace App\Http\Controllers;

use App\Models\Sites;
use Illuminate\Http\Request;

class SitesController extends Controller
{
    public function getSiteOptions() {
        $sites = Sites::orderBy('site_name', 'asc')->get();

        return $sites->makeHidden(['created_at', 'updated_at']);
    }
}
