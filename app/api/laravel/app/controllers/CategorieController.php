<?php

class CategorieController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = Categorie::get();
 
		return Response::json(array(
		    'error' => false,
		    'categories' => $categories->toArray()),
		    200
		);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$categorie = new Categorie;
		$categorie->title = Request::get('title');
		$categorie->isInternal = Request::get('isInternal');
		 
		// La validation et le filtrage sont indispensables !!!
		// Vraiment, je suis impardonnable de laisser ça comme ça...
		 
		$categorie->save();
		 
		return Response::json(array(
		    'error' => false,
		    'categorie' => $categorie->toArray()),
		    200
		);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$categorie = Categorie::where('id', $id)
          		->take(1)
          		->get();
 
  		return Response::json(array(
      		'error' => false,
      		'categorie' => $categorie->toArray()),
      		200
  		);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$categorie = Categorie::find($id);
 
		if ( Request::get('title') )
		{
		    $categorie->title = Request::get('title');
		}

		if ( Request::get('isInternal') )
		{
		    $categorie->isInternal = Request::get('isInternal');
		}

		$categorie->save();

		return Response::json(array(
		    'error' => false,
		    'message' => 'categorie updated'),
		    200
		);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$categorie = Categorie::find($id);
 
		$categorie->delete();
		 
		return Response::json(array(
		    'error' => false,
		    'message' => 'categorie deleted'),
		    200
		);
	}


}
