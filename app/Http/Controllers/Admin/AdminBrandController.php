<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Library\ApiResponse;
use App\Models\Client;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\TryCatch;
use Symfony\Component\HttpFoundation\JsonResponse;
use Yajra\DataTables\Facades\DataTables;

class AdminBrandController extends Controller
{
    public function index(): View
    {

        return view('admin.homepage.Brands-that-trust-telspiel');
    }
    public function list()
    {
        $data = Client::orderBy('id', 'desc')->get();
        return DataTables::of($data)->addColumn('encrypt_id', function ($data) {
            return encrypt($data->id);
        })->make(true);
    }

    public function save(ClientRequest $request)
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
            $client = Client::where('id', decrypt($request->id))->update($data);
            $msg = 'Client Brand updated successfully';
        } else {
            $client = Client::create($data);
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
            Client::where('id', decrypt($id))->delete();
            return ApiResponse::success(null, 'Logo delete successfully');
        } catch (\Exception $th) {
            return ApiResponse::exception($th);
        }
    }
    function status($id, $status): JsonResponse
    {
        try {
            $isshow = ($status == 'Enable') ? 'Yes' : 'No';
            Client::where('id', decrypt($id))->update(['status' => $status, 'show_on_home_page_chkbox' => $isshow]);
            return ApiResponse::success(null, 'Status is changed');
        } catch (\Exception $th) {
            return ApiResponse::exception($th);
        }
    }
}
