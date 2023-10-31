<?php

namespace App\Controllers;

$session = \Config\Services::session();

use App\Models\AnggotaModel;
use App\Controllers\BaseController;

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

        if ($keyword) {
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

    public function login()
    {
        $nama = $this->request->getVar('name');
        $password = $this->request->getVar('password');

        if ($nama) {
            $anggota = $this->anggotaModel->search($nama)->first();
            if ($anggota) {
                if ($password == $anggota['password']) {
                    $set = session();
                    $set->set('login', $anggota);
                    return redirect()->to('/');
                } else {
                    session()->setFlashdata('pesan', 'Password salah');
                }
            } else {
                session()->setFlashdata('pesan', 'Akun tidak ditemukan');
            }
        }

        $data = [
            'judul' => 'Login'
        ];

        return view('anggota\login', $data);
    }

    public function logout()
    {
        $set = session();

        $set->remove('login');
        $set->destroy();

        return redirect()->to('/anggota/login');
    }

    public function register()
    {
        $nama = $this->request->getVar('name');
        $alamat = $this->request->getVar('alamat');
        $password = $this->request->getVar('password');

        if (!$this->validate([
            'name' => 'required|is_unique[anggota.nama]'
        ])) {
            session()->setFlashdata('pesan', 'Data sudah ada atau isi kurang komplit');

            return redirect()->to('/anggota/login');
        }

        $this->anggotaModel->save([
            'nama' => $this->request->getVar('name'),
            'alamat' => $this->request->getVar('alamat'),
            'password' => $this->request->getVar('password')
        ]);


        session()->setFlashdata('pesan', 'Register Berhasil');
        return redirect()->to('/anggota/login');
    }
}
