<?php
	echo main_sidebar_dropdown([
		"name"=>"PurchaseDetail",
		"icon"=>"nav-icon fa fa-wrench",
		"links"=>[
			["route"=>"create-purchasedetail","text"=>"Create PurchaseDetail","icon"=>"far fa-circle nav-icon"],
			["route"=>"purchase_details","text"=>"Manage PurchaseDetail","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>
