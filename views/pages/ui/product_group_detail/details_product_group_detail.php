<?php
if(isset($_POST["btnDetails"])){
	$product_group_detail_id=$_POST["txtId"];
	$obj=Product_group_detail::get_product_group_detail($product_group_detail_id);
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product_group_detail Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product_group_detail Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><div class='card-header'>
				<a href='manage-product_group_detail' class='btn btn-success'>Manage Product_group_detail</a>
			</div>
				<div class='card-body'>
<?php
$html="<table class='table'>";
$html.="<tr><th>Id</th><td>{$obj->get_id()}</td></tr>
<tr><th>Group Id</th><td>{$obj->get_group_id()}</td></tr>
<tr><th>Product Id</th><td>{$obj->get_product_id()}</td></tr>
<tr><th>Created At</th><td>{$obj->get_created_at()}</td></tr>
<tr><th>Updated At</th><td>{$obj->get_updated_at()}</td></tr>
";
$html.="</table>";
		echo $html;
?>
			</div>
				<div class='card-footer'>
			</div>

</section>
    <!-- /.content -->