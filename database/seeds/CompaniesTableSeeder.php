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
        factory(App\Company::class, 5)->create()->each(function ($u) 
        {
            $u->employees()
            ->saveMany(
                factory(App\Employee::class, rand(1,5))->make()
            );
            $u->comments()->saveMany(
                factory(App\Comment::class, rand(1,5))->make()
            );
        });
    }
}
