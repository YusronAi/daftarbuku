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

    public function detail($slug)
    {
        $data = [
            'judul' => "Detail",
            'buku' => $this->bukuModel->getBuku($slug)
        ];

        // Jika buku tidak di tabel

        if (empty($data['buku'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul buku "' . $slug . '" tidak ditemukan.');
        }

        d($data);

        return view('buku\detail', $data);
    }

    public function tambah()
    {
        $data = [
            'judul' => "Form Tambah Buku"
        ];

        return view('buku\create', $data);
    }

    public function simpan()
    {
        // $this->request->getVar();

        // Validasi data

        if (!$this->validate([
            'judul' => 'required|is_unique[buku.judul]'
        ])) {
            session()->setFlashdata('pesan', 'Data sudah ada atau isi kurang komplit');

            return redirect()->to('/buku/tambah');
        }

        // Ambil gambar

        $fileGambar = $this->request->getFile('gambar');
        // Pindah file gambar
        $fileGambar->move('img');

        // Ambil nama gambar
        $namaGambar = $fileGambar->getName();
        // $namaGambar = $fileGambar->getRandomName();

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->bukuModel->save(
            [
                'judul' => $this->request->getVar('judul'),
                'nama_pengarang' => $this->request->getVar('nama_pengarang'),
                'slug' => $slug,
                'gambar' => $namaGambar
            ]
        );

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

        return redirect()->to('/buku');
    }

    public function hapus($id)
    {
        // Cari id gamabar
        $buku = $this->bukuModel->first($id);
        // Hapus gambar
        unlink('img/' . $buku['gambar']);

        $this->bukuModel->delete($id);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/buku');
    }

    public function ubah($slug)
    {
        $data = [
            'judul' => 'Form Ubah Data Buku',
            'buku' => $this->bukuModel->getBuku($slug)
        ];

        return view('buku\ubah', $data);
    }

    public function update($id)
    {
        // if (!$this->validate([
        //     'judul' => 'required|is_unique[buku.judul]'
        // ])) {
        //     session()->setFlashdata('pesan', 'Judul sudah ada atau isi kurang komplit');

        //     return redirect()->to('/buku/ubah/'. $this->request->getVar('slug'));
        // }

        // Ambil gambar
        $fileGambar = $this->request->getFile('gambar');

        // Cek gambar apakah gamabar baru atau lama
        if ($fileGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarLama');
        } else {
            
        // Ambil nama gambar
        $namaGambar = $fileGambar->getName();
        // $namaGambar = $fileGambar->getRandomName();

        // Pindah file gambar
        $fileGambar->move('img');

        // Hapus gambar lama
        unlink('img/'. $this->request->getVar('gambarLama'));
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->bukuModel->save(
            [
                'id' => $id,
                'judul' => $this->request->getVar('judul'),
                'nama_pengarang' => $this->request->getVar('nama_pengarang'),
                'slug' => $slug,
                'gambar' => $namaGambar
            ]
        );

        session()->setFlashdata('pesan', 'Data berhasil diubah');

        return redirect()->to('/buku');
    }
}
