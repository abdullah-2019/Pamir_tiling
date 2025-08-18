<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contacts = [];
        for ($i = 0; $i < 100; $i++) {
            $contacts[] = [
                'name' => 'Name' . $i,
                'last_name' => 'LastName' . $i,
                'email' => 'email' . $i . '@example.com',
                'phone' => '123456789' . $i,
                'subject' => 'Subject ' . $i,
                'message' => 'This is a sample message ' . $i
            ];
        }
        DB::table('contacts')->insert($contacts);
    }
}