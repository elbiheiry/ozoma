<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Course;
use App\Models\Invitation;
use App\Models\Package;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $invitations = Invitation::all()->sortByDesc('id')->take(4);
        $users = User::all()->sortByDesc('id')->take(4);

        return view('admin.pages.index' , compact('invitations' , 'users'));
    }
}
