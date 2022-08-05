<?php
	echo main_sidebar_dropdown([
		"name"=>"Project",
		"icon"=>"nav-icon fa fa-wrench",
		"links"=>[
			["route"=>"create-project","text"=>"Create Project","icon"=>"far fa-circle nav-icon"],
			["route"=>"projects","text"=>"Manage Project","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>
