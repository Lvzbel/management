<?php

namespace Database\Seeders;

use App\Models\Position;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User;
        $admin->name = 'admin';
        $admin->email = 'admin@test.com';
        $admin->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $admin->role = 'admin';
        $admin->save();

        User::factory(15)->create();

        $positions = [
            ['name' => 'Cook', 'slug' => 'cook'],
            ['name' => 'Prep', 'slug' => 'prep'],
            ['name' => 'Cleaning', 'slug' => 'cleaning'],
            ['name' => 'Tort', 'slug' => 'tort'],
            ['name' => 'Waitress', 'slug' => 'waitress'],
        ];

        foreach ($positions as $position) {
            Position::create($position);
        }

        // Add Availability Table to each user
        User::where('role', 'employee')->each(function ($user) {
            $user->availability()->create();
            $user->positions()->attach(rand(1, 5));
        });
    }
}
