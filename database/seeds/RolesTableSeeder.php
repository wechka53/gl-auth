<?php

use App\Models\Role;
use Illuminate\Database\Seeder;
use Webpatser\Uuid\Uuid;

class RolesTableSeeder extends Seeder
{
    /**
     * @throws Exception
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'id' => Uuid::generate(4),
            'type' => Role::ADMIN,
            'created_at' => \Carbon\Carbon::now()
        ]);

        DB::table('roles')->insert([
            'id' => Uuid::generate(4),
            'type' => Role::USER,
            'created_at' => \Carbon\Carbon::now()
        ]);

        DB::table('roles')->insert([
            'id' => Uuid::generate(4),
            'type' => Role::DRIVER,
            'created_at' => \Carbon\Carbon::now()
        ]);
    }
}
