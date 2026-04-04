<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailProfileSeeder extends Seeder
{
    public function run()
    {
        DB::table('detail_profile')->insert([
            'address' => 'Sidoarjo',
            'nomor_tlp' => '08123456789',
            'ttl' => '2000-01-01',
            'foto' => 'default.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}