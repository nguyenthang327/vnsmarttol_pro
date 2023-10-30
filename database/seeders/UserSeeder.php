<?php

namespace Database\Seeders;

use App\Models\Role;
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
        $APIkey = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 25);
        $adminRole = Role::where('name', Role::ROLE_ADMIN)->first();
        $admin = User::create([
            'username' => 'adminpro',
            'email' => 'admin@example.com',
            'password' => bcrypt('Aa123456'),
            'api' => $APIkey,
            'cash' => 0,
            'active' => 1,
            'collaborator' => 0,
            'ip' => '27.67.95.46',
            'device' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36',
            'cheat' => 'on',
            'identity_website' => 'dichvufb24h.com',
        ]);

        $admin->syncRoles([$adminRole->id]);

        $APIkey = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 25);
        $clientRole = Role::where('name', Role::ROLE_CLIENT)->first();
        $client = User::create([
            'username' => 'clientpro',
            'email' => 'client@example.com',
            'password' => bcrypt('Aa123456'),
            'api' => $APIkey,
            'cash' => 0,
            'active' => 1,
            'collaborator' => 0,
            'ip' => '27.67.95.46',
            'device' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36',
            'cheat' => 'on',
            'identity_website' => 'dichvufb24h.com',
        ]);

        $client->syncRoles([$clientRole->id]);
    }
}
