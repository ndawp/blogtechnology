<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Model\user\post;
use App\Model\user\tag;

class SidebarComposer
{
    /**
     * The user repository implementation.
     *
     * @var  UserRepository
     */

    /**
     * Create a new profile composer.
     *
     * @param    UserRepository  $users
     * @return  void
     */
    public function __construct()
    {
        // Dependencies automatically resolved by service container...
        //$this->users = $users;
    }

    /**
     * Bind data to the view.
     *
     * @param    View  $view
     * @return  void
     */
    public function compose(View $view)
    {
        $tags = tag::limit(10)->get();
        $posts = post::where('status',1)->orderBy('created_at','desc')->get();
        $view->with('posts',$posts)->with('tags',$tags);
    }
}