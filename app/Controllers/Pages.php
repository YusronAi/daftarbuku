<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $set = session();
        $sett = $set->get('login');

        if (empty($sett)) {
            return redirect()->to('/anggota/login');
        }

        $data = [
            'judul' => 'Home',
            'session' => $sett
        ];

        return view('pages\home', $data);
    }

    public function about()
    {
        $data = [
            'judul' => "About"
        ];
        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'judul' => "Contact"
        ];
        return view('pages/contact', $data);
    }
}
