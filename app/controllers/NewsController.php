<?php

class NewsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$max_number = 15;
		$start = Request::get('start');
		$number = Request::get('number');

		if ( ! $start ) {
			$start = 0;
		}
		if ( ! $number || $number > $max_number ) {
			$number = $max_number;
		}
		return News::take($number)->offset($start)->orderBy('date', 'DESC')->get();

		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return 'create';
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	    
	    $news = new News;
		$news->user_id = Auth::user()->id;
	    $news->name = Request::get('name');
		$news->date = Request::get('date');
		$news->position = Request::get('position');
		$news->team = Request::get('team');
		$news->id = Request::get('id');
		$news->nameDashDelimited = Request::get('nameDashDelimited');
		$news->report = Request::get('report');
		$news->impact = Request::get('impact');
		$news->related = Request::get('related');
		$news->sourceURL = Request::get('sourceURL');
		$news->sourceName = Request::get('sourceName');
		$exists = News::where('name', $news->name)->where('date', $news->date)->get()->count();
		if ($exists) {
			return Response::json(array(
	        'error' => true,
	        'message'=>'Already exists'),
	        200
	    	);		//
		}
	 	// Validation and Filtering is sorely needed!!
	    // Seriously, I'm a bad person for leaving that out.
	 
	    $news->save();
	 
	    return Response::json(array(
	        'error' => false,
	        'urls' => $news->toArray()),
	        200
	    );		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($min)
	{
		return 'show' . $min;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return 'edit';
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		return 'update';
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return 'destroy';
	}

	public function missingMethod($parameters = array()) {
		    return 'dancing in street';
		}

}