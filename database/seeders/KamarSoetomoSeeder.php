<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KamarSoetomoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('kamar_rs')->insert([
            [
                'rs_id'=>'4',
                'room_type'=>'HCU',
                'total_rooms'=>'122',
                'available_rooms'=>'48',
                'last_updated'=>null
            ],
            [
                'rs_id'=>'4',
                'room_type'=>'ISOLASI',
                'total_rooms'=>'42',
                'available_rooms'=>'9',
                'last_updated'=>null
            ],
            [
                'rs_id'=>'4',
                'room_type'=>'KB',
                'total_rooms'=>'3',
                'available_rooms'=>'2',
                'last_updated'=>null
            ],
            [
                'rs_id'=>'4',
                'room_type'=>'Kelas II',
                'total_rooms'=>'77',
                'available_rooms'=>'27',
                'last_updated'=>null
            ],
            [
                'rs_id'=>'4',
                'room_type'=>'Kelas III',
                'total_rooms'=>'453',
                'available_rooms'=>'77',
                'last_updated'=>null
            ],
            [
                'rs_id'=>'4',
                'room_type'=>'Kelas I',
                'total_rooms'=>'126',
                'available_rooms'=>'20',
                'last_updated'=>null
            ],
            [
                'rs_id'=>'4',
                'room_type'=>'ICU',
                'total_rooms'=>'66',
                'available_rooms'=>'22',
                'last_updated'=>null
            ],
            [
                'rs_id'=>'4',
                'room_type'=>'Utama I',
                'total_rooms'=>'10',
                'available_rooms'=>'9',
                'last_updated'=>null
            ],
            [
                'rs_id'=>'4',
                'room_type'=>'VIP',
                'total_rooms'=>'101',
                'available_rooms'=>'12',
                'last_updated'=>null
            ],
            [
                'rs_id'=>'4',
                'room_type'=>'Utama II',
                'total_rooms'=>'6',
                'available_rooms'=>'5',
                'last_updated'=>null
            ],
            [
                'rs_id'=>'4',
                'room_type'=>'Super VVIP I',
                'total_rooms'=>'6',
                'available_rooms'=>'4',
                'last_updated'=>null
            ],
            [
                'rs_id'=>'4',
                'room_type'=>'Super VVIP 2',
                'total_rooms'=>'4',
                'available_rooms'=>'1',
                'last_updated'=>null
            ],
            [
                'rs_id'=>'4',
                'room_type'=>'HCU Privat',
                'total_rooms'=>'4',
                'available_rooms'=>'1',
                'last_updated'=>null
            ],
            [
                'rs_id'=>'4',
                'room_type'=>'Non Kelas',
                'total_rooms'=>'6',
                'available_rooms'=>'4',
                'last_updated'=>null
            ]
        ]);
    }
}
