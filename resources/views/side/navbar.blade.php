<!DOCTYPE html>
<html>
<head>  
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
	
</style>

<body>
	
	<div class="container-fluid">
        <div class="row">
            <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
            	
				  <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
				  <a class="nav-link" href="{{ route('project') }}">Project</a>
				  <a class="nav-link" href="{{ route('task') }}">Task</a>
				  <a class="nav-link" href="{{ route('analytic') }}">Analytic</a>

			</nav>
        </div>
    </div>

    
</body>
</html>