<?php
if(isset($_POST["btnCreate"])){

		$group_id=$_POST["cmbGroup"];
	$product_id=$_POST["cmbProduct"];
	$created_at=date("Y-m-d",strtotime($_POST["txtCreated_at"]));
	$updated_at=date("Y-m-d",strtotime($_POST["txtUpdated_at"]));

	$obj=new Product_group_detail("",$group_id,$product_id,$created_at,$updated_at);
	$obj->save();
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Product_group_detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Product_group_detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><form class='form-horizontal' action='create-product_group_detail' method='post' enctype='multipart/form-data'><div class='card-header'>
				<a href='manage-product-group-detail' class='btn btn-success'>Manage Product_group_detail</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=select_field(["label"=>"Group Id","name"=>"cmbGroup","table"=>"groups"]);
$html.=select_field(["label"=>"Product Id","name"=>"cmbProduct","table"=>"products"]);
$html.=input_field(["label"=>"Created At","type"=>"date","name"=>"txtCreated_at"]);
$html.=input_field(["label"=>"Updated At","type"=>"date","name"=>"txtUpdated_at"]);

		echo $html;
?>
			</div>
				<div class='card-footer'>
<?php
	$html=input_button(["type"=>"submit","name"=>"btnCreate","value"=>"Create"]);
		echo $html;
?>
			</div>
</form>

</section>
    <!-- /.content -->