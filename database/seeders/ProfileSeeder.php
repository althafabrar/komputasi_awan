<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'no_ktp'        => '123645387',
            'nama'          => 'Ilham Syifa Althaf',
            'jenis_kelamin' => 'Laki-laki',
            'no_telp'       => '085718812374',
            'alamat'        => 'Jl. Kebenaran Papa Zola',
            'user_id'       => 1,
        ];

        Profile::create($data);
    }
}
