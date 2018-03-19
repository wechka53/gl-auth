<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->createDefaultUsers();
        $this->createAdminUser();
    }


    private function createDefaultUsers(): void
    {

        $roles = Role::whereIn('type', ['user', 'driver'])->get()->pluck('id')->toArray();
        $rolesCount = count($roles) - 1;

        $users = factory(User::class, 30)->create();

        foreach ($users as $user) {
            $user->roles()->sync([$roles[rand(0, $rolesCount)]]);
        }
    }

    private function createAdminUser(): void
    {
        $role = Role::where('type', 'admin')->first();

        $admin = factory(User::class)->create(['email' => 'admin@admin.com']);

        $admin->roles()->attach($role->id);
    }
}
