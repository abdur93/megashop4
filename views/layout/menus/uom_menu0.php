<?php
	echo main_sidebar_dropdown([
		"name"=>"Uom",
		"icon"=>"nav-icon fa fa-wrench",
		"links"=>[
			["route"=>"create-uom","text"=>"Create Uom","icon"=>"far fa-circle nav-icon"],
			["route"=>"uom","text"=>"Manage Uom","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>
