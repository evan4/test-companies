<?php

use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Position::class, 10)->create()->each(function ($u) {
            $u->save(factory(App\Employee::class)->make());
        });
    }
}
