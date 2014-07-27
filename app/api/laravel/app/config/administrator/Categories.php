<?php
	
return array(

	'title' => 'Categories',
	'single' => 'Categorie',
	'model' => 'Categorie',
	'columns' => array(
		'title' => array(
			'title' => 'Title',
		),
		'isInternal' =>array(
			'title' => 'Is Internal',
			'select' => "IF((:table).isInternal,'True','False')",
		),
	),
	'edit_fields' =>array(
		'title' =>array(
			'title' => 'Title',
			'type' =>'text',
		),
		'isInternal'=> array(
			'title' => 'Is Internal',
			'type' => 'bool',
		),
	),
	'filters' => array(
		'title' =>array(
			'title' => 'Title',
			'type' => 'text',
		),
		'isInternal' =>array(
			'title' => 'Is Internal',
			'type' => 'bool',
		)
	),
	'sort' =>array(
		'field' =>'title',
		'direction' => 'asc',
	),
	'link' =>function($model){
		return URL::route('v1.categorie.show', $model->id);
	},
	'rules' => array(
		'title' => 'required',
	),

);

?>