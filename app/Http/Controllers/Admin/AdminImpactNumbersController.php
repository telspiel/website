<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\ApiResponse;
use App\Models\SolutionMainCategory;
use App\Models\SolutionSubCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\JsonResponse;

class AdminImpactNumbersController extends Controller
{
    public function index(): View
    {
        $heading = DB::table('solution_page_headings')->first();
        $logos = DB::table('solution_usecaselogo')->latest('id')->get();
        $usps = DB::table('solution_usp')->latest('id')->get();
        return view('admin.solutions.impact-numbers-index', compact('heading', 'logos', 'usps'));
    }

    public function impactSave(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'subtitle' => 'required|string',
            'shortdesc' => 'required|string',
            'rating' => 'required|string',
            'trustpilot' => 'required|string',
            'cta_name' => 'required|string',
            'cta_link' => 'required|string',
        ]);
        $user = Auth::user();

        $data = [
            'our_impact_title' => $request->title,
            'our_impact_subtitle' => $request->subtitle,
            'our_impact_shortdesc' => $request->shortdesc,
            'our_imapact_rating' => $request->rating,
            'our_imapact_trustpilot' => $request->trustpilot,
            'our_imapact_cta_name' => $request->cta_name,
            'our_imapact_cta_link' => $request->cta_link,
        ];
        if ($request->file('icon')) {
            $str2 = now()->timestamp;
            $icon = $request->file('icon');
            $image_name = $icon->getClientOriginalName();
            $filename = $user->id . $str2 . $image_name;
            $icon->move(public_path('/uploads/impact_number'), $filename);
            $data['our_impact_icon'] = 'uploads/impact_number/' . $filename;
        }
        $client = DB::table('solution_page_headings')->where('id', decrypt($request->impact_number_id))->update($data);
        $msg = 'Impact Number data updated successfully';
        if ($client) {
            return redirect()->route('admin.solutions.impact-numbers')->with('success', $msg);
        } else {
            return back()->with('error', 'Impact Number data not saved');
        }
    }
    public function complianceSave(Request $request)
    {

        if (!$request->id) {
            $request->validate([
                'logo' => 'required|file|mimes:jpg,jpeg,png,gif|max:2048',
                'status' => 'required|string',
            ]);
        }
        $request->validate([
            'image_title' => 'required|string',
            'image_alt' => 'required|string',
            'status' => 'required|string',

        ]);
        $user = Auth::user();

        $data = [
            'image_title' => $request->image_title,
            'image_alt' => $request->image_alt,
            'status' => $request->status
        ];

        if ($request->file('logo')) {
            $str2 = now()->timestamp;
            $icon = $request->file('logo');
            $image_name = $icon->getClientOriginalName();
            $filename = $user->id . $str2 . $image_name;
            $icon->move(public_path('/uploads/compliance'), $filename);
            $data['logo'] = 'uploads/compliance/' . $filename;
        }
        if ($request->id) {
            $client = DB::table('solution_usecaselogo')->where('id', $request->id)->update($data);
            $msg = 'Compliance data updated successfully';
        } else {
            $client = DB::table('solution_usecaselogo')->insert($data);
            $msg = 'Compliance data added successfully';
        }
        if ($client) {
            return redirect()->route('admin.solutions.impact-numbers')->with('success', $msg);
        } else {
            return back()->with('error', 'Compliance data not saved');
        }
    }
    public function uspSave(Request $request)
    {

        if (!$request->id) {
            $request->validate([
                'logo' => 'required|file|mimes:jpg,jpeg,png,gif|max:2048',
                'status' => 'required|string',
            ]);
        }
        $request->validate([
            'title' => 'required|string',
            'short_des' => 'required|string',
            'image_title' => 'nullable|string',
            'image_alt' => 'nullable|string',
            'status' => 'required|string',

        ]);
        $user = Auth::user();

        $data = [
            'title' => $request->title,
            'short_des' => $request->short_des,
            'image_title' => $request->image_title,
            'image_alt' => $request->image_alt,
            'status' => $request->status
        ];

        if ($request->file('icon')) {
            $str2 = now()->timestamp;
            $icon = $request->file('icon');
            $image_name = $icon->getClientOriginalName();
            $filename = $user->id . $str2 . $image_name;
            $icon->move(public_path('/uploads/usp'), $filename);
            $data['icon'] = 'uploads/usp/' . $filename;
        }
        if ($request->id) {
            $client = DB::table('solution_usp')->where('id', $request->id)->update($data);
            $msg = 'USP data updated successfully';
        } else {
            $client = DB::table('solution_usp')->insert($data);
            $msg = 'USP data added successfully';
        }
        if ($client) {
            return redirect()->route('admin.solutions.impact-numbers')->with('success', $msg);
        } else {
            return back()->with('error', 'USP data not saved');
        }
    }

    public function complianceDelete($id): JsonResponse
    {
        try {
            DB::table('solution_usecaselogo')->where('id', decrypt($id))->delete();
            return ApiResponse::success(null, 'Compliance Row deleted successfully');
        } catch (\Exception $th) {
            return ApiResponse::exception($th);
        }
    }
    public function uspDelete($id): JsonResponse
    {
        try {
            DB::table('solution_usp')->where('id', decrypt($id))->delete();
            return ApiResponse::success(null, 'USP Row deleted successfully');
        } catch (\Exception $th) {
            return ApiResponse::exception($th);
        }
    }
    public function status($id, $status): JsonResponse
    {
        try {
            DB::table('solution_usecaselogo')->where('id', decrypt($id))->update(['status' => $status]);
            return ApiResponse::success(null, 'Status is changed');
        } catch (\Exception $th) {
            return ApiResponse::exception($th);
        }
    }
    public function uspStatus($id, $status): JsonResponse
    {
        try {
            DB::table('solution_usp')->where('id', decrypt($id))->update(['status' => $status]);
            return ApiResponse::success(null, 'Status is changed');
        } catch (\Exception $th) {
            return ApiResponse::exception($th);
        }
    }
    public function category(): View
    {
        $mainCategory = SolutionMainCategory::get();
        $subCategory = SolutionSubCategory::latest('id')->with('category_data')->get();
        return view('admin.solutions.category-index', compact('mainCategory', 'subCategory'));
    }
}
