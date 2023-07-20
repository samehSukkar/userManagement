<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Validator;

class SuperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email = $this->command->ask('Enter the email for the superuser:');
        
        $validator = Validator::make(['email' => $email], [
            'email' => 'required|email',
        ]);
        
                if ($validator->fails()) {
                    $this->command->error('Invalid email provided. User creation canceled.');
                    return;
                }

        $password = $this->command->secret('Enter the password for the superuser:');



        User::create([
            'firstname' => 'Admin',
            'email' => $email,
            'password' => Hash::make($password),
            'is_admin' => true,
            
        ]);
    }
}
