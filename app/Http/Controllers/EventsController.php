<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Category;
use App\Events;
use App\Timetable;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('events');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/admin/event')->with(['categories'=> Category::all(),'timetables'=>Timetable::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[

            'title'=> "required",
            'featured'=>'required|image',
            'contents'=>'required',
            'date'=> 'required',
            'location'=>'required',
            'time'=>'required',
            'timetable_id' => 'required',
            'category_id' => 'required'
        ]);

$featured = $request->featured;

$feature_new_name = time().$featured->getClientOriginalName();

$featured->move('images/event/',$feature_new_name);

Events::create([
    'title'=> $request->title,
    'featured'=>'images/event/'.$feature_new_name,
    'contents'=> $request->contents,
    'date'=> $request->date,
    'location'=>$request->location,
    'time'=>$request->time,
    'timetable_id' => $request->timetable_id,
    'category_id' => $request->category_id,
    'slug' => Str::slug($request->title, '-')
]);
Session::flash('success','you successfully saved an event');
return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //


        return view('events')->with(['categories'=> Category::find($id),'timetables'=>Timetable::find($id),'events'=>Events::find($id)]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
