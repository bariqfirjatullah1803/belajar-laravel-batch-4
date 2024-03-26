<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function dashboard()
    {
        return view('admin.pages.dashboard');
    }

    public function chart()
    {
        return view('admin.pages.chart');
    }

    public function table()
    {
        $data = [
            [
                "name" => "Paki Butler",
                "phone" => "1-711-563-3467",
                "email" => "risus.donec@protonmail.com",
                "address" => "Ap #272-9840 Aliquam Road"
            ],
            [
                "name" => "Solomon Jordan",
                "phone" => "(997) 785-8231",
                "email" => "aliquet@aol.edu",
                "address" => "1922 Diam Rd."
            ],
            [
                "name" => "Emery Reid",
                "phone" => "(321) 564-6836",
                "email" => "penatibus@yahoo.edu",
                "address" => "Ap #392-8224 Massa. Rd."
            ],
            [
                "name" => "Astra Delaney",
                "phone" => "(601) 422-3899",
                "email" => "risus.a.ultricies@google.net",
                "address" => "546-633 Amet Avenue"
            ],
            [
                "name" => "Jayme Shaffer",
                "phone" => "(698) 256-7842",
                "email" => "vestibulum.lorem@icloud.ca",
                "address" => "Ap #277-8109 Id, St."
            ]
        ];
        return view('admin.pages.table', compact('data'));
    }
}
