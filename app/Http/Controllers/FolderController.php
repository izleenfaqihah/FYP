<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Folder;
use App\File;

class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $folders = Folder::all();
        $file = File::all();
        return view('/project', compact(['folders','file']));
        
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
        
                $this->validate($request,[
                    'folder_name' => 'required|string|max:255',
                    ]);

                    $folder_id = DB::table('folders')->insertGetId(array(
                    'folder_name' => $request -> folder_name
                  ));

        
        if(true) {
           $msg = [
                'message' => 'Success!',
               ];

           return redirect()->route('project', compact('folders'))->with($msg);
            
        } else {
          $msg = [
               'error' => 'Some error!',
          ];
          return redirect()->route('project', compact('folders'))->with($msg);
            
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
        $folders = Folder::find($id);
        return  view('folderDetails')->with('folders',$folders);
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
          'folder_name' => 'required',
          'created_at' => 'required',
        ]);

        $folders = Folder::find($id);
        $folders->folder_name = $request->get('folder_name');
        $folders->created_at = $request->get('created_at');
        $folders->save();
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
        $folders = Folder::find($id);
        $folders -> delete();
        return redirect()->route('project');

    }
}
