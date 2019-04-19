<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Films;
use Illuminate\Http\File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->films_model = new Films();
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('films');
        
    }
    
    public function createFilms() {
        return view('create');
    }
    
    public function filmsDetail($slug) {
        $films['detail'] = $this->films_model->filmsdetail($slug);
        $films['comment'] = $this->films_model->comment_list($films['detail'][0]->id);
        return view('filmsdetail',$films);
    }
   
}
