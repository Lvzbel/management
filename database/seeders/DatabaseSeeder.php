<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Position;
use Carbon\CarbonImmutable;
use Illuminate\Support\Carbon;
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

            $currentWeek = CarbonImmutable::now()->locale('en_US');
            $nextWeek = $currentWeek->addWeek();

            $user->schedules()->create([
                'week_start' => $currentWeek->startOfWeek(Carbon::MONDAY),
                'week_end' => $currentWeek->endOfWeek(Carbon::SUNDAY),
                'start_monday' => $currentWeek->addDay()->hour(8)->minute(0),
                'end_monday' => $currentWeek->addDay()->hour(17)->minute(0),
                'start_tuesday' => $currentWeek->addDay(2)->hour(8)->minute(0),
                'end_tuesday' => $currentWeek->addDay(2)->hour(17)->minute(0),
                'start_wednesday' => $currentWeek->addDay(3)->hour(8)->minute(0),
                'end_wednesday' => $currentWeek->addDay(3)->hour(17)->minute(0),
                'start_thursday' => $currentWeek->addDay(4)->hour(8)->minute(0),
                'end_thursday' => $currentWeek->addDay(4)->hour(17)->minute(0),
                'start_friday' => $currentWeek->addDay(5)->hour(8)->minute(0),
                'end_friday' => $currentWeek->addDay(5)->hour(17)->minute(0),
            ]);

            $user->schedules()->create([
                'week_start' => $nextWeek->startOfWeek(Carbon::MONDAY),
                'week_end' => $nextWeek->endOfWeek(Carbon::SUNDAY),
                'start_monday' => $nextWeek->addDay()->hour(8)->minute(0),
                'end_monday' => $nextWeek->addDay()->hour(17)->minute(0),
                'start_tuesday' => $nextWeek->addDay(2)->hour(8)->minute(0),
                'end_tuesday' => $nextWeek->addDay(2)->hour(17)->minute(0),
                'start_wednesday' => $nextWeek->addDay(3)->hour(8)->minute(0),
                'end_wednesday' => $nextWeek->addDay(3)->hour(17)->minute(0),
                'start_thursday' => $nextWeek->addDay(4)->hour(8)->minute(0),
                'end_thursday' => $nextWeek->addDay(4)->hour(17)->minute(0),
                'start_friday' => $nextWeek->addDay(5)->hour(8)->minute(0),
                'end_friday' => $nextWeek->addDay(5)->hour(17)->minute(0),
            ]);
        });
    }
}
