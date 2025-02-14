<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonialRequest;
use App\Library\ApiResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\JsonResponse;
use Yajra\DataTables\Facades\DataTables;

class AdminTestimonialController extends Controller
{
    public function index(): View
    {

        return view('admin.about.testimonials-index');
    }
    public function list()
    {
        $data = DB::table('about_carrierpage_testimonials')->orderBy('id', 'asc')->get();
        return DataTables::of($data)->addColumn('encrypt_id', function ($data) {
            return encrypt($data->id);
        })->make(true);
    }

    public function save(TestimonialRequest $request)
    {
        $user = Auth::user();
        $str = now()->timestamp;

        $data = $request->validated();
        if ($request->file('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $filename = $user->id . $str . $name;
            $file->move(public_path('/uploads/testimonials'), $filename);
            $data['image'] = 'uploads/testimonials/' . $filename;
        }
        if ($request->id) {
            $client = DB::table('about_carrierpage_testimonials')->where('id', decrypt($request->id))->update($data);
            $msg = 'Testimonial data updated successfully';
        } else {
            $client = DB::table('about_carrierpage_testimonials')->insert($data);
            $msg = 'Testimonial data saved successfully';
        }
        if ($client) {
            return redirect()->route('admin.about.testimonials')->with('success', $msg);
        } else {
            return back()->with('error', 'Testimonial data is not updated');
        }
    }

    function delete($id): JsonResponse
    {
        try {
            DB::table('about_carrierpage_testimonials')->where('id', decrypt($id))->delete();
            return ApiResponse::success(null, 'Testimonial data deleted successfully');
        } catch (\Exception $th) {
            return ApiResponse::exception($th);
        }
    }
    function status($id, $status): JsonResponse
    {
        try {
            DB::table('about_carrierpage_testimonials')->where('id', decrypt($id))->update(['status' => $status]);
            return ApiResponse::success(null, 'Status is changed');
        } catch (\Exception $th) {
            return ApiResponse::exception($th);
        }
    }
}
