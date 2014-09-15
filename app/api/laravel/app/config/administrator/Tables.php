<?php
   
return array(

   'title' => 'Tables',
   'single' => 'Table',
   'model' => 'Table',
   'columns' => array(
      'title' => array(
         'title' => 'Title',
      ),
      'max_chairs' => array(
         'title' => 'max Chairs',
      ),
      'is_full' =>array(
         'title' => 'Is Full',
         'select' => "IF((:table).is_full,'True','False')",
      ),
   ),
   'edit_fields' =>array(
      'title' =>array(
         'title' => 'Title',
         'type' =>'text',
      ),
      'max_chairs' =>array(
         'title' => 'Max chairs',
         'type' =>'text',
      ),
      'is_full'=> array(
         'title' => 'Is Internal',
         'type' => 'bool',
      ),
   ),
   'filters' => array(
      'title' =>array(
         'title' => 'Title',
         'type' => 'text',
      ),
      'is_full' =>array(
         'title' => 'Is full',
         'type' => 'bool',
      )
   ),
   'sort' =>array(
      'field' =>'title',
      'direction' => 'asc',
   ),
   'link' =>function($model){
      return URL::route('v1.table.show', $model->id);
   },
   'rules' => Table::$rules

);

?>