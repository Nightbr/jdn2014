<?php
 
class UserTableSeeder extends Seeder {
 
  public function run()
  {
      DB::table('users')->delete();
 
      User::create(array(
          'username' => 'adminjdn',
          'password' => 'jdnadmindede',
          'email'    => 'dede@example.com',
          'role'     => 'admin'
      ));
 
      User::create(array(
          'username' => 'apiuser1',
          'password' => 'gogogo',
          'email'    => 'roo@example.com',
          'role'     => 'api'
      ));
  }
 
}