<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\BottomContact;
use App\Models\ContactUsForm;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $getBanner = DB::table('homepage_banner')->where('status','Enable')->first();
        $Clients = DB::table('Clients')->where('show_on_home_page_chkbox','Yes')->where('status','Enable')->get();
        $success_storypage_casestudy = DB::table('success_storypage_casestudy')->select('success_storypage_casestudy.*')->orderBy('id','DESC')->limit(20)->get();
        $solution_sub_categories = DB::table('solution_sub_categories')->select('solution_sub_categories.*')->limit(5)->get();

        if(!$getBanner){
            return redirect('404');
        }
               
        return view('pages.index', compact('getBanner','Clients','success_storypage_casestudy','solution_sub_categories'));
    }
    public function aboutCmpany()
    {
              
        return view('pages.about-us-company');
    }
    public function solutionPage()
    {
        $solution_main_category = DB::table('solution_main_category')->select('solution_main_category.*')->where('status','Enable')->get();

        if($solution_main_category->isEmpty()){
            return redirect('404');
        }        

        $our_impacts_numbers = DB::table('our_impacts_numbers')
                                    ->select('our_impacts_numbers.*')
                                    ->where('status', 'Enable')
                                    ->orderBy('id', 'DESC')
                                    ->get();
        $solution_usecaselogo = DB::table('solution_usecaselogo')
                                    ->select('solution_usecaselogo.*')
                                    ->where('status', 'Enable')
                                    ->get();
        $solution_usp =         DB::table('solution_usp')
                                    ->select('solution_usp.*')
                                    ->where('status', 'Enable')
                                    ->get();
        $solution_usecasecontent = DB::table('solution_usecasecontent')
                                    ->select('solution_usecasecontent.*')
                                    ->get();

        return view('pages.solutions', compact('solution_main_category','our_impacts_numbers','solution_usecaselogo','solution_usecasecontent','solution_usp'));
    }

    public function solutionSubPageDetails($slug,$subCatId)
    {
        $main_cat = DB::table('solution_main_category')->where('slug',$slug)->value('id');
        $solution_sub_categoriesData = DB::table('solution_sub_categories')
                                    ->select('solution_sub_categories.*')
                                    ->where('cat_id',$main_cat)
                                    ->where('status','Enable');
        
        $solution_main_category = $solution_sub_categoriesData->get();
        $solution_sub_categories = $solution_sub_categoriesData->where('slug',$subCatId)->first();

        if(!isset($solution_sub_categories)){
            return redirect('404');
        } 

        $solutions_category_cardcontent = DB::table('solutions_category_cardcontent')
                                    ->select('solutions_category_cardcontent.*')
                                    ->where('solution_catid',$solution_sub_categories->id)->where('status','Enable')
                                    ->first();

        //table: solutions_purpose_benefits(industry benefits)

        $solutions_benefits = DB::table('solutions_purpose_benefits')
                                    ->select('solutions_purpose_benefits.*')
                                    ->where('services_id',$solution_sub_categories->id)->where('status','Enable')
                                    ->get(); 

        

        if($slug == 'channel-wises'){
            //table: solutions_benefits(channel benefits)
            $solutions_channel_benefits = DB::table('solutions_benefits')
                                    ->select('solutions_benefits.*')
                                    ->where('solution_catid',$solution_sub_categories->id)->where('status','Enable')
                                    ->get(); 
            
            $success_story_casestudy = DB::table('success_storypage_casestudy')
                                    ->select('success_storypage_casestudy.*')
                                    ->where('product_id',$solution_sub_categories->id)
                                    ->where('status','Enable')
                                    ->get();



            return view('pages.solutions-channel', compact('solution_sub_categories','solutions_category_cardcontent','solutions_channel_benefits','main_cat','success_story_casestudy','solution_main_category','slug'));
        } 
        $success_story_casestudy = DB::table('success_storypage_casestudy')
                                    ->select('success_storypage_casestudy.*')
                                    ->whereNotNull('industry_id')
                                    ->where('status','Enable')
                                    ->get();     
        if($slug == 'industry-wise'){

            
            $success_story_casestudy = DB::table('success_storypage_casestudy')
                                    ->select('success_storypage_casestudy.*')
                                    ->where('industry_id',$solution_sub_categories->id)
                                    ->where('status','Enable')
                                    ->get();

            return view('pages.solutions-industry', compact('solution_sub_categories','solutions_category_cardcontent','solutions_benefits','main_cat','solution_main_category','success_story_casestudy','slug'));
        }

        //table: solutions_channel_benefits(purpose benefits)
        $solutions_purpose_benefits = DB::table('solutions_channel_benefits')
                                    ->select('solutions_channel_benefits.*')
                                    ->where('services_id',$solution_sub_categories->id)->where('status','Enable')
                                    ->get(); 
        
        return view('pages.solutions-services', compact('solution_sub_categories','solutions_category_cardcontent','solutions_purpose_benefits','main_cat','success_story_casestudy','solution_main_category','slug'));
    }
    public function integrations()
    {
        $integration_page_headings = DB::table('integration_page_headings')
                                    ->select('integration_page_headings.*')
                                    ->first();
        $integration_banner = DB::table('integration_banner')
                                    ->select('integration_banner.*')
                                    ->first();
        

        if(!isset($integration_page_headings)){
            return redirect('404');
        } 
        $integration_benefits = DB::table('integration_benefits')
                                    ->select('integration_benefits.*')
                                    ->where('status','Enable')
                                    ->get(); 
        $integration_usp = DB::table('integration_usp')
                                    ->select('integration_usp.*')
                                    ->where('status','Enable')
                                    ->get();
        $integration_categories = DB::table('integration_categories')
                                    ->select('integration_categories.*')
                                    ->where('status','Enable')
                                    ->get();
              
        
        return view('pages.integrations', compact('integration_page_headings','integration_usp','integration_benefits','integration_banner','integration_categories'));
    }
    

    public function store(Request $request)
    {
        try {
            // Validate the form data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'ph_no' => 'required|string|max:20',
            ]);

            // Save the data to the database
            BottomContact::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'phone_no' => $validatedData['ph_no'],
            ]);

            $name = $request->name;
            $email = $request->email;
            $phone = $request->ph_no;
            $toemail = 'telspielcommunications@gmail.com';
            // dd($job_id);
            \Mail::send('emails.bottom_contact_enquiry', compact('name','email','phone'), function ($message) use ($toemail) {

                $message->subject('Telspiel: Contact Us Enquiry');
                $message->to($toemail,'Telspiel');
                
            });

            // Redirect or return response
            return redirect()->back()->with('success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            dd($e->getMessage());
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage())->withInput();
        }
    }

    public function successStory(Request $request)
    {
        $success_storypage_headings = DB::table('success_storypage_headings')
                                    ->select('success_storypage_headings.*')
                                    ->first();
        $success_storypage_banners = DB::table('success_storypage_banners')
                                    ->select('success_storypage_banners.*')
                                    ->first();
        

        if(!isset($success_storypage_headings)){
            return redirect('404');
        } 
        $success_storypage_usecaselogo = DB::table('success_storypage_usecaselogo')
                                    ->select('success_storypage_usecaselogo.*')
                                    ->where('status','Enable')
                                    ->get(); 
        $success_storypage_usp = DB::table('success_storypage_usp')
                                    ->select('success_storypage_usp.*')
                                    ->where('status','Enable')
                                    ->get();

        $success_storypage_casestudy = DB::table('success_storypage_casestudy')
                                    ->select('success_storypage_casestudy.*')
                                    ->where('status','Enable');
                                     

        $industry_filter = $request->input('industry_filter');
        $product_filter = $request->input('product_filter');

        if($industry_filter !=''){
            $success_storypage_casestudy = $success_storypage_casestudy->where('industry_id',$industry_filter);
        }
        if($product_filter !=''){
            $success_storypage_casestudy = $success_storypage_casestudy->where('product_id',$product_filter);
        }

        $success_storypage_casestudy = $success_storypage_casestudy->paginate(6);

        $success_storypage_prodId = DB::table('success_storypage_casestudy')
                                    ->select('product_id')
                                    ->where('status', 'Enable')
                                    ->distinct()
                                    ->get();
        $success_storypage_indsId = DB::table('success_storypage_casestudy')
                                    ->select('industry_id')
                                    ->where('status', 'Enable')
                                    ->distinct()
                                    ->get();      
        
        if($industry_filter !=''){
            return view('pages.success-story', compact('success_storypage_headings','success_storypage_usp','success_storypage_usecaselogo','success_storypage_banners','success_storypage_casestudy','success_storypage_prodId','success_storypage_indsId'))->with('section', 'successStorySection');
        }
        if($product_filter !=''){
            return view('pages.success-story', compact('success_storypage_headings','success_storypage_usp','success_storypage_usecaselogo','success_storypage_banners','success_storypage_casestudy','success_storypage_prodId','success_storypage_indsId'))->with('section', 'successStorySection');
        }

        return view('pages.success-story', compact('success_storypage_headings','success_storypage_usp','success_storypage_usecaselogo','success_storypage_banners','success_storypage_casestudy','success_storypage_prodId','success_storypage_indsId'));
    }
    public function successStoryDetails(Request $request,$cta_link)
    {
        $success_storypage_casestudy = DB::table('success_storypage_casestudy')
                                    ->select('success_storypage_casestudy.*')
                                    ->where('cta_url',$cta_link)  
                                    ->where('status','Enable')
                                    ->first();
        

        if(!isset($success_storypage_casestudy)){
            return redirect('404');
        } 

        $success_storypage_casestudyMore = DB::table('success_storypage_casestudy')
                        ->select('success_storypage_casestudy.*')
                        ->where('id','!=',$success_storypage_casestudy->id)
                        ->where(function($query) use ($success_storypage_casestudy) {
                            $query->where('industry_id', $success_storypage_casestudy->industry_id)
                                  ->orWhere('product_id', $success_storypage_casestudy->product_id);
                        })
                        ->where('status', 'Enable')
                        ->paginate(3);

        $sectionId = $request->get('section', 'my-section');

        $about_company_testimonials = DB::table('success_story_testimonials')->select('success_story_testimonials.*')->where('status','Enable')->get();
          // dd($about_company_testimonials);
        $productArray = explode(',', $success_storypage_casestudy->product_used);
        return view('pages.success-story-details', compact('success_storypage_casestudy','productArray','about_company_testimonials','success_storypage_casestudyMore','sectionId'));
    }
    public function contactUs()
    {
        $contact_us_page = DB::table('contact_us_page')->first();
        

        if(!isset($contact_us_page)){
            return redirect('404');
        } 
        return view('pages.contact-us', compact('contact_us_page'));
    }
    public function cmsPages($slug)
    {
        $web_pages = DB::table('web_pages')->where('slug',$slug)->where('status','Enable')->first();
        

        if(!isset($web_pages)){
            return redirect('404');
        } 
        return view('pages.cms-pages', compact('web_pages'));
    }
    public function downoladPdf(Request $request)
    {

        $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255'
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors(),
                'error' => 422,
                'errors' => $validator->errors()
            ]);
        }

        $name = $request->name;
        $email = $request->email;
        $integration_services_content = DB::table('integration_services_content')->where('id',$request->id)->first();
        

        if(!isset($integration_services_content)){
            return response()->json([
                'message' => 'failed',
                'error' => 404,
                'pdf' => ''
            ]);
        } 

        $dataInsert = [
            'content_id' => $request->id,
            'name' => $request->name,
            'email' => $request->email
        ];

        DB::table('integration_download_pdf_data')->insert($dataInsert);

        return response()->json([
                'message' => 'success',
                'error' => 200,
                'pdf' => $integration_services_content->upload_pdf
            ]);
    }

    public function saveData(Request $request)
    {
        try {
            $job_id = 0;
            $location_id = 0;
            // Validate the form data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'company_name' => 'required|nullable|string|max:255',
                'message' => 'required|string',
            ]);

            // Save the data to the database
            ContactUsForm::create([
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
            $toemail = 'telspielcommunications@gmail.com';
            // dd($job_id);
            \Mail::send('emails.career_enquiry', compact('name','email','phone','company','message_data','job_id','location_id'), function ($message) use ($toemail) {

                $message->subject('Telspiel: Career Enquiry');
                $message->to($toemail,'Telspiel');
                
            });

            // Redirect or return response
            return redirect()->back()->with('success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            // dd($e->getMessage());
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage())->withInput();
        }
    }
    
    
}
