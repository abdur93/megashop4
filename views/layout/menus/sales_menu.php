<?php
	echo main_sidebar_dropdown([
		"name"=>"Sales",
		"icon"=>"nav-icon fab fa-salesforce",
		"links"=>[
			["route"=>"customers","text"=>"Create Customer","icon"=>"far fa-circle nav-icon"],
			["route"=>"orders","text"=>"Manage Order","icon"=>"far fa-circle nav-icon"],
			["route"=>"status","text"=>"Manage Status","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>
