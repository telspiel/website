<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\CareerContact;
use Illuminate\Support\Facades\Mail;
class AboutUsController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function company()
    {
        $about_companypage_contents = DB::table('about_companypage_contents')->select('about_companypage_contents.*')->first();
        $about_companypage_headings = DB::table('about_companypage_headings')->select('about_companypage_headings.*')->first();
        $about_companypage_worklife = DB::table('about_companypage_worklife')->select('about_companypage_worklife.*')->where('status','Enable')->get();
        $about_company_testimonials = DB::table('about_company_testimonials')->select('about_company_testimonials.*')->where('status','Enable')->get();
        $about_company_locations = DB::table('about_company_locations')->select('about_company_locations.*')->where('status','Enable')->get();

        if(!$about_companypage_contents){
            return redirect('404');
        }
               
        return view('pages.about.about-company', compact('about_companypage_contents','about_companypage_worklife','about_company_testimonials','about_company_locations','about_companypage_headings'));
    }

    public function resources()
    {
        $about_resourcespage_headings = DB::table('about_resourcespage_headings')->select('about_resourcespage_headings.*')->first();
        $about_resourcespage_media = DB::table('about_resourcespage_media')->select('about_resourcespage_media.*')->where('status','Enable')->get();
        $about_resourcespage_blogs = DB::table('about_resourcespage_blogs')->select('about_resourcespage_blogs.*')->where('status','Enable')->paginate(6);
        $about_resourcespage_webinars = DB::table('about_resourcespage_webinars')->select('about_resourcespage_webinars.*')->where('status','Enable')->get();

        if(!$about_resourcespage_headings){
            return redirect('404');
        }
               
        return view('pages.about.about-resources', compact('about_resourcespage_headings','about_resourcespage_media','about_resourcespage_blogs','about_resourcespage_webinars'));
    }
    
    public function career(Request $request)
    {

        $jobFilter = $request->input('jobs_filter');
        $locationFilter = $request->input('location_filter');

        $about_carrierpage_headings = DB::table('about_carrierpage_headings')->select('about_carrierpage_headings.*')->first();
        $about_carrierpage_jobs = DB::table('about_carrierpage_jobs')->select('about_carrierpage_jobs.*')->where('status','Enable')->get();

        $about_carrier_jobsDetails = DB::table('about_carrier_jobs')
                                    ->select('about_carrier_jobs.*');

        if($jobFilter !=''){
            $about_carrier_jobsDetails = $about_carrier_jobsDetails->where('job_title_id',$jobFilter);
        }
        if($locationFilter !=''){
            $about_carrier_jobsDetails = $about_carrier_jobsDetails->where('location_id',$locationFilter);
        }

        $about_carrier_jobsDetails = $about_carrier_jobsDetails->where('status','Enable')->get();

        $about_carrierpage_locations = DB::table('about_carrierpage_locations')->select('about_carrierpage_locations.*')->where('status','Enable')->get();

        $about_carrierpage_testimonials = DB::table('about_carrierpage_testimonials')->select('about_carrierpage_testimonials.*')->where('status','Enable')->get();

        if(!$about_carrierpage_headings){
            return redirect('404');
        }

        if($jobFilter !=''){
            return view('pages.about.about-career', compact('about_carrierpage_headings','about_carrierpage_jobs','about_carrier_jobsDetails','about_carrierpage_locations','about_carrierpage_testimonials'))->with('section', 'aboutFilterSection');
        }
        if($locationFilter !=''){
            return view('pages.about.about-career', compact('about_carrierpage_headings','about_carrierpage_jobs','about_carrier_jobsDetails','about_carrierpage_locations','about_carrierpage_testimonials'))->with('section', 'aboutFilterSection');
        }
               
        return view('pages.about.about-career', compact('about_carrierpage_headings','about_carrierpage_jobs','about_carrier_jobsDetails','about_carrierpage_locations','about_carrierpage_testimonials'));
    }

    public function store(Request $request)
    {
        try {
            $job_id = 0;
            $location_id = 0;
            if($request->job_id !=''){
                $getIds = DB::table('about_carrier_jobs')
                            ->where('id',$request->job_id)
                            ->first();
                if($getIds){
                    $job_id = $getIds->id;
                    $location_id = $getIds->location_id;
                }
            }
            // Validate the form data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'company_name' => 'required|nullable|string|max:255',
                'message' => 'required|string',
            ]);

            // Save the data to the database
            CareerContact::create([
                'job_id' => $job_id,
                'location_id' => $location_id,
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'company' => $validatedData['company_name'],
                'message' => $validatedData['message'],
            ]);

            $name = $request->name;
            $email = $request->email;
            $phone = $request->phone;
            $company = $request->company_name;
            $message_data = $request->message;
            $toemail = 'vikash.singh@vikalpdevelopment.com';
            // dd($job_id);
            \Mail::send('emails.career_enquiry', compact('name','email','phone','company','message_data','job_id','location_id'), function ($message) use ($toemail) {

                $message->subject('Telspiel: Career Page Enquiry');
                $message->to($toemail,'Telspiel');
                
            });

            // Redirect or return response
            return redirect()->back()->with('success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage())->withInput();
        }
    }
    
    
}
