<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Contact;
use App\Models\Project;
use App\Models\Service;
use App\Models\TechnicalSkill;
use App\Traits\EmailSenderTrait;
use Illuminate\Http\Request;

class WebHomeController extends Controller
{
    use EmailSenderTrait;

    public function index()
    {
        $technicalSkills = TechnicalSkill::select('id', 'name', 'level')->orderBy('id', 'DESC')->get();
        $certificates = Certificate::select('id', 'title', 'provider', 'issue_date', 'description', 'image')->orderBy('sort', 'ASC')->get();
        $projects = Project::select('id', 'title', 'slug', 'image', 'category')->where('status', 1)->limit(4)->orderBy('sort', 'ASC')->get();
        $services = Service::select('id', 'title', 'description', 'logo')->where('status', 1)->orderBy('sort', 'ASC')->get();

        return view('index', compact('technicalSkills', 'certificates', 'projects', 'services'));
    }

    public function contactUs(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email',
            'subject' => 'required|string|max:150',
            'message' => 'required|string',
        ]);

        // Store data
        $contact = new Contact();
        $contact->name = $validatedData['name'];
        $contact->email = $validatedData['email'];
        $contact->subject = $validatedData['subject'];
        $contact->message = $validatedData['message'];
        $contact->save();

        // Send Email
        $to = 'sakhawathussainkaka@gmail.com';
        $to_name = 'Sakhawat Hussain';

        $this->sendEmail($to, $to_name, $validatedData['subject'], 'contactus-mail', compact('validatedData'));

        return response()->json([], 200);
    }

    // Project detail page
    public function showProjectDetail($slug)
    {
        $project = Project::where('slug', $slug)->first();

        if ($project) {
            $tags = explode(', ', $project->tags);

            return view('project-detail', compact('project', 'tags'));
        }

        return abort('404');
    }

    public function testSMTP()
    {
        $to = 'john.doe@hotmail.com';
        $to_name = 'John Doe';

        $this->sendEmail($to, $to_name, 'Test SMTP', 'test-mail', ['data' => 'This is a test email']);

        return 'Email sent successfully.';
    }
}
