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

      $validator = Validator::make(Input::all(), Categorie::$rules);
		if(!$validator->fails())
      {
   		$categorie->save();
   		return Response::json(array(
   		    'error' => false,
   		    'categorie' => $categorie->toArray()),
   		    200
   		);
      }
      else
      {
         $messages = $validator->messages();
         return Response::json(array(
             'error' => true,
             'categorie' => null,
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
    * Display linked resource.
    *
    * @param  int  $id
    * @return Response
    */
   public function showGuest($id)
   {
      $catGuests = Guest::where('categorie_id', $id)->get();
 
      return Response::json(array(
            'error' => false,
            'guests' => $catGuests->toArray()),
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

      $error = false;
      $messages = "categorie updated";
 
		if ( Request::get('title') )
		{
		    $categorie->title = Request::get('title');
		}

		if ( Request::get('isInternal') || Request::get('isInternal') == 0)
		{
         $validator = Validator::make(
             array('isInternal' => Request::get('isInternal')),
             array('isInternal' => array('boolean'))
         );

         if(!$validator->fails())
         {
		      $categorie->isInternal = Request::get('isInternal');
         }
         else
         {
            $error = true;
            $messages = $validator->messages();
         }
		}


		$categorie->save();

		return Response::json(array(
		    'error' => $error ,
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
		$categorie = Categorie::find($id);
 
		$categorie->delete();
		 
		return Response::json(array(
		    'error' => false,
		    'message' => 'categorie deleted'),
		    200
		);
	}


}
