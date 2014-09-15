<?php
 
class TablesTableSeeder extends Seeder {
 
  public function run()
  {
      DB::table('tables')->delete();
 
      Table::create(array(
          'title' => 'Table01',
          'max_chairs' => 10,
          'is_full'    => False,
      ));
 
      Table::create(array(
          'title' => 'Table02',
          'max_chairs' => 10,
          'is_full'    => False,
      ));
  }
 
}