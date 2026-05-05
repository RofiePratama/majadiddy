<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            
                'name'=>'root',
                'email'=>'root@gmail.com',
                'password'=>bcrypt('root'),
                'role'=>'admin',
                'created_at'=>now(),
                'updated_at'=>now()
            
        ]);
    }
}
