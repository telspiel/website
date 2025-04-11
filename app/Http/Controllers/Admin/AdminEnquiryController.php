<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Email;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class AdminEnquiryController extends Controller
{
    public function contactusIndex() : View {
        $emails = Email::latest('id')->where('active', 1)->get();
        return view('admin.enquries.contact-us-index',compact('emails'));
    }
    public function contactusList() {
        $data= DB::table('contact_page_enquries')->orderBy('id','desc')->get();
        return DataTables::of($data)->make(true);

    }
    public function itrevolutionIndex() : View {
        $emails = Email::latest('id')->where('active', 1)->get();
        return view('admin.enquries.contact-it-index', compact('emails'));
    }
    public function itrevolutionList() {
        $data= DB::table('every_page_bottom_contact_us_enquries')->orderBy('id','desc')->get();
        return DataTables::of($data)->make(true);

    }
    public function jobCareerIndex() : View {
        $emails = Email::latest('id')->where('active',1)->get();
        return view('admin.enquries.career-enquiry-index', compact('emails'));
    }
    public function jobCareerList()
    {
        $data = DB::table('career_job_enquries')->orderBy('id', 'desc')->get();
        return DataTables::of($data)->make(true);
    }
}
