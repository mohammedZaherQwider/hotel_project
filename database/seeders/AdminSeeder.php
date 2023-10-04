<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name'=>'Mohammed Qwider',
            'email'=> 'qwider2003@gmail.com',
            'password' => bcrypt('123'),
            'email_verified_at'=>now()
        ]);
    }
}
