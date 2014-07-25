<?php

class GuestController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$guest = Guest::get();
 
		return Response::json(array(
		    'error' => false,
		    'guest' => $guest->toArray()),
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
		$guest = new Guest;
		$guest->firstname = Request::get('firstname');
		$guest->lastname = Request::get('lastname');
		$guest->email = Request::get('email');
		$guest->isPaid = Request::get('isPaid');
		$guest->categorie()->associate(Categorie::find(Request::get('categorie_id')));
		//$guest->guest_id = Request::get('guest_id');
		 
		// La validation et le filtrage sont indispensables !!!
		// Vraiment, je suis impardonnable de laisser ça comme ça...
		 
		$guest->save();
		 
		return Response::json(array(
		    'error' => false,
		    'guest' => $guest->toArray()),
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
		$guest = Guest::where('id', $id)
          		->take(1)
          		->get();
 
  		return Response::json(array(
      		'error' => false,
      		'guest' => $guest->toArray()),
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
		$guest = Guest::find($id);
 
		if ( Request::get('firstname') )
		{
		    $guest->firstname = Request::get('firstname');
		}

		if ( Request::get('lastname') )
		{
		    $guest->lastname = Request::get('lastname');
		}

		if ( Request::get('email') )
		{
		    $guest->email = Request::get('email');
		}

		if ( Request::get('isPaid') )
		{
		    $guest->isPaid = Request::get('isPaid');
		}

		if ( Request::get('categorie_id') )
		{
		    $guest->categorie()->associate(Categorie::find(Request::get('categorie_id')));
		}

		$guest->save();

		return Response::json(array(
		    'error' => false,
		    'message' => 'guest updated'),
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
		$guest = Guest::find($id);
 
		$guest->delete();
		 
		return Response::json(array(
		    'error' => false,
		    'message' => 'guest deleted'),
		    200
		);
	}


}
