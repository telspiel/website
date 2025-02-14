<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PresenceRequest;
use App\Library\ApiResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\JsonResponse;
use Yajra\DataTables\Facades\DataTables;

class AdminPresenceController extends Controller
{
    public function index(): View
    {

        return view('admin.about.presence-index');
    }
    public function list()
    {
        $data = DB::table('about_company_locations')->orderBy('id', 'asc')->get();
        return DataTables::of($data)->addColumn('encrypt_id', function ($data) {
            return encrypt($data->id);
        })->make(true);
    }

    public function save(PresenceRequest $request)
    {
        $user = Auth::user();
        $str = now()->timestamp;

        $data = $request->validated();
        if ($request->file('icon')) {
            $file = $request->file('icon');
            $name = $file->getClientOriginalName();
            $filename = $user->id . $str . $name;
            $file->move(public_path('/uploads/presence'), $filename);
            $data['icon'] = 'uploads/presence/' . $filename;
        }
        if ($request->id) {
            $client = DB::table('about_company_locations')->where('id', decrypt($request->id))->update($data);
            $msg = 'Presence data updated successfully';
        } else {
            $client = DB::table('about_company_locations')->insert($data);
            $msg = 'Presence data saved successfully';
        }
        if ($client) {
            return redirect()->route('admin.about.presence')->with('success', $msg);
        } else {
            return back()->with('error', 'Presence data is not updated');
        }
    }

    function delete($id): JsonResponse
    {
        try {
            DB::table('about_company_locations')->where('id', decrypt($id))->delete();
            return ApiResponse::success(null, 'Presence data deleted successfully');
        } catch (\Exception $th) {
            return ApiResponse::exception($th);
        }
    }
    function status($id, $status): JsonResponse
    {
        try {
            DB::table('about_company_locations')->where('id', decrypt($id))->update(['status' => $status]);
            return ApiResponse::success(null, 'Status is changed');
        } catch (\Exception $th) {
            return ApiResponse::exception($th);
        }
    }
}
