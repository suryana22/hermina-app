<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)->create();
        $role   =   Role::create(['name' => 'admin']);

        $user   =   User::factory()->create([
            'username'  =>  'admin',
            'firstname' =>  'Administrator',
            'lastname'  =>  'Hermina Bekasi',
            'email'     =>  'admin@his.com',
        ]);
        $user->assignRole($role);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    //     \App\Models\Departement::factory()->create([
    //         'name' => 'Administrator',
    //     ]);
    }
}
