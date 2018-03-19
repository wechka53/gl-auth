<?php

use Illuminate\Database\Seeder;
use Webpatser\Uuid\Uuid;

class RolesTableSeeder extends Seeder
{
    /**
     * Create User roles.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'id' => Uuid::generate(4),
            'type' => 'admin',
            'created_at' => \Carbon\Carbon::now()
        ]);

        DB::table('roles')->insert([
            'id' => Uuid::generate(4),
            'type' => 'user',
            'created_at' => \Carbon\Carbon::now()
        ]);

        DB::table('roles')->insert([
            'id' => Uuid::generate(4),
            'type' => 'driver',
            'created_at' => \Carbon\Carbon::now()
        ]);
    }
}
