<?php
 
class CategorieTableSeeder extends Seeder {
 
  public function run()
  {
      DB::table('categories')->delete();
 
      Categorie::create(array(
          'title' => 'Promo 2010',
          'isInternal' => true
      ));
      Categorie::create(array(
          'title' => 'Promo 2011',
          'isInternal' => true
      ));
      Categorie::create(array(
          'title' => 'Promo 2012',
          'isInternal' => true
      ));
      Categorie::create(array(
          'title' => 'Promo 2013',
          'isInternal' => true
      ));
      Categorie::create(array(
          'title' => 'Promo 2014',
          'isInternal' => true
      ));
      Categorie::create(array(
          'title' => 'L5',
          'isInternal' => true
      ));
      Categorie::create(array(
          'title' => 'L4',
          'isInternal' => true
      ));
      Categorie::create(array(
          'title' => 'L3',
          'isInternal' => true
      ));
      Categorie::create(array(
          'title' => 'L2',
          'isInternal' => true
      ));
      Categorie::create(array(
          'title' => 'L1',
          'isInternal' => true
      ));
      Categorie::create(array(
          'title' => 'Externes',
          'isInternal' => false
      ));
  }
 
}