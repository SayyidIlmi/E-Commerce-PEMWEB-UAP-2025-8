<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'role'=> 'admin'
        ]);

        User::create([
            'name' => 'Sega Corp',
            'email' => 'sega@gmail.com',
            'password' => Hash::make('sega123'),
            'role'=> 'member'
        ]
        );
        User::create([
            'name' => 'Galaxy Solusindo',
            'email' => 'gasol@gmail.com',
            'password' => Hash::make('gasol123'),
            'role'=> 'member'
        ]
        );
        User::create([
            'name' => 'Sugeng Riyadi',
            'email' => 'sugeng@gmail.com',
            'password' => Hash::make('sugeng123'),
            'role'=> 'member'
        ]
        );
        User::create([
            'name' => 'Sayyid Ilmi',
            'email' => 'sayyid@gmail.com',
            'password' => Hash::make('sayyid123'),
            'role'=> 'admin'
        ]
        );
        User::create([
            'name' => 'Ilmi Tech Store',
            'email' => 'ilmi@gmail.com',
            'password' => Hash::make('ilmi123'),
            'role'=> 'member'
        ]
        );
        User::create([
            'name' => 'Rasyan von Neumann',
            'email' => 'rasyan@gmail.com',
            'password' => Hash::make('rasyan123'),
            'role'=> 'member'
        ]
        );
        User::create([
            'name' => 'Misxa Aiman Neumann',
            'email' => 'misxa@gmail.com',
            'password' => Hash::make('misxa123'),
            'role'=> 'member'
        ]
        );
        User::create([
            'name' => 'Msxka Ngawi',
            'email' => 'msxka@gmail.com',
            'password' => Hash::make('msxka123'),
            'role'=> 'member'
        ]
        );
        User::create([
            'name' => 'SuperImpact',
            'email' => 'superimpact@gmail.com',
            'password' => Hash::make('superimpact123'),
            'role'=> 'member'
        ]
        );
        User::create([
            'name' => 'Keqing Wangy',
            'email' => 'keqing@gmail.com',
            'password' => Hash::make('keqing123'),
            'role'=> 'member'
        ]
        );
        User::create([
            'name' => 'GandiStore',
            'email' => 'gandistore@gmail.com',
            'password' => Hash::make('gandistore123'),
            'role'=> 'member'
        ]
        );
        User::create([
            'name' => 'Asade testing',
            'email' => 'asade@gmail.com',
            'password' => Hash::make('asade123'),
            'role'=> 'member'
        ]
        );
    }
}