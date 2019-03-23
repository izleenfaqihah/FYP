<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Calendar;

class EventController extends Controller
{
    public function index()
    {
    	$events = [];

       $data = Event::all();

       if($data->count()){

          foreach ($data as $key => $value) {

            $events[] = Calendar::event(

                $value->title,

                true,

                new \DateTime($value->start_event),

                new \DateTime($value->end_event.' +1 day')
            );

          }

       }

      $calendar = Calendar::addEvents($events); 

      return view('mycalender', compact('calendar'));

    }

    public function destroy($id)
    {
      $events = Event::find($id);
      $events->delete();
    }


}