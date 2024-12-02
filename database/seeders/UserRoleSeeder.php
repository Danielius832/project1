<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserRoleSeeder extends Seeder
{
    public function run()
    {
        // Rasti vartotoją pagal el. paštą ir priskirti administratoriaus rolę
        $user = User::where('email', 'Danielkisiel4@gmail.com')->first();
        if ($user) {
            $user->role = 'admin'; // Keiskite pagal savo duomenų bazės struktūrą
            $user->save();
        }
    }
}
