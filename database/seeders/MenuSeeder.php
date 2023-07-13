<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::create([
            'group' => 'Main',
            'name' => 'Master Data',
            'slug' => '#',
            'icon' => 'metismenu-icon pe-7s-diamond',
            'menu_id' => null,
            'order' => '1'
        ]);
        Menu::create([
            'group' => 'Main',
            'name' => 'Management Access',
            'slug' => '#',
            'icon' => 'metismenu-icon pe-7s-car',
            'menu_id' => null,
            'order' => '2'
        ]);
        Menu::create([
            'group' => 'Main',
            'name' => 'Faculties',
            'slug' => 'faculties.index',
            'icon' => '',
            'menu_id' => '1',
            'order' => '1'
        ]);
        Menu::create([
            'group' => 'Main',
            'name' => 'Majors',
            'slug' => 'majors.index',
            'icon' => '',
            'menu_id' => '1',
            'order' => '2'
        ]);
        Menu::create([
            'group' => 'Main',
            'name' => 'Classrooms',
            'slug' => 'classrooms.index',
            'icon' => '',
            'menu_id' => '1',
            'order' => '3'
        ]);
        Menu::create([
            'group' => 'Main',
            'name' => 'Roles',
            'slug' => 'roles.index',
            'icon' => '',
            'menu_id' => '2',
            'order' => '1'
        ]);
        Menu::create([
            'group' => 'Main',
            'name' => 'Permissions',
            'slug' => 'permissions.index',
            'icon' => '',
            'menu_id' => '2',
            'order' => '2'
        ]);
        Menu::create([
            'group' => 'Main',
            'name' => 'Users',
            'slug' => 'users.index',
            'icon' => '',
            'menu_id' => '2',
            'order' => '3'
        ]);
    }
}
