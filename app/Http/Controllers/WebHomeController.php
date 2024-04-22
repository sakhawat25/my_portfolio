<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Project;
use App\Models\TechnicalSkill;

class WebHomeController extends Controller
{
    public function index()
    {
        $technicalSkills = TechnicalSkill::select('id', 'name', 'level')->orderBy('id', 'DESC')->get();
        $certificates = Certificate::select('id', 'title', 'provider', 'issue_date', 'description', 'image')->orderBy('sort', 'ASC')->get();
        $projects = Project::select('id', 'title', 'slug', 'image', 'category')->where('status', 1)->limit(4)->orderBy('sort', 'ASC')->get();

        return view('index', compact('technicalSkills', 'certificates', 'projects'));
    }
}
