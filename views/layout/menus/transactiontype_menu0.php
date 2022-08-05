<?php
	echo main_sidebar_dropdown([
		"name"=>"TransactionType",
		"icon"=>"nav-icon fa fa-wrench",
		"links"=>[
			["route"=>"create-transactiontype","text"=>"Create TransactionType","icon"=>"far fa-circle nav-icon"],
			["route"=>"transaction_types","text"=>"Manage TransactionType","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>
