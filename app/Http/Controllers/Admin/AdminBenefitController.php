<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\ApiResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminBenefitController extends Controller
{
    public function index(): View
    {

        $data = DB::table('integration_benefits')->latest('id')->get();
        return view('admin.integrations.benefits-index', compact('data'));
    }
    public function save(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'one_liner_content' => ['string', 'required'],
            'status' => ['string', 'required'],

        ]);
        if ($request->id) {
            $request->validate([
                'icon' => ['required|file|mimes:jpg,jpeg,png,gif,svg|max:2048'],

            ]);
        }
        $data = [
            'one_liner_content' => $request->one_liner_content,
            'status' => $request->status
        ];

        if ($request->file('icon')) {
            $image = $request->file('icon');
            $name = $image->getClientOriginalName();
            $str = now()->timestamp;
            $image_filename = $user->id . $str . $name;
            $image->move(public_path('/uploads/benefits'), $image_filename);
            $data['icon'] = 'uploads/benefits/' . $image_filename;
        }
        if ($request->id) {
            $table = DB::table('integration_benefits')->where('id', $request->id)->update($data);
            $msg = 'Integration Benefits updated successfully';
        } else {

            $table = DB::table('integration_benefits')->insert($data);
            $msg = 'Integration Benefits saved successfully';
        }

        if ($table) {
            return redirect()->route('admin.integrations.benefits')->with('success', $msg);
        } else {
            return back()->with('error', 'Integration Benefits is not saved');
        }
    }
    public function status($id, $status): JsonResponse
    {
        try {
            DB::table('integration_benefits')->where('id', decrypt($id))->update(['status' => $status]);
            return ApiResponse::success(null, 'Status is changed');
        } catch (\Exception $th) {
            return ApiResponse::exception($th);
        }
    }
    function delete($id): JsonResponse
    {
        try {
            DB::table('integration_benefits')->where('id', decrypt($id))->delete();
            return ApiResponse::success(null, 'Integration Benefits delete successfully');
        } catch (\Exception $th) {
            return ApiResponse::exception($th);
        }
    }
// USP funtions-------------------------------------------------------------------------
    public function uspindex(): View
    {

        $data = DB::table('integration_usp')->latest('id')->get();
        return view('admin.integrations.usp-index', compact('data'));
    }
    public function uspsave(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'title' => ['string', 'required'],
            'short_des' => ['string', 'required'],
            'image_title' => ['string', 'nullable'],
            'image_alt' => ['string', 'nullable'],
            'status' => ['string', 'required'],

        ]);
        if ($request->id) {
            $request->validate([
                'icon' => ['required|file|mimes:jpg,jpeg,png,gif,svg|max:2048'],

            ]);
        }
        $data = [
            'title' => $request->title,
            'short_des' => $request->short_des,
            'image_title' => $request->image_title,
            'image_alt' => $request->image_alt,
            'status' => $request->status
        ];

        if ($request->file('icon')) {
            $image = $request->file('icon');
            $name = $image->getClientOriginalName();
            $str = now()->timestamp;
            $image_filename = $user->id . $str . $name;
            $image->move(public_path('/uploads/usp'), $image_filename);
            $data['icon'] = 'uploads/usp/' . $image_filename;
        }
        if ($request->id) {
            $table = DB::table('integration_usp')->where('id', $request->id)->update($data);
            $msg = 'Integration USP updated successfully';
        } else {

            $table = DB::table('integration_usp')->insert($data);
            $msg = 'Integration USP saved successfully';
        }

        if ($table) {
            return redirect()->route('admin.integrations.usp')->with('success', $msg);
        } else {
            return back()->with('error', 'Integration USP is not saved');
        }
    }
    public function uspstatus($id, $status): JsonResponse
    {
        try {
            DB::table('integration_usp')->where('id', decrypt($id))->update(['status' => $status]);
            return ApiResponse::success(null, 'Status is changed');
        } catch (\Exception $th) {
            return ApiResponse::exception($th);
        }
    }
    function uspdelete($id): JsonResponse
    {
        try {
            DB::table('integration_usp')->where('id', decrypt($id))->delete();
            return ApiResponse::success(null, 'Integration USP delete successfully');
        } catch (\Exception $th) {
            return ApiResponse::exception($th);
        }
    }
}
