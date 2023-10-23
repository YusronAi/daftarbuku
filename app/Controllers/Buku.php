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
        session();
        $data = [
            'judul' => "Form Tambah Buku"
        ];

        return view('buku\create', $data);
    }

    public function simpan ()
    {
        // $this->request->getVar();

        // Validasi data

        if (!$this->validate([
            'judul' => 'required|is_unique[buku.judul]'
        ])) {
            session()->setFlashdata('pesan', 'Data sudah ada atau isi kurang komplit');

            return redirect()->to('/buku/tambah');
        }


        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->bukuModel->save(
            [
                'judul' => $this->request->getVar('judul'),
                'nama_pengarang' => $this->request->getVar('nama_pengarang'),
                'slug' => $slug
            ]
            );

            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

            return redirect()->to('/buku');
    }
}
