<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shark;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;


class sharkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         // get all the sharks
         $sharks = Shark::all();

         // load the view and pass the sharks
         return view('sharks.index')
             ->with('sharks', $sharks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('sharks.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            'shark_level' => 'required|numeric'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('sharks/create')
                ->withErrors($validator);
        } else {
            // store
            $shark = new shark;
            $shark->name = $request->name;
            $shark->email=$request->email;
            $shark->shark_level = $request->shark_level;
            $shark->save();

            // redirect
            Session::flash('message', 'Successfully created shark!');
            return redirect('sharks');


    }
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
        // get the shark
        $shark = shark::find($id);

        // show the view and pass the shark to it
        return view('sharks.show')
            ->with('shark', $shark);
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
        $shark = shark::find($id);

        // show the edit form and pass the shark
        return view('sharks.edit')
            ->with('shark', $shark);
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
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            'shark_level' => 'required|numeric'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('sharks/' . $id . '/edit')
                ->withErrors($validator);
                
        } else {
            // store
            $shark = shark::find($id);
            $shark->name=$request->name;
            $shark->email=$request->email;
            $shark->shark_level = $request->shark_level;
            $shark->save();

            // redirect
            Session::flash('message', 'Successfully updated shark!');
            return redirect('sharks');
        }
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

        // delete
            $shark = shark::find($id);
            $shark->delete();

            // redirect
            Session::flash('message', 'Successfully deleted the shark!');
            return redirect('sharks');
    }
}
