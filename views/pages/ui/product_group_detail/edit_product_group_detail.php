<?php
if(isset($_POST["btnEdit"])){
	$id=$_POST["txtId"];
	$obj=Product_group_detail::get_product_group_detail($id);
}
if(isset($_POST["btnUpdate"])){
	$id=$_POST["txtId"];
		$group_id=$_POST["cmbGroup"];
	$product_id=$_POST["cmbProduct"];
	$created_at=date("Y-m-d",strtotime($_POST["txtCreated_at"]));
	$updated_at=date("Y-m-d",strtotime($_POST["txtUpdated_at"]));

	$obj=new Product_group_detail($id,$group_id,$product_id,$created_at,$updated_at);
	$obj->update();
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Product_group_detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Product_group_detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><form class='form-horizontal' action='edit-product_group_detail' method='post' enctype='multipart/form-data'><div class='card-header'>
				<a href='manage-product_group_detail' class='btn btn-success'>Manage Product_group_detail</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["type"=>"hidden","name"=>"txtId","value"=>$obj->get_id()]);
$html.=select_field(["label"=>"Group Id","name"=>"cmbGroup","table"=>"groups","value"=>$obj->get_group_id()]);
$html.=select_field(["label"=>"Product Id","name"=>"cmbProduct","table"=>"products","value"=>$obj->get_product_id()]);
$html.=input_field(["label"=>"Created At","type"=>"date","name"=>"txtCreated_at","value"=>$obj->get_created_at()]);
$html.=input_field(["label"=>"Updated At","type"=>"date","name"=>"txtUpdated_at","value"=>$obj->get_updated_at()]);

		echo $html;
?>
			</div>
				<div class='card-footer'>
<?php
	$html=input_button(["type"=>"submit","name"=>"btnUpdate","value"=>"Update"]);
		echo $html;
?>
			</div>
</form>
</section>
    <!-- /.content -->