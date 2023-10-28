<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggotaModel extends Model
{
    protected $table = 'anggota';
    protected $useTimestamps      = true;
    protected $allowedFields = ['nama', 'alamat'];

    // Pakai query builder
    public function search ($keyword)
    {
        // $builder = $this->table('orang');
        // $builder->like('nama', $keyword);
        // return $builder;

        return $this->table('anggota')->like('nama', $keyword)->orLike('alamat', $keyword);
    }
}