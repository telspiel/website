<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WorklifeRequest;
use App\Library\ApiResponse;
use App\Models\Client;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\JsonResponse;
use Yajra\DataTables\Facades\DataTables;

class AdminWorklifeController extends Controller
{
    public function index(): View
    {

        return view('admin.about.worklife-index');
    }
    public function list()
    {
        $data = DB::table('about_companypage_worklife')->orderBy('id', 'desc')->get();
        return DataTables::of($data)->addColumn('encrypt_id', function ($data) {
            return encrypt($data->id);
        })->make(true);
    }

    public function save(WorklifeRequest $request)
    {
        $user = Auth::user();
        $str = now()->timestamp;

        $data = $request->validated();
        if ($request->file('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $filename = $user->id . $str . $name;
            $file->move(public_path('/uploads/worklife'), $filename);
            $data['image'] = 'uploads/worklife/' . $filename;
        }
        if ($request->id) {
            $client = DB::table('about_companypage_worklife')->where('id', decrypt($request->id))->update($data);
            $msg = 'Worklife data updated successfully';
        } else {
            $client = DB::table('about_companypage_worklife')->insert($data);
            $msg = 'Worklife data saved successfully';
        }
        if ($client) {
            return redirect()->route('admin.about.worklife')->with('success', $msg);
        } else {
            return back()->with('error', 'Worklife data is not updated');
        }
    }

    function delete($id): JsonResponse
    {
        try {
             DB::table('about_companypage_worklife')->where('id', decrypt($id))->delete();
            return ApiResponse::success(null, 'Worklife data deleted successfully');
        } catch (\Exception $th) {
            return ApiResponse::exception($th);
        }
    }
    function status($id, $status): JsonResponse
    {
        try {
            DB::table('about_companypage_worklife')->where('id', decrypt($id))->update(['status' => $status]);
            return ApiResponse::success(null, 'Status is changed');
        } catch (\Exception $th) {
            return ApiResponse::exception($th);
        }
    }
}
