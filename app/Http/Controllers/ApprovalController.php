<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Approval;

class ApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $approvals = Approval::paginate(5);
        return view('approval', compact('approvals'));
    }

    public function search (Request $request)
    {
        $search = $request -> get('search');
        $approvals = DB::table('approvals')
        -> where ('proposal_name', 'like', '%' .$search.'%')
        -> orWhere ('status', 'like', '%' .$search.'%')->paginate(5);
        return view('approval', compact('approvals'));
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
        'proposal_name' => 'required|string|max:255',
        'status' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        ]);

      $approval_id = DB::table('approvals')->insertGetId(array(
        'proposal_name' => $request -> proposal_name,
        'status' => $request -> status,
        'description' => $request -> description
      ));

      if(true) {
           $msg = [
                'message' => 'Success!',
               ];

           return redirect()->route('approval')->with($msg);
            
        } else {
          $msg = [
               'error' => 'Some error!',
          ];
          return redirect()->route('approval')->with($msg);
            
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
          'proposal_name' => 'required',
          'status' => 'required',
          'description' => 'required',
        ]);

        $approvals = Approval::find($id);
        $approvals->proposal_name = $request->get('proposal_name');
        $approvals->status = $request->get('status');
        $approvals->description = $request->get('description');
        $approvals->save();
        return redirect('approval')->with('Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $approvals = Approval::find($id);
        $approvals -> delete();
        return redirect()->route('approval');
    }
}
