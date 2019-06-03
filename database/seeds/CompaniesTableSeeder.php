<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Company::class, 15)->create()->each(function ($u) 
        {
            $u->employees()
            ->saveMany(
                factory(App\Employee::class, rand(10,30))->make()
            );
            $u->comments()->saveMany(
                factory(App\Comment::class, rand(1,10))->make()
            );
        });
    }
}
