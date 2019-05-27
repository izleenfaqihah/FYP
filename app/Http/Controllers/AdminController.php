<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Employee;
use DB;
use Charts;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        /*Line Chart*/
        // $employees = Employee::where(DB::raw("(DATE_FORMAT(created_at, '%Y'))"),date('Y'))->get();
        // $line_chart = Charts::database($employees,'line', 'highcharts')
        // ->title("Employees")
        // ->elementLabel("Total Employees")
        // ->dimensions(1000,500)
        // ->responsive(true)
        // ->groupByMonth(date('Y'),true);

        /*Pie Chart*/
        // $count_2018 = Employee::where('year','=','2018')->count();
        // $count_2019 = Employee::where('year','=','2019')->count();
        // $count_2017 = Employee::where('year','=','2017')->count();
        // $count_2016 = Employee::where('year','=','2016')->count();
        // $count_2015 = Employee::where('year','=','2015')->count();
        // $pie_chart = Charts::create('pie', 'highcharts')
        // ->title("Total Employee")
        // ->labels(['2018', '2019','2017','2016','2015'])
        // ->dimensions(1000,350)
        // ->responsive(true)
        // ->values([$count_2018, $count_2019, $count_2017, $count_2016, $count_2015]);
        
        // return view('admin.dashboard', compact('line_chart', 'pie_chart'));

        /*Donut Chart*/
        $male = Employee::where('gender','=','Male')->count();
        $female = Employee::where('gender','=','Female')->count();
        
        $donut_chart = Charts::create('donut', 'highcharts')
        ->title("Employee's Gender")
        ->labels(['Male', 'Female'])
        ->dimensions(1000,500)
        ->responsive(true)
        ->values([$male, $female]);

        // Bar Chart
        $sort_years = Employee::select(
        DB::raw('count(employee_id) as total_employees'),
        DB::raw("DATE_FORMAT(created_at,'%Y') as years")
        )->groupBy('years')->get();


        $chart = Charts::create('bar', 'highcharts')
        ->elementLabel("Employees")
        ->title("Total Employee")       
        ->labels($sort_years->pluck('years'))
        ->values($sort_years->pluck('total_employees'));
        

        return view('admin.dashboard', compact('chart', 'donut_chart', 'sort_years'));
    }

    public function annual(Request $request)
    {
        $this->validate($request,[
           'year' => 'required|integer|min:2000',
            ]);
        
        $year = $request -> input('year');

        $employees = Employee::whereYear('created_at', $year)->select(
        DB::raw('count(employee_id) as total_employees'),
        DB::raw("DATE_FORMAT(created_at,'%M %Y') as months"),
        DB::raw("DATE_FORMAT(created_at,'%m') as monthKey")
        )->groupBy('months', 'monthKey')->orderBy('created_at', 'ASC')->get();


        $chart = Charts::create('bar', 'highcharts')
        ->title("Status")
        ->elementLabel("Approval's Status")
        ->dimensions(1000,500)
        ->responsive(true)
        ->labels($employees->pluck('months'))
        ->values($employees->pluck('total_employees'));

        return view('admin.analytic', compact('chart', 'employees', 'year')); 

    }
}
