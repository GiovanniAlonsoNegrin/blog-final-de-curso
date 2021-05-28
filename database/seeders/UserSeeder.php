<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Nino Noel Perez Cetroni',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123')
        ])->assignRole('Admin');

        User::factory(19)->create();
    }
}
