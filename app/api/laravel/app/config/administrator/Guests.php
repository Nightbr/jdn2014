<?php
	
return array(

	'title' => 'Guests',
	'single' => 'Guest',
	'model' => 'Guest',
	'columns' => array(
		'firstname' => array(
			'title' => 'Firstname',
		),
		'lastname' => array(
			'title'=> 'Lastname',
		),
		'email' => array(
			'title' => 'Email',
		),
		'isPaid' => array(
			'title' => 'Is Paid',
			'select' => "IF((:table).isPaid,'True', 'False')",
		),
		'categorie'=> array(
			'title' => 'Categorie',
			'relationship' => 'categorie',
			'select' =>'(:table).title',
		),
      'table'=> array(
         'title' => 'Table',
         'relationship' => 'table',
         'select' =>'(:table).title',
      ),
	),
	'edit_fields' =>array(
		'firstname' =>array(
			'title' => 'Firstname',
			'type' =>'text',
		),
		'lastname' =>array(
			'title' => 'Lastname',
			'type' =>'text',
		),
		'email' =>array(
			'title' => 'Email',
			'type' =>'text',
		),
		'isPaid' =>array(
			'title' => 'Is Paid',
			'type' =>'bool',
		),
		'categorie'=> array(
			'title' => 'Categorie',
			'type' => 'relationship',
			'name_field' =>'title',
	   ),
      'table'=> array(
         'title' => 'Table',
         'type' => 'relationship',
         'name_field' =>'title',
      ),
	),
	'filters' => array(
		'isPaid' =>array(
			'title' => 'Is Paid',
			'type' => 'bool',
		),
		'categorie'=> array(
			'title' => 'Categorie',
			'type' => 'relationship',
			'name_field' =>'title',
		),
      'table'=> array(
         'title' => 'Table',
         'type' => 'relationship',
         'name_field' =>'title',
      ),
	),
	'sort' =>array(
		'field' =>'categorie',
		'direction' => 'asc',
	),
	'link' =>function($model){
		return URL::route('v1.guest.show', $model->id);
	},
	'rules' => Guest::$rules

);

?>