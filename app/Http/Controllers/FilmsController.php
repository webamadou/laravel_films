<?php

namespace App\Http\Controllers;

use App\Country;
use App\Film;
use Illuminate\Http\Request;
use App\Genre ;
use Illuminate\Support\Str;

class FilmsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit','update', 'destroy','listFilms']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::with(['genre','country'])->orderBy('created_at','desc')->get() ;
        return view('films.index', compact('films'));
    }

    public function listFilms()
    {
        $films = Film::with(['genre','country'])->orderBy('created_at','desc')->get() ;
        return view('films.list', compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries  = Country::pluck('name', 'id');
        $genres     = Genre::pluck('name', 'id');
        return view('films.create',compact('countries','genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request,[
            'name'         => 'required',
            'slug'         => 'required',
            'description'  => 'required',
            'release_date' => 'required',
            'rating'       => 'required|min:1|max:5',
            'ticket_price' => 'required',
            'country_id'   => 'required',
            'genre_id'     => 'required',
            'photo'        => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $film = new Film();

        if ($request->hasFile('photo')) {
            $photo  = $request->file('photo');
            $name   = Str::slug($request->name).'.'.$photo->getClientOriginalExtension();
            $destinationPath = public_path('/assets');
            $photoPath       = $destinationPath. "/".  $name;
            $photo->move($destinationPath, $name);
            $film->photo = $name;
        }

        $film->name         = $request->get('name');
        $film->slug         = $request->get('slug');
        $film->description  = $request->get('description');
        $film->release_date = $request->get('release_date');
        $film->rating       = $request->get('rating');
        $film->ticket_price = $request->get('ticket_price');
        $film->country_id   = $request->get('country_id');
        $film->genre_id     = $request->get('genre_id');

        $film->save();
        return redirect()->route('films.index')->with('success','Film saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $film = Film::find($id);
        return view('films.show',compact('film'));
    }

    /**
     * Display the specified resource based on the slug.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function film($slug)
    {
        $film = Film::where('slug',$slug)->first();
        return view('films.film',compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countries  = Country::pluck('name', 'id');
        $genres     = Genre::pluck('name', 'id');
        $film       = Film::find($id);

        return view('films.edit',compact('film','countries','genres'));
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

        $this->validate($request,[
            'name'         => 'required',
            'slug'         => 'required',
            'description'  => 'required',
            'release_date' => 'required',
            'rating'       => 'required|min:1|max:5',
            'ticket_price' => 'required',
            'country_id'   => 'required',
            'genre_id'     => 'required',
            'photo'        => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $film = Film::find($id);

        if ($request->hasFile('photo')) {
            $photo  = $request->file('photo');
            $name   = Str::slug($request->name).'.'.$photo->getClientOriginalExtension();
            $destinationPath = public_path('/assets');
            $photoPath       = $destinationPath. "/".  $name;
            $photo->move($destinationPath, $name);
            $film->photo = $name;
        }

        $film->name         = $request->get('name');
        $film->slug         = $request->get('slug');
        $film->description  = $request->get('description');
        $film->release_date = $request->get('release_date');
        $film->rating       = $request->get('rating');
        $film->ticket_price = $request->get('ticket_price');
        $film->country_id   = $request->get('country_id');
        $film->genre_id     = $request->get('genre_id');

        $film->update();
        return redirect()->route('films.show',['id'=>$id])->with('success','Film saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $film = Film::findOrFail($id);
        $film->delete();
        return redirect()->route('films.index')->with('success', 'Film deleted');
    }
}
