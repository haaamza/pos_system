<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = Role::where("name", "Employee")->first();
        $role_manager = Role::where("name", "Manager")->first();

        $manager = new User();
        $manager->name = "Mian Muzammil";
        $manager->username = "muzammil";
        $manager->password = bcrypt("secret");
        $manager->save();
        $manager->roles()->attach($role_manager);
    }
}
