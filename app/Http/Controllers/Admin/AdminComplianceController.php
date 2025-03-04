<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\ApiResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminComplianceController extends Controller
{
    public function index(): View
    {

        $data = DB::table('success_storypage_usecaselogo')->latest('id')->get();
        return view('admin.success-stories.compliance-index', compact('data'));
    }
    public function save(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'image_title' => ['string', 'nullable'],
            'image_alt' => ['string', 'nullable'],
            'status' => ['string', 'required'],

        ]);
        if ($request->id) {
            $request->validate([
                'logo' => ['required|file|mimes:jpg,jpeg,png,gif,svg|max:2048'],

            ]);
        }
        $data = [
            'image_title' => $request->image_title,
            'image_alt' => $request->image_alt,
            'status' => $request->status
        ];

        if ($request->file('logo')) {
            $image = $request->file('logo');
            $name = $image->getClientOriginalName();
            $str = now()->timestamp;
            $image_filename = $user->id . $str . $name;
            $image->move(public_path('/uploads/compliance'), $image_filename);
            $data['logo'] = 'uploads/compliance/' . $image_filename;
        }
        if ($request->id) {
            $table = DB::table('success_storypage_usecaselogo')->where('id', $request->id)->update($data);
            $msg = 'Compliance updated successfully';
        } else {

            $table = DB::table('success_storypage_usecaselogo')->insert($data);
            $msg = 'Compliance saved successfully';
        }

        if ($table) {
            return redirect()->route('admin.success-stories.compliance')->with('success', $msg);
        } else {
            return back()->with('error', 'Compliance is not saved');
        }
    }
    public function status($id, $status): JsonResponse
    {
        try {
            DB::table('success_storypage_usecaselogo')->where('id', decrypt($id))->update(['status' => $status]);
            return ApiResponse::success(null, 'Status is changed');
        } catch (\Exception $th) {
            return ApiResponse::exception($th);
        }
    }
    function delete($id): JsonResponse
    {
        try {
            DB::table('success_storypage_usecaselogo')->where('id', decrypt($id))->delete();
            return ApiResponse::success(null, 'Compliance delete successfully');
        } catch (\Exception $th) {
            return ApiResponse::exception($th);
        }
    }
}
