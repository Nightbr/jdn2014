<?php
	
return array(

	'title' => 'Users',
	'single' => 'User',
	'model' => 'User',
	'columns' => array(
		'username' => array(
			'title' => 'Username',
		),
		'created_at' => array(
			'title' => 'Created At',
		),
		'updated_at' => array(
			'title' => 'Updated At',
		),
	),
	'edit_fields' =>array(
		'username' =>array(
			'title' => 'username',
			'type' =>'text',
		),
		'password' => array(
			'title' => 'password',
			'type' => 'password',
			'visible' => function($model){
				return !$model->exists;
			}
		),
	),
	'filters' => array(
		'username' =>array(
			'title' => 'Username',
			'type' => 'text',
		),
	),
	'sort' =>array(
		'field' =>'username',
		'direction' => 'asc',
	),
	'rules' => array(
		'username' => 'required|unique:users',
		'password' => 'required',
	),
);

?>