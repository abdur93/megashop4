<?php
	echo main_sidebar_dropdown([
		"name"=>"Purchase",
		"icon"=>"nav-icon fas fa-shopping-basket",
		"links"=>[
			["route"=>"purchases","text"=>"Manage Purchase","icon"=>"far fa-circle nav-icon"],			
			["route"=>"suppliers","text"=>"Manage Supplier","icon"=>"far fa-circle nav-icon"],
			["route"=>"transaction_types","text"=>"Manage Transaction Type","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>
