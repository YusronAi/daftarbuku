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

        // Jika buku tidak di tabel

        if(empty($data['buku']))
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul buku "'. $slug . '" tidak ditemukan.');
        }

        return view('buku\detail', $data);
    }

    public function tambah ()
    {
        $data = [
            'judul' => "Form Tambah Buku"
        ];

        return view('buku\create', $data);
    }

    public function simpan ()
    {
        // $this->request->getVar();

        $this->bukuModel->save(
            [
                'judul' => $this->request->getVar('judul'),
                'nama_pengarang' => $this->request->getVar('nama_pengarang'),
                'slug' => $this->request->getVar('slug')
            ]
            );

            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

            return redirect()->to('/buku');
    }
}
