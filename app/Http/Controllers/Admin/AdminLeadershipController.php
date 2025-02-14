<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LeadershipRequest;
use App\Library\ApiResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\JsonResponse;
use Yajra\DataTables\Facades\DataTables;

class AdminLeadershipController extends Controller
{
    public function index(): View
    {

        return view('admin.about.leadership-index');
    }
    public function list()
    {
        $data = DB::table('about_company_testimonials')->orderBy('position', 'asc')->get();
        return DataTables::of($data)->addColumn('encrypt_id', function ($data) {
            return encrypt($data->id);
        })->make(true);
    }

    public function save(LeadershipRequest $request)
    {
        $user = Auth::user();
        $str = now()->timestamp;

        $data = $request->validated();
        if ($request->file('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $filename = $user->id . $str . $name;
            $file->move(public_path('/uploads/leadership'), $filename);
            $data['image'] = 'uploads/leadership/' . $filename;
        }
        if ($request->id) {
            $client = DB::table('about_company_testimonials')->where('id', decrypt($request->id))->update($data);
            $msg = 'Leadership data updated successfully';
        } else {
            $client = DB::table('about_company_testimonials')->insert($data);
            $msg = 'Leadership data saved successfully';
        }
        if ($client) {
            return redirect()->route('admin.about.leadership')->with('success', $msg);
        } else {
            return back()->with('error', 'Leadership data is not updated');
        }
    }

    function delete($id): JsonResponse
    {
        try {
            DB::table('about_company_testimonials')->where('id', decrypt($id))->delete();
            return ApiResponse::success(null, 'Leadership data deleted successfully');
        } catch (\Exception $th) {
            return ApiResponse::exception($th);
        }
    }
    function status($id, $status): JsonResponse
    {
        try {
            DB::table('about_company_testimonials')->where('id', decrypt($id))->update(['status' => $status]);
            return ApiResponse::success(null, 'Status is changed');
        } catch (\Exception $th) {
            return ApiResponse::exception($th);
        }
    }
}
