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
use Symfony\Component\HttpFoundation\JsonResponse;
use Yajra\DataTables\Facades\DataTables;

class AdminArrayExpertiseController extends Controller
{
    public function index(): View
    {
        $ourExpertise = HomePageOurExperties::first();
        return view('admin.homepage.array-expertise',compact('ourExpertise'));
    }
    public function list()
    {
        $data = SolutionSubCategory::orderBy('id','asc')->get();
        return DataTables::of($data)->addColumn('encrypt_id', function ($data) {
            return encrypt($data->id);
        })->make(true);
    }

    public function expertiseSave(Request $request)
    {
        $request->validate([
            'short_title'=>'required|string',
            'title'=>'required|string',
            'detail'=>'required|string',
            'cta_link'=>'required|string',
            'url'=>'required|string',
            'our_expertise_id'=>'required|string'
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
        $str = now()->timestamp;

        $data = [
            'client_name' => $request->client_name,
            'title' => $request->title,
            'status' => $request->status,
            'show_on_home_page_chkbox' => ($request->status == 'Enable') ? 'Yes' : 'No'
        ];
        if ($request->file('logo')) {
            $file = $request->file('logo');
            $name = $file->getClientOriginalName();
            $filename = $user->id . $str . $name;
            $file->move(public_path('/uploads/client_logo'), $filename);
            $data['logo'] = 'uploads/client_logo/' . $filename;
        }
        if ($request->id) {
            $client = HomePageOurExperties::where('id', decrypt($request->id))->update($data);
            $msg = 'Client Brand updated successfully';
        } else {
            $client = HomePageOurExperties::create($data);
            $msg = 'Client Brand saved successfully';
        }
        if ($client) {
            return redirect()->route('admin.home.brands')->with('success', $msg);
        } else {
            return back()->with('error', 'Client logo uploading is failed');
        }
    }

    function delete($id): JsonResponse
    {
        try {
            HomePageOurExperties::where('id', decrypt($id))->delete();
            return ApiResponse::success(null, 'Logo delete successfully');
        } catch (\Exception $th) {
            return ApiResponse::exception($th);
        }
    }
    function status($id, $status): JsonResponse
    {
        try {
            $isshow = ($status == 'Enable') ? 'Yes' : 'No';
            HomePageOurExperties::where('id', decrypt($id))->update(['status' => $status, 'show_on_home_page_chkbox' => $isshow]);
            return ApiResponse::success(null, 'Status is changed');
        } catch (\Exception $th) {
            return ApiResponse::exception($th);
        }
    }
}
