<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiIntegrationRequest;
use App\Library\ApiResponse;
use App\Models\IntegrationCategory;
use App\Models\IntegrationServicesCategory;
use App\Models\IntegrationServicesContent;
use App\Models\IntegrationSubCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminIntegrationsController extends Controller
{
    public function index(): View
    {
        $mainCategory = IntegrationCategory::get();
        $subCategory = IntegrationSubCategory::latest('id')->get();
        $services = IntegrationServicesCategory::latest('id')->get();
        $data= IntegrationServicesContent::latest('id')->with(['category_data:id,category_name', 'sub_category:id,title', 'service:id,title'])->get();
        return view('admin.integrations.api-integration-index', compact('mainCategory', 'subCategory', 'services','data'));
    }
    public function save(ApiIntegrationRequest $request)
    {
        $user = Auth::user();
        $data = $request->validated();
        if ($request->file('uploaded_pdf')) {
            $file = $request->file('uploaded_pdf');
            $name = $file->getClientOriginalName();
            $str = now()->timestamp;
            $filename = $user->id . $str . $name;
            $file->move(public_path('/uploads/api_integration'), $filename);
            $data['upload_pdf'] = 'uploads/api_integration/' . $filename;
        }
        if ($request->file('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $str = now()->timestamp;
            $image_filename = $user->id . $str . $name;
            $image->move(public_path('/uploads/api_integration'), $image_filename);
            $data['image'] = 'uploads/api_integration/' . $image_filename;
        }
        if ($request->id) {
            $table = IntegrationServicesContent::where('id', $request->id)->update($data);
            $msg = 'Api Integration updated successfully';
        } else {

            $table = IntegrationServicesContent::create($data);
            $msg = 'Api Integration saved successfully';
        }

        if ($table) {
            return redirect()->route('admin.integrations.api-integrations')->with('success', $msg);
        } else {
            return back()->with('error', 'Api Integration is not saved');
        }
    }
    public function status($id, $status): JsonResponse
    {
        try {
            IntegrationServicesContent::where('id', decrypt($id))->update(['status' => $status]);
            return ApiResponse::success(null, 'Status is changed');
        } catch (\Exception $th) {
            return ApiResponse::exception($th);
        }
    }
    function delete($id): JsonResponse
    {
        try {
            IntegrationServicesContent::where('id', decrypt($id))->delete();
            return ApiResponse::success(null, 'Api Integration delete successfully');
        } catch (\Exception $th) {
            return ApiResponse::exception($th);
        }
    }
}
