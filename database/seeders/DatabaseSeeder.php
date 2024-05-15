<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $user1 = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' =>Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);
        User::factory()->create([
            'name' => 'Test',
            'email' => 'test@example.com',
            'email_verified_at' => now(),
            'password' =>Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);
        $role = Role::create(['name' => 'Admin']);
        $user1->assignRole($role);



        $user2 = User::create([
            'name' => 'Visitor',
            'email' => 'visitor@example.com',
            'email_verified_at' => now(),
            'password' =>Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);
        $role = Role::create(['name' => 'Visitor']);
        $user2->assignRole($role);


        $user3 = User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'email_verified_at' => now(),
            'password' =>Hash::make('12345678'),
            'remember_token' => Str::random(10),
        ]);
        $role = Role::create(['name' => 'User']);
        $user3->assignRole($role);





        // Role::create([]);
        // Permission::create([]);
        // BooK::create([
        //     'title'=>'book1',
        //     'summary'
        // ]);


    }
}
