<?php
	echo main_sidebar_dropdown([
		"name"=>"Role",
		"icon"=>"nav-icon fa fa-wrench",
		"links"=>[
			["route"=>"create-role","text"=>"Create Role","icon"=>"far fa-circle nav-icon"],
			["route"=>"roles","text"=>"Manage Role","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>
