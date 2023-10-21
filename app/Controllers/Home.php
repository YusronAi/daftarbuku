<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function about ($nama, $umur)
    {
        echo "Ini halaman $nama. Dan umurnya adalah $umur";
    }
}
