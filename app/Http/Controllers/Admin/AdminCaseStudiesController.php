<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CaseStudiesRequest;
use App\Library\ApiResponse;
use App\Models\HomePageCaseStudy;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\JsonResponse;
use Yajra\DataTables\Facades\DataTables;

class AdminCaseStudiesController extends Controller
{
    public function index(): View
    {
        $caseTitle = HomePageCaseStudy::first();
        return view('admin.homepage.case-studies-index', compact('caseTitle'));
    }
    public function create($id = null): View
    {
        // $category = DB::table('success_storypage_casestudy')->get();
        $data = null;
        if ($id) {
            $data = DB::table('success_storypage_casestudy')->where('id', decrypt($id))->first();
        }
        return view('admin.homepage.case-studies-create', compact('data'));
    }
    public function list()
    {
        $data = DB::table('success_storypage_casestudy')->orderBy('id', 'asc')->get();
        return DataTables::of($data)->addColumn('encrypt_id', function ($data) {
            return encrypt($data->id);
        })->make(true);
    }

    public function titleSave(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'heading' => 'required|string',
            'case_study_title_id' => 'required|string',
        ]);
        $data = [
            'heading' => $request->heading,
            'title' => $request->title,
        ];

        $client = HomePageCaseStudy::where('id', decrypt($request->case_study_title_id))->update($data);
        $msg = 'Case Studies Title data updated successfully';
        if ($client) {
            return redirect()->route('admin.home.case-studies')->with('success', $msg);
        } else {
            return back()->with('error', 'Case Studies Title data not saved');
        }
    }
    public function save(CaseStudiesRequest $request)
    {

        $user = Auth::user();

        $data = $request->validated();
        if ($request->file('icon')) {
            $str = now()->timestamp;
            $icon = $request->file('icon');
            $icon_name = $icon->getClientOriginalName();
            $filename = $user->id . $str . 'icon'  . $icon_name;
            $icon->move(public_path('/uploads/case_studies'), $filename);
            $data['icon'] = 'uploads/case_studies/' . $filename;
        }
        if ($request->file('image')) {
            $str2 = now()->timestamp;
            $image = $request->file('image');
            $image_name = $icon->getClientOriginalName();
            $filename2 = $user->id . $str2 . $image_name;
            $image->move(public_path('/uploads/case_studies'), $filename2);
            $data['image'] = 'uploads/case_studies/' . $filename2;
        }
        if ($request->id) {
            $table = DB::table('success_storypage_casestudy')->where('id', decrypt($request->id))->update($data);
            $msg = 'Case Studies updated successfully';
        } else {
            $table = DB::table('success_storypage_casestudy')->insert($data);
            $msg = 'Case Studies saved successfully';
        }
        if ($table) {
            return redirect()->route('admin.home.case-studies')->with('success', $msg);
        } else {
            return back()->with('error', 'Case Studies data saved is failed');
        }
    }

    function delete($id): JsonResponse
    {
        try {
            DB::table('success_storypage_casestudy')->where('id', decrypt($id))->delete();
            return ApiResponse::success(null, 'Case Studies Row deleted successfully');
        } catch (\Exception $th) {
            return ApiResponse::exception($th);
        }
    }
    function status($id, $status): JsonResponse
    {
        try {
            DB::table('success_storypage_casestudy')->where('id', decrypt($id))->update(['status' => $status]);
            return ApiResponse::success(null, 'Status is changed');
        } catch (\Exception $th) {
            return ApiResponse::exception($th);
        }
    }
}
