<?php

namespace App\Controllers;

use App\Models\AnggotaModel;

class anggota extends BaseController
{
    protected $anggotaModel;

    public function __construct()
    {
        $this->anggotaModel = new AnggotaModel();
    }
    public function index()
    {
        $currentPage = $this->request->getVar('page_anggota') ? $this->request->getVar('page_anggota') : 1;

        $keyword = $this->request->getVar('keyword');

        if($keyword) {
            $anggota = $this->anggotaModel->search($keyword);
        } else {
            $anggota = $this->anggotaModel;
        }
        // $anggota = $this->anggotaModel->findAll();
        $data = [
            'judul' => 'Daftar Anggota',
            'anggota' => $anggota->paginate(4, 'anggota'),
            'pager' => $anggota->pager,
            'currentPage' => $currentPage
        ];

        // $anggotaModel = new \App\Models\AnggotaModel();
        // $bukuModel = new AnggotaModel();

        return view('anggota\index', $data);
    }
}
