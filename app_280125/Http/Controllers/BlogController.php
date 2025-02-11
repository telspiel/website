<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\BottomContact;
use App\Models\ContactUsForm;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
class BlogController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $about_resourcespage_blogs = DB::table('about_resourcespage_blogs')
                ->where('status','Enable')
                ->select('about_resourcespage_blogs.*')
                ->paginate(10);
       
        return view('pages.blog', compact('about_resourcespage_blogs'));
    }
     public function detail($slug)
    {
        $blog = DB::table('about_resourcespage_blogs')
                ->where('cta_link',$slug)
                ->select('about_resourcespage_blogs.*')
                ->first();
       $latest_articles=DB::table('about_resourcespage_blogs')
                ->where('category_id',$blog->category_id)
               ->where('id','!=',$blog->id)
                ->select('about_resourcespage_blogs.*')
                ->get();
        return view('pages.blog-detail', compact('blog','latest_articles'));
    }
    
}
