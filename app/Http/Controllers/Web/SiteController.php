<?php

namespace App\Http\Controllers\Web;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class SiteController extends Controller
{

    /**
     * Show all tasks.
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function index(){
        return redirect(
            route('tasks.index'),301
        );
    }

    public function getall(){
        $allArticles = User::all();
        dd( $allArticles);
    }

    
    
}
