<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArrayExpertiseRequest;
use App\Library\ApiResponse;
use Illuminate\Http\Request;
use App\Models\HomePageOurExperties;
use App\Models\SolutionSubCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\JsonResponse;
use Yajra\DataTables\Facades\DataTables;

class AdminArrayExpertiseController extends Controller
{
    public function index(): View
    {
        $ourExpertise = HomePageOurExperties::first();
        return view('admin.homepage.array-expertise', compact('ourExpertise'));
    }
    public function create($id = null): View
    {
        $category = DB::table('solution_main_category')->get();
        $data = null;
        if ($id) {
            $data = SolutionSubCategory::where('id', decrypt($id))->first();
        }
        return view('admin.homepage.array-expertise-create', compact('category', 'data'));
    }
    public function list()
    {
        $data = SolutionSubCategory::orderBy('id', 'asc')->get();
        return DataTables::of($data)->addColumn('encrypt_id', function ($data) {
            return encrypt($data->id);
        })->make(true);
    }

    public function expertiseSave(Request $request)
    {
        $request->validate([
            'short_title' => 'required|string',
            'title' => 'required|string',
            'detail' => 'required|string',
            'cta_link' => 'required|string',
            'url' => 'required|string',
            'our_expertise_id' => 'required|string'
        ]);
        $data = [
            'short_title' => $request->short_title,
            'title' => $request->title,
            'detail' => trim($request->detail),
            'cta_link' => $request->cta_link,
            'url' => $request->url,
        ];

        $client = HomePageOurExperties::where('id', decrypt($request->our_expertise_id))->update($data);
        $msg = 'Array Expertise data updated successfully';
        if ($client) {
            return redirect()->route('admin.home.array-expertise')->with('success', $msg);
        } else {
            return back()->with('error', 'Client data not saved');
        }
    }
    public function save(ArrayExpertiseRequest $request)
    {

        $user = Auth::user();

        $data = [
            'cat_id' => $request->category,
            'title' => $request->title,
            'slug' => $request->slug,
            'link_name' => $request->link_name,
            'banner_cta_name' => $request->banner_cta_name,
            'banner_cta_link' => $request->banner_cta_link,
        ];
        if ($request->file('icon')) {
            $str = now()->timestamp;
            $icon = $request->file('icon');
            $icon_name = $icon->getClientOriginalName();
            $filename = $user->id . $str . 'icon'  . $icon_name;
            $icon->move(public_path('/uploads/expertise'), $filename);
            $data['icon'] = 'uploads/expertise/' . $filename;
        }
        if ($request->file('image')) {
            $str2 = now()->timestamp;
            $image = $request->file('image');
            $image_name = $icon->getClientOriginalName();
            $filename2 = $user->id . $str2 . $image_name;
            $image->move(public_path('/uploads/expertise'), $filename2);
            $data['image'] = 'uploads/expertise/' . $filename2;
        }
        if ($request->id) {
            $client = SolutionSubCategory::where('id', decrypt($request->id))->update($data);
            $msg = 'Array Expertise updated successfully';
        } else {
            $client = SolutionSubCategory::create($data);
            $msg = 'Array Expertise saved successfully';
        }
        if ($client) {
            return redirect()->route('admin.home.array-expertise')->with('success', $msg);
        } else {
            return back()->with('error', 'Client logo uploading is failed');
        }
    }

    function delete($id): JsonResponse
    {
        try {
            SolutionSubCategory::where('id', decrypt($id))->delete();
            return ApiResponse::success(null, 'Array Expertise Row deleted successfully');
        } catch (\Exception $th) {
            return ApiResponse::exception($th);
        }
    }
    function status($id, $status): JsonResponse
    {
        try {
            SolutionSubCategory::where('id', decrypt($id))->update(['status' => $status]);
            return ApiResponse::success(null, 'Status is changed');
        } catch (\Exception $th) {
            return ApiResponse::exception($th);
        }
    }
}
