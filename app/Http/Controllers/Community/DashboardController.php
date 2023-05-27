<?php

namespace App\Http\Controllers\Community;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\AdminUser;
use App\Models\Community;

class DashboardController extends Controller
{
    public function __construct()
    {
        //$this->authorizeResource(Community::class);
    }

    public function index()
    {
        //$this->authorize('view',$Community);
        return Inertia::render('Community/Dashboard',[
            'communities' => auth()->user()->communities
        ]);

    }
    
}
