<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Approval;
use App\File;
use App\Task;
use DB;
use Charts;

class AnalyticController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
    	/*Pie Chart*/
        // $count_proceed = Approval::where('status','=','Proceed')->whereYear('created_at', '2018')->count();
        // $count_description = Approval::where('status','=','Description')->count();
        // $pie_chart = Charts::create('pie', 'highcharts')
        // ->title("Proceed Description")
        // ->labels(['Proceed', 'Description'])
        // ->dimensions(1000,350)
        // ->responsive(true)
        // ->values([$count_proceed, $count_description]);

        /*Bar Chart*/
        $count_proceed = Approval::where('status','=','Proceed')->count();
        $count_declined = Approval::where('status','=','Decline')->count();
        $chart = Charts::create('bar', 'highcharts')
        ->elementLabel("Approval's Status")
        ->title("Status")       
        ->labels(['Proceed', 'Declined'])
        ->values([$count_proceed, $count_declined]);
        

        // Bar Chart
        // $sort_years = Approval::select(
        // DB::raw('count(approval_id) as total_approvals'),
        // DB::raw("DATE_FORMAT(created_at,'%Y') as years")
        // )->groupBy('years')->get();


        // $chart = Charts::create('bar', 'highcharts')
        // ->elementLabel("Approval's Status")
        // ->title("Status")       
        // ->labels($sort_years->pluck('years'))
        // ->values($sort_years->pluck('total_approvals'));

        $sort_years = File::select(
        DB::raw('count(file_id) as total_files'),
        DB::raw("DATE_FORMAT(created_at,'%Y') as years")
        )->groupBy('years')->get();

        $area_chart = Charts::create('area', 'highcharts')
        ->title('Total Files')
        ->elementLabel('Total Files')
        ->labels($sort_years->pluck('years'))
        ->values($sort_years->pluck('total_files'))
        ->dimensions(1000,500)
        ->responsive(true);
    	

    	/*Donut Chart*/
    	$residential = File::where('category','=','residential')->count();
        $institutional = File::where('category','=','institutional')->count();
        $assembly = File::where('category','=','assembly')->count();
        $industrial = File::where('category','=','industrial')->count();
        $business = File::where('category','=','business')->count();
        $mercantile = File::where('category','=','mercantile')->count();

        
        $donut_chart = Charts::create('donut', 'highcharts')
        ->title("Building Categories")
        ->labels(['Residential', 'Institutional','Assembly','Industrial','Business','Mercantile',])
        ->dimensions(1000,500)
        ->responsive(true)
        ->values([$residential, $institutional, $assembly, $industrial, $business, $mercantile]);

        /*Line Chart*/
        $tasks = Task::where(DB::raw("(DATE_FORMAT(created_at, '%Y'))"),date('Y'))->get();
        $line_chart = Charts::database($tasks,'line', 'highcharts')
        ->title("Tasks")
        ->elementLabel("Total Tasks")
        ->dimensions(1000,500)
        ->responsive(true)
        ->groupByMonth(date('Y'),true);


        return view('analytic', compact('area_chart', 'chart', 'donut_chart', 'line_chart', 'approvals')); 
    }

    public function year(Request $request)
    {
        $this->validate($request,[
           'year' => 'required|integer|min:2000',
            ]);
        
        $year = $request -> input('year');

        $tasks = Task::whereYear('created_at', $year)->select(
        DB::raw('count(task_id) as total_tasks'),
        DB::raw("DATE_FORMAT(created_at,'%M %Y') as months"),
        DB::raw("DATE_FORMAT(created_at,'%m') as monthKey")
        )->groupBy('months', 'monthKey')->orderBy('created_at', 'ASC')->get();

        $line_chart = Charts::database($tasks,'line', 'highcharts')
        ->title("Total Tasks")
        ->elementLabel("Total Tasks")
        ->dimensions(1000,500)
        ->responsive(true)
        ->labels($tasks->pluck('months'))
        ->values($tasks->pluck('total_tasks'));

        return view('report', compact('year', 'tasks', 'line_chart')); 

    }
    


}
