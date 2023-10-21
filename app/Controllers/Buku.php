<?php

namespace App\Controllers;

class Buku extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Daftar Buku'
        ];
        return view('buku\index', $data);
    }
}
