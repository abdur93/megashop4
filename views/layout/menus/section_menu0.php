<?php
	echo main_sidebar_dropdown([
		"name"=>"Section",
		"icon"=>"nav-icon fa fa-wrench",
		"links"=>[
			["route"=>"create-section","text"=>"Create Section","icon"=>"far fa-circle nav-icon"],
			["route"=>"sections","text"=>"Manage Section","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>
