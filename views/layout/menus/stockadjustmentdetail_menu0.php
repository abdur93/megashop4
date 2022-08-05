<?php
	echo main_sidebar_dropdown([
		"name"=>"StockAdjustmentDetail",
		"icon"=>"nav-icon fa fa-wrench",
		"links"=>[
			["route"=>"create-stockadjustmentdetail","text"=>"Create StockAdjustmentDetail","icon"=>"far fa-circle nav-icon"],
			["route"=>"stock_adjustment_details","text"=>"Manage StockAdjustmentDetail","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>
