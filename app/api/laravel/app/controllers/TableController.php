<?php

class TableController extends \BaseController {

   /**
    * Display a listing of the resource.
    *
    * @return Response
    */
   public function index()
   {
      $tables = Table::get();
 
      return Response::json(array(
          'error' => false,
          'tables' => $tables->toArray()),
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
      $table = new Table;
      $table->title = Request::get('title');
      $table->max_chairs = Request::get('max_chairs');
      $table->is_full = Request::get('is_full');

      $validator = Validator::make(Input::all(), Table::$rules);
      if(!$validator->fails())
      {
         $table->save();
         return Response::json(array(
             'error' => false,
             'table' => $table->toArray()),
             200
         );
      }
      else
      {
         $messages = $validator->messages();
         return Response::json(array(
             'error' => true,
             'table' => null,
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
      $table = Table::where('id', $id)
               ->take(1)
               ->get();
 
      return Response::json(array(
            'error' => false,
            'table' => $table->toArray()),
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
      $catGuests = Guest::where('table_id', $id)->get();
 
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
      $table = Table::find($id);

      $error = false;
      $messages = "table updated";
 
      if ( Request::get('title') )
      {
          $table->title = Request::get('title');
      }

      if ( Request::get('max_chairs') )
      {
          $table->max_chairs = Request::get('max_chairs');
      }

      if ( Request::get('is_full') || Request::get('is_full') == 0)
      {
         $validator = Validator::make(
             array('is_full' => Request::get('is_full')),
             array('is_full' => array('boolean'))
         );

         if(!$validator->fails())
         {
            $table->is_full = Request::get('is_full');
         }
         else
         {
            $error = true;
            $messages = $validator->messages();
         }
      }


      $table->save();

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
      $table = Table::find($id);
 
      $table->delete();
       
      return Response::json(array(
          'error' => false,
          'message' => 'table deleted'),
          200
      );
   }


}
