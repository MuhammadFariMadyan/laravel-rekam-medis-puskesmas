<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {		
        $users = [
		[ 
			'name'	=> 'admin',
			'username'	=> 'admin',
			'email'	=> 'admin@gmail.com',
			'password'	=> bcrypt('rahasia'),
			'remember_token'	=> '',
			'created_at'	=> '2017-11-11 16:00:00',
			'updated_at'	=> '2017-11-11 16:00:00',
			'level'	=> '11',
		],
		[
			'name'	=> 'dokter',
			'username'	=> 'dokter',
			'email'	=> 'dokter@gmail.com',
			'password'	=> bcrypt('rahasia'),
			'remember_token'	=> '',
			'created_at'	=> '2017-11-11 16:00:00',
			'updated_at'	=> '2017-11-11 16:00:00',
			'level'	=> '12',
		],
		[
			'name'	=> 'pimpinan',
			'username'	=> 'pimpinan',
			'email'	=> 'pimpinan@gmail.com',
			'password'	=> bcrypt('rahasia'),
			'remember_token'	=> '',
			'created_at'	=> '2017-11-11 16:00:00',
			'updated_at'	=> '2017-11-11 16:00:00',
			'level'	=> '13',
		],
		[
			'name'	=> 'teknisi',
			'username'	=> 'teknisi',
			'email'	=> 'teknisi@gmail.com',
			'password'	=> bcrypt('rahasia'),
			'remember_token'	=> '',
			'created_at'	=> '2017-11-11 16:00:00',
			'updated_at'	=> '2017-11-11 16:00:00',
			'level'	=> '14',
		]	
		];    

		DB::table('users')->insert($users);
    }
}
