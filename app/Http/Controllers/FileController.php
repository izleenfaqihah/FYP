<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use App\Folder;
use Storage;
use Response;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'folder_id' => 'required|string|max:255',
            'document' => 'file|nullable|max:1999'
        ]);

        // Handle File Upload
        if ($request->hasFile('document')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('document')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('document')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload File
            $path = $request->file('document')->storeAs('public/files', $fileNameToStore);

        } 
            else{
                $fileNameToStore = 'nofile.pdf';
            }

        // Create File
        $file = new File();
        $file->folder_id = $folder_id;
        $file-> document = $fileNameToStore;
        $file->save();

        $file = File::latest()->first();

        return redirect('/project')->with('success', 'File Uploaded');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        // $url = Storage::url('sx052gmbrpel_1555940435.jpeg');
        // return "<img src='".$url."'/>";
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
          'document' => 'required',
          'created_at' => 'required',
        ]);

        $file = File::find($id);
        $file->document = $request->get('document');
        $file->created_at = $request->get('created_at');
        $file->save();
        return redirect('project')->with('Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = File::find($id);
        $file -> delete();
        return redirect()->route('project');
    }
}
