<?php
if(isset($_POST["btnDetails"])){
	$product_group_id=$_POST["txtId"];
	$obj=Product_group::get_product_group($product_group_id);
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product_group Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product_group Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><div class='card-header'>
				<a href='manage-product_group' class='btn btn-success'>Manage Product_group</a>
			</div>
				<div class='card-body'>
<?php
$html="<table class='table'>";
$html.="<tr><th>Id</th><td>{$obj->get_id()}</td></tr>
<tr><th>Name</th><td>{$obj->get_name()}</td></tr>
<tr><th>Created At</th><td>{$obj->get_created_at()}</td></tr>
<tr><th>Updated At</th><td>{$obj->get_updated_at()}</td></tr>
<tr><th>Group Section Id</th><td>{$obj->get_group_section_id()}</td></tr>
";
$html.="</table>";
		echo $html;
?>
			</div>
				<div class='card-footer'>
			</div>

</section>
    <!-- /.content -->