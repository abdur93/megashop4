<?php
	echo main_sidebar_dropdown([
		"name"=>"Inventory",
		"icon"=>" fa-solid fa-warehouse nav-icon",
		"links"=>[
			["route"=>"categories","text"=>"Manage Category","icon"=>"far fa-circle nav-icon"],
			["route"=>"sections","text"=>"Manage Section","icon"=>"far fa-circle nav-icon"],
			["route"=>"uom","text"=>"Manage Uom","icon"=>"far fa-circle nav-icon"],
			["route"=>"products","text"=>"Manage Products","icon"=>"far fa-circle nav-icon"],
		]
	]);
?>

<!-- <li class="nav-item">
	<a href="#" class="nav-link">
		<i class="nav-icon fa fa-wrench"></i>
			<p>Inventory <i class="right fas fa-angle-left"></i></p>
	</a>
	<ul class="nav nav-treeview">
        <li class="nav-item">
<a href="manage-section" class="nav-link"> <i class="far fa-circle nav-icon"></i><p>Manage Section</p></a>
		</li>
		<li class="nav-item">
<a href="manage-category" class="nav-link"> <i class="far fa-circle nav-icon"></i><p>Manage Category</p></a>
		</li>
        <li class="nav-item">
<a href="manage-product" class="nav-link"> <i class="far fa-circle nav-icon"></i><p>Manage Product</p></a>
		</li>
        <li class="nav-item">
<a href="manage-uom" class="nav-link"> <i class="far fa-circle nav-icon"></i><p>Manage Uom</p></a>
		</li>
        <li class="nav-item">
<a href="manage-manufacturer" class="nav-link"> <i class="far fa-circle nav-icon"></i><p>Manage Manufacturer</p></a>
		</li>
	</ul>
</li> -->
