<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
		$this->call(UsersTableSeeder::class);	
        $this->call(PasienTableSeeder::class);         
        $this->call(RekamMedisTableSeeder::class);
        $this->call(DokterTableSeeder::class);
        $this->call(RujukTableSeeder::class);
        $this->call(ResepTableSeeder::class);
		
    }
}
