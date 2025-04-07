<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\ApiResponse;
use App\Models\Email;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AdminEmailController extends Controller
{
    public function index(): View
    {

        $data = Email::latest('id')->get();
        return view('admin.emails_address.email-index', compact('data'));
    }
    public function save(Request $request)
    {
        $request->validate([
            'name' => ['string', 'required'],
            'email' => ['string', 'required'],
            'department' => ['string', 'required'],
            'status' => ['string', 'required'],

        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'department' => $request->department,
            'active' => $request->status
        ];

        if ($request->id) {
            $table = Email::where('id', $request->id)->update($data);
            $msg = 'Email updated successfully';
        } else {

            $table =  Email::create($data);
            $msg = 'Email saved successfully';
        }

        if ($table) {
            return redirect()->route('admin.email.index')->with('success', $msg);
        } else {
            return back()->with('error', 'Email is not saved');
        }
    }
    public function status($id, $status): JsonResponse
    {
        try {
            Email::where('id', decrypt($id))->update(['status' => $status]);
            return ApiResponse::success(null, 'Status is changed');
        } catch (\Exception $th) {
            return ApiResponse::exception($th);
        }
    }
    function delete($id): JsonResponse
    {
        try {
            Email::where('id', decrypt($id))->delete();
            return ApiResponse::success(null, 'Email delete successfully');
        } catch (\Exception $th) {
            return ApiResponse::exception($th);
        }
    }
    public function send(Request $request)
    {
        $request->validate([
            'to_email' => ['string', 'required'],
            'message' => ['string', 'required'],
            'subject' => ['string', 'required'],
            'type' => ['string', 'required'],

        ]);
        $msg = $request->message;
        Mail::send('emails.email_sent', compact('msg'), function ($message) use ($request) {
            $message->subject($request->subject);
            $message->to($request->to_email, 'Telspiel');
        });
        if ($request->type == 'contact_us') {
            $table = DB::table('contact_page_enquries')->where('id', $request->id)->update(['is_sent' => $request->to_email]);
            $url= 'admin.enquiry.contact-us';
        } elseif ($request->type == 'contact_it') {
            $table = DB::table('every_page_bottom_contact_us_enquries')->where('id', $request->id)->update(['is_sent' => $request->to_email]);
            $url = 'admin.enquiry.contact-it-revolution';
        } else {
            $table = DB::table('career_job_enquries')->where('id', $request->id)->update(['is_sent' => $request->to_email]);
            $url = 'admin.enquiry.job-career';
        }
        if ($table) {
            return redirect()->route($url)->with('success', 'Email is sent');
        } else {
            return back()->with('error', 'Email is not sent');
        }
    }
}
