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
        factory(App\Company::class, 10)->create()->each(function ($u) {
            $u->saveMany(
                factory(App\Employee::class, 10)->make(),
                factory(App\Comment::class, 10)->make()
            );
        });
    }
}
