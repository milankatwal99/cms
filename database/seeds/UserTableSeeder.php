<?php

use Illuminate\Database\Seeder;

use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::where('email','laravelmilan@gmail.com')->first();

        if(!$user)
        {
            User::create(
                ['name'=>'milan',
                    'email'=>'laravelmilan@gmail.com',
                    'password'=>'0ffline1',

                    ]);
        }
    }

}
