<?php
	echo main_sidebar_dropdown([
		"name"=>"Category",
		"icon"=>"nav-icon fa fa-wrench",
		"links"=>[
			["route"=>"create-category","text"=>"Create Category","icon"=>"far fa-circle nav-icon"],
			["route"=>"categories","text"=>"Manage Category","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>
