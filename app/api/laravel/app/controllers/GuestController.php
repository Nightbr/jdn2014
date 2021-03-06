<?php

class GuestController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$guest = Guest::orderBy('firstname', 'asc')->orderBy('lastname', 'asc')->get();
 
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
		$guest->isSpecial = Request::get('isSpecial');
        $guest->categorie()->associate(Categorie::find(Request::get('categorie_id')));

      $curTable = Table::find(Request::get('table_id'));

      if($curTable->is_full)
      {
         return Response::json(array(
             'error' => true,
             'guest' => null,
             'messages' => "La table est pleine !"),
             200
         );
      }
      else
      {
         $available_chairs = ($curTable->max_chairs - $curTable->guests()->count());
         if($available_chairs  <= 0)
         {

            $curTable->is_full = true;
            $curTable->available_chairs = 0 ;
            $curTable->save();

            return Response::json(array(
             'error' => true,
             'guest' => null,
             'messages' => "La table est pleine !"),
             200
         );
         }
         else
         {
            $guest->table()->associate($curTable);
         }
      }
		//$guest->guest_id = Request::get('guest_id');
		 
		$validator = Validator::make(Input::all(), Guest::$rules);
      if(!$validator->fails())
      {
         $guest->save();
         return Response::json(array(
             'error' => false,
             'guest' => $guest->toArray()),
             200
         );
      }
      else
      {
         $messages = $validator->messages();
         return Response::json(array(
             'error' => true,
             'guest' => null,
             'messages' => $messages),
             200
         );
      }
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

      if(!$guest)
      {
         return Response::json(array(
          'error' => true,
          'messages' => 'user not found'),
          200
      );
      }

      $error = false;
      $messages = 'guest updated';
 
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
         $validator = Validator::make(
             array('email' => Request::get('email')),
             array('email' => array('email'))
         );

         if(!$validator->fails())
         {
            $guest->email = Request::get('email');
         }
         else
         {
            $error = true;
            $messages = $validator->messages();
         }
		    
		}

		if ( Request::get('isPaid') || Request::get('isPaid') == 0 )
		{
         $validator = Validator::make(
             array('isPaid' => Request::get('isPaid')),
             array('isPaid' => array('boolean'))
         );

         if(!$validator->fails())
         {
            $guest->isPaid = Request::get('isPaid');
         }
         else
         {
            $error = true;
            $messages = $validator->messages();
         }
		    
		}

        if ( Request::get('isSpecial') || Request::get('isSpecial') == 0 )
        {
         $validator = Validator::make(
             array('isSpecial' => Request::get('isSpecial')),
             array('isSpecial' => array('boolean'))
         );

         if(!$validator->fails())
         {
            $guest->isSpecial = Request::get('isSpecial');
         }
         else
         {
            $error = true;
            $messages = $validator->messages();
         }
            
        }

		if ( Request::get('categorie_id') )
		{
		    $guest->categorie()->associate(Categorie::find(Request::get('categorie_id')));
		}

		$guest->save();

		return Response::json(array(
		    'error' => $error,
		    'messages' => $messages),
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
