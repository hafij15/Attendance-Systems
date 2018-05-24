<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
         $admins = factory(App\Admin::class)->create([
             'admin_name' => 'Hasan',
             'email_address' => 'hasanrahman586@gmail.com',
             'admin_password' => bcrypt('admin1'),
             'access_label' => '1'
         ]);
    
		 }
    }
}
