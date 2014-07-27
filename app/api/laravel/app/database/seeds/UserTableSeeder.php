<?php
 
class UserTableSeeder extends Seeder {
 
  public function run()
  {
      DB::table('users')->delete();
 
      User::create(array(
          'username' => 'adminjdn',
          'password' => Hash::make('jdnadmindede'),
          'email'    => 'dede@example.com',
          'role'     => 'admin'
      ));
 
      User::create(array(
          'username' => 'apiuser1',
          'password' => Hash::make('gogogo'),
          'email'    => 'dede@example.com',
          'role'     => 'api'
      ));
  }
 
}