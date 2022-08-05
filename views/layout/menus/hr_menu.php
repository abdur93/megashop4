<?php
	echo main_sidebar_dropdown([
		"name"=>"HRM",
		"icon"=>"nav-icon fa fa-tasks",
		"links"=>[
			["route"=>"persons","text"=>"Manage Person","icon"=>"nav-icon far fa-circle"],
			["route"=>"positions","text"=>"Manage Position","icon"=>"nav-icon far fa-circle"],
			["route"=>"roles","text"=>"Manage Role","icon"=>"nav-icon far fa-circle"],
			["route"=>"users","text"=>"Manage User","icon"=>"nav-icon far fa-circle"],
			// ["route"=>"departments","text"=>"Manage Department","icon"=>"nav-icon far fa-circle"],
		]
	]);
?>


<!-- <li class="nav-item">
	<a href="#" class="nav-link">
		<i class="nav-icon fa fa-wrench"></i>
			<p>HR <i class="right fas fa-angle-left"></i></p>
	</a>
	<ul class="nav nav-treeview">
		<li class="nav-item">
<a href="manage-department" class="nav-link"> <i class="far fa-circle nav-icon"></i><p>Manage Department</p></a>
		</li>

        <li class="nav-item">
<a href="manage-position" class="nav-link"> <i class="far fa-circle nav-icon"></i><p>Manage Position</p></a>
		</li>

        <li class="nav-item">
<a href="manage-person" class="nav-link"> <i class="far fa-circle nav-icon"></i><p>Manage Person</p></a>
		</li>


	</ul>
</li> -->
