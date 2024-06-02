<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientsTableSeeder extends Seeder
{
    public function run()
    {
        Client::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'identity_verified' => false,
            'has_documents' => false,
        ]);

        // Add more seed data as needed
    }
}
