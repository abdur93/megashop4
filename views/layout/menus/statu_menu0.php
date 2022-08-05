<?php
	echo main_sidebar_dropdown([
		"name"=>"Statu",
		"icon"=>"nav-icon fa fa-wrench",
		"links"=>[
			["route"=>"create-statu","text"=>"Create Statu","icon"=>"far fa-circle nav-icon"],
			["route"=>"status","text"=>"Manage Statu","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>
