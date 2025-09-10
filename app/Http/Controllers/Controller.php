<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

$activeProjects = Project::where('status', 'active')->count();
$completedProjects = Project::where('status', 'completed')->count(); 
$teamMembers = User::where('role', 'employee')->count();

return view('your-view', compact('activeProjects', 'completedProjects', 'teamMembers'));