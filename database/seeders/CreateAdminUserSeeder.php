<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
			'name' => 'John',
			'gender' => 'Others',
			'allow' => 'manager',
			'email_verified_at' => now(),
			'email' => 'John@gmail.com',
			'password' => '12345678',
		]);
    }
}
