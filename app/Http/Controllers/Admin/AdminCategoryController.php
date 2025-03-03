<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;
use App\Library\ApiResponse;
use App\Models\SolutionMainCategory;
use App\Models\SolutionSubCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\JsonResponse;

class AdminCategoryController extends Controller
{
    public function category(): View
    {
        $mainCategory = SolutionMainCategory::get();
        $subCategory = SolutionSubCategory::latest('id')->with('category_data')->get();
        return view('admin.solutions.category-index', compact('mainCategory', 'subCategory'));
    }
    public function save(SubCategoryRequest $request)
    {
        $user = Auth::user();
        $data = [
            'cat_id' => $request->cat_id,
            'title' => $request->title,
            'slug' => $request->slug,
            'detail' => $request->detail,
            'link_name' => $request->link_name,
            'banner_cta_name' => $request->banner_cta_name,
            'banner_cta_link' => $request->banner_cta_link,
            'image_alt' => $request->image_alt,
            'image_title' => $request->image_title,
            'status' => $request->status
        ];
        if ($request->file('icon')) {
            $file = $request->file('icon');
            $name = $file->getClientOriginalName();
            $str = now()->timestamp;
            $filename = $user->id . $str . $name;
            $file->move(public_path('/uploads/category_icon'), $filename);
            $data['icon'] = 'uploads/category_icon/'.$filename;
        }
        if ($request->file('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $str = now()->timestamp;
            $image_filename = $user->id . $str . $name;
            $image->move(public_path('/uploads/category_image'), $image_filename);
            $data['image'] = 'uploads/category_image/' . $image_filename;
        }
        if ($request->id) {
            $table = SolutionSubCategory::where('id', $request->id)->update($data);
            $msg = 'Category updated successfully';
        } else {

            $table = SolutionSubCategory::create($data);
            $msg = 'Category saved successfully';
        }

        if ($table) {
            return redirect()->route('admin.solutions.category')->with('success', $msg);
        } else {
            return back()->with('error', 'Category is saved successfully');
        }
    }
    public function status($id, $status): JsonResponse
    {
        try {
            SolutionSubCategory::where('id', decrypt($id))->update(['status' => $status]);
            return ApiResponse::success(null, 'Status is changed');
        } catch (\Exception $th) {
            return ApiResponse::exception($th);
        }
    }
    function delete($id): JsonResponse
    {
        try {
            SolutionSubCategory::where('id', decrypt($id))->delete();
            return ApiResponse::success(null, 'Category delete successfully');
        } catch (\Exception $th) {
            return ApiResponse::exception($th);
        }
    }
}
