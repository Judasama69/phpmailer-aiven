<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LoginLog;
use Carbon\Carbon;

class LoginLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LoginLog::create([
            'email' => 'test1@example.com',
            'login_time' => Carbon::now(),
        ]);

        LoginLog::create([
            'email' => 'test2@example.com',
            'login_time' => Carbon::now(),
        ]);
    }
}
