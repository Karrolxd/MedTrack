<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            ['id'=>1, 'name'=>'admin'],
            ['id'=>2, 'name'=>'patient'],
            ['id'=>3, 'name'=>'doctor'],
            ['id'=>4, 'name'=>'reception'],
            ['id'=>5, 'name'=>'guest'],
        ]);

    }
}
