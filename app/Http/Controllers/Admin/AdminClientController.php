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

class AdminClientController extends Controller
{
    public function index(): View
    {

        return view('admin.admin-client-index');
    }
    public function list() {
        $data = Client::orderBy('id', 'desc')->get();
        return DataTables::of($data)->addColumn('encrypt_id', function ($data) {
            return encrypt($data->id);
        })->make(true);
    }

    public function save(ClientRequest $request)
    {
        $user = Auth::user();
        $file = $request->file('logo');
        $name = $file->getClientOriginalName();
        $str = now()->timestamp;
        $filename = $user->id . $str . $name;
        $file->move(public_path('/uploads/client_logo'), $filename);
        $data = [
            'client_name' => $request->client_name,
            'title' => $request->title,
            'status' => $request->status,
            'logo' => 'uploads/client_logo/' . $filename,
            'show_on_home_page_chkbox' => ($request->status == 'Enable') ? 'Yes' : 'No'
        ];
        $client = Client::create($data);
        if ($client) {
            return redirect()->route('admin.clients')->with('success', 'Client logo is uploaded successfully');
        } else {
            return back()->with('error', 'Client logo uploading is failed');
        }
    }

    function delete($id) : JsonResponse {
        try {
            Client::where('id',decrypt($id))->delete();
            return ApiResponse::success(null,'Logo delete successfully');
        } catch (\Exception $th) {
            return ApiResponse::exception($th);
        }
    }
}
