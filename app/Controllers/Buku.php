<?php

namespace App\Controllers;

use App\Models\BukuModel;

class Buku extends BaseController
{
    protected $bukuModel;

    public function __construct()
    {
        $this->bukuModel = new BukuModel();
    }
    public function index()
    {
        // $buku = $this->bukuModel->findAll();
        $data = [
            'judul' => 'Daftar Buku',
            'buku' => $this->bukuModel->getBuku()
        ];

        // $bukuModel = new \App\Models\BukuModel();
        // $bukuModel = new BukuModel();

        return view('buku\index', $data);
    }

    public function detail ($slug)
    {
        $data = [
            'judul' => "Detail",
            'buku' => $this->bukuModel->getBuku($slug)
        ];

        return view('buku\detail', $data);
    }
}
