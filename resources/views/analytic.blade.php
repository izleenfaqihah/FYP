@extends('layouts.app')

@section('content')

{{ csrf_field() }}

<!DOCTYPE html>
<html>
<head>
	 <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    {{-- <link rel="styleeheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script type="text/javascript"
        src="https://public.tableau.com/javascripts/api/tableau-2.min.js"></script>
    <script type="text/javascript">
        var vizList = ["http://public.tableau.com/views/RegionalSampleWorkbook/Flights",
            "http://public.tableau.com/views/RegionalSampleWorkbook/Obesity",
            "http://public.tableau.com/views/RegionalSampleWorkbook/College",
            "http://public.tableau.com/views/RegionalSampleWorkbook/Stocks",
            "http://public.tableau.com/views/RegionalSampleWorkbook/Storms"];

        var viz,
            vizLen = vizList.length,
            vizCount = 0;

        function createViz(vizPlusMinus) {
            var vizDiv = document.getElementById("vizContainer"),
                options = {
                    hideTabs: true
                };

            vizCount = vizCount + vizPlusMinus;

            if (vizCount >= vizLen) {
            // Keep the vizCount in the bounds of the array index.
                vizCount = 0;
            } else if (vizCount < 0) {
                vizCount = vizLen - 1;
            }

            if (viz) { // If a viz object exists, delete it.
                viz.dispose();
            }

            var vizURL = vizList[vizCount];
            viz = new tableau.Viz(vizDiv, vizURL, options);
        }
    </script>
</head>
<body onload="createViz(0);">

	<div class="container">
    	<div class="row justify-content-center">
    		<div class="col-md-8">
    			<div id="vizContainer" style="width:800px; height:700px;"></div>
			    <div id="controls" style="padding:20px;">
			        <button style="width:100px;" onclick="javascript:createViz(-1);">Previous</button>
			        <button style="width:100px;" onclick="javascript:createViz(1);">Next</button>
			    </div>
    		</div>
    	</div>
    </div>

	

</body>
</html>

@endsection