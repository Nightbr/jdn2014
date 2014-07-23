<?php

class UrlController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$urls = Url::where('user_id', Auth::user()->id)->get();
 
		return Response::json(array(
		    'error' => false,
		    'urls' => $urls->toArray()),
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
		$url = new Url;
		$url->url = Request::get('url');
		$url->description = Request::get('description');
		$url->user_id = Auth::user()->id;
		 
		// La validation et le filtrage sont indispensables !!!
		// Vraiment, je suis impardonnable de laisser ça comme ça...
		 
		$url->save();
		 
		return Response::json(array(
		    'error' => false,
		    'urls' => $url->toArray()),
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
		// Make sure current user owns the requested resource
  		$url = Url::where('user_id', Auth::user()->id)
          		->where('id', $id)
          		->take(1)
          		->get();
 
  		return Response::json(array(
      		'error' => false,
      		'urls' => $url->toArray()),
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
		$url = Url::where('user_id', Auth::user()->id)->find($id);
 
		if ( Request::get('url') )
		{
		    $url->url = Request::get('url');
		}

		if ( Request::get('description') )
		{
		    $url->description = Request::get('description');
		}

		$url->save();

		return Response::json(array(
		    'error' => false,
		    'message' => 'url updated'),
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
		$url = Url::where('user_id', Auth::user()->id)->find($id);
 
		$url->delete();
		 
		return Response::json(array(
		    'error' => false,
		    'message' => 'url deleted'),
		    200
		);
	}


}
