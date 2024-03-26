<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function home()
    {
        return view('pages.home');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function program(Request $request)
    {
        $program = $request->program;

        $collectProgram = collect($program);

        if ($collectProgram) {
            foreach ($collectProgram as $key => $value) {
                echo $value;
            }
        }
    }
}
