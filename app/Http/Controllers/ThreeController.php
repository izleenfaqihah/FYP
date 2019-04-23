<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Three;

class ThreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $three = Three::all();
        return view('DM',compact('three'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'three_name' => 'file|nullable|max:1999'
        ]);

        // Handle File Upload
        if ($request->hasFile('three_name')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('three_name')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('three_name')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload File
            $path = $request->file('three_name')->storeAs('public/threeD', $fileNameToStore);

        } 
            else{
                $fileNameToStore = 'nofile.pdf';
            }

        // Create File
        $three = new Three();
        $three-> three_name = $fileNameToStore;
        $three->save();

        $three = Three::latest()->first();

        return redirect('/DM')->with('success', 'File Uploaded');
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
        $this->validate($request,[
          'three_name' => 'required',
          'created_at' => 'required',
        ]);

        $three = Three::find($id);
        $three->three_name = $request->get('three_name');
        $three->created_at = $request->get('created_at');
        $three->save();
        return redirect('DM')->with('Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $three = Three::find($id);
        $three -> delete();
        return redirect()->route('DM');
    }
}
