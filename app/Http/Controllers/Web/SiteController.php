<?php

namespace App\Http\Controllers\Web;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class SiteController extends Controller
{

    /**
     * Show all exercises.
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function index(){
        return redirect(
            route('exercises.index'),301
        );
    }

    public function getall(){
        $allArticles = User::all();
        dd( $allArticles);
    }
    
    
}
