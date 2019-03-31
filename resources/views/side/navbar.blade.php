<!DOCTYPE html>
<html>
<head>  
	<meta charset="utf-8">
	
</head>
<style>
	
</style>

<body>

    <div class="list-group">
   
    <a href="{{ route('events') }}" class="list-group-item"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
	<a class="list-group-item" data-toggle="collapse" href="#submenu-2">
	    <span><i class="fa fa-briefcase"></i></span>
	    <span class="sidebar-title">Project</span>
	    <b class="caret"></b>
	</a>
	<div class="collapse list-group-submenu" id="submenu-2">
	    <a href="{{ route('project') }}" class="list-group-item sub-item" data-parent="#submenu-2" style="padding-left: 50px;"><i class="fa fa-folder"></i>Document</a>
	    <a href="{{ route('DM') }}" class="list-group-item sub-item" data-parent="#submenu-2" style="padding-left: 50px;"><i class="fa fa-cubes"></i>3D Model</a>
	</div>          	
    <a href="{{ route('task') }}" class="list-group-item"><i class="fa fa-list"></i> <span>Task</span></a>
    <a href="{{ route('analytic') }}" class="list-group-item"><i class="fa fa-bar-chart"></i> <span>Analytic</span></a>


  </div>

    
</body>
</html>