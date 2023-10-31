<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class AnggotaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'Yusron',
                'alamat'    => 'Yogyakarta',
                'password' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'nama' => 'Aminullah',
                'alamat'    => 'Yogyakarta',
                'password' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'nama' => 'Agus',
                'alamat'    => 'Yogyakarta',
                'password' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'nama' => 'rudi',
                'alamat'    => 'Yogyakarta',
                'password' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'nama' => 'yasin',
                'alamat'    => 'Yogyakarta',
                'password' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'nama' => 'ali',
                'alamat'    => 'Yogyakarta',
                'password' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ]
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO anggota (nama, alamat, created_at, updated_at) VALUES(:nama:, :alamat:, :created_at:, :updated_at:)', $data);

        // Using Query Builder
        $this->db->table('anggota')->insertBatch($data);
    }
}
