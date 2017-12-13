<?php

use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Employee::class, 50)->create()->each(function ($u) {
            $u->vote()->save(factory(App\Vote::class)->make());
        });
    }
}
