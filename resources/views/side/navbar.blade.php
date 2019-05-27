<!DOCTYPE html>
<html>
<head>  
	<meta charset="utf-8">
	
</head>
<style>
	
</style>

<body>

    <div class="list-group">
   
    <a href="{{ route('events') }}" class="list-group-item"><i class="glyphicon glyphicon-home"></i> <span>Dashboard</span></a>
	<a class="list-group-item" data-toggle="collapse" href="#submenu-2">
	    <span><i class="fa fa-briefcase"></i></span>
	    <span class="sidebar-title">Project</span>
	    <b class="caret"></b>
	</a>
	<div class="collapse list-group-submenu" id="submenu-2">
	    <a href="{{ route('project') }}" class="list-group-item sub-item" data-parent="#submenu-2" style="padding-left: 50px;"><i class="fa fa-folder"></i>Document</a>
	</div>          	
    <a href="{{ route('task') }}" class="list-group-item"><i class="glyphicon glyphicon-list"></i> <span>Task</span></a>
    <a href="{{ route('approval') }}" class="list-group-item"><i class="glyphicon glyphicon-check"></i> <span>Approval</span></a>
    <a href="{{ route('employee') }}" class="list-group-item"><i class="glyphicon glyphicon-user"></i> <span>Employee</span></a>
    <a href="{{ route('analytic') }}" class="list-group-item"><i class="fa fa-bar-chart"></i> <span>Report</span></a>


  </div>

    
</body>
</html>