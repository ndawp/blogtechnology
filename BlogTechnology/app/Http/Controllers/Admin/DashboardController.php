<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\user\post;
use App\Model\user\tag;
use App\Model\admin\admin;
use App\Model\user\category;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * [index description]
     * @return [type] [description]
     */
    public function index()	
    {
    	$post_count = post::count();
    	$admin_count = admin::count();
    	$tag_count = tag::count();
    	$category_count = category::count();
    	return view('admin.dashboard',['num_post'=> $post_count,'num_admin'=>$admin_count,'num_tag'=>$tag_count,'num_category'=>$category_count]);
    }
}
