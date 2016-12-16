<?php
use Illuminate\Database\Seeder;
use GitoAPI\User;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        /*USERS ARRAY*/
        $users =[

            [
                'email'    => 'test1@gito.me',
                "password" => Hash::make("AAA"),
                "name"  => "Marco Taddei"
            ],
            [
                'email'    => 'test2@gito.me',
                "password" => Hash::make("AAAA"),
                "name"  => "Webmaster"
            ]
        ];

        DB::table('users')->delete();
        foreach ($users as $user){
            User::create($user);
        }

        echo 'HELLO';

    }
}