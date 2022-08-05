<?php
if(isset($_POST["btnEdit"])){
	$id=$_POST["txtId"];
	$obj=Product_group::get_product_group($id);
}
if(isset($_POST["btnUpdate"])){
	$id=$_POST["txtId"];
		$name=$_POST["txtName"];
	$created_at=date("Y-m-d",strtotime($_POST["txtCreated_at"]));
	$updated_at=date("Y-m-d",strtotime($_POST["txtUpdated_at"]));
	$group_section_id=$_POST["cmbGroup_section"];

	$obj=new Product_group($id,$name,$created_at,$updated_at,$group_section_id);
	$obj->update();
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Product_group</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Product_group</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><form class='form-horizontal' action='edit-product_group' method='post' enctype='multipart/form-data'><div class='card-header'>
				<a href='manage-product_group' class='btn btn-success'>Manage Product_group</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["type"=>"hidden","name"=>"txtId","value"=>$obj->get_id()]);
$html.=input_field(["label"=>"Name","name"=>"txtName","value"=>$obj->get_name()]);
$html.=input_field(["label"=>"Created At","type"=>"date","name"=>"txtCreated_at","value"=>$obj->get_created_at()]);
$html.=input_field(["label"=>"Updated At","type"=>"date","name"=>"txtUpdated_at","value"=>$obj->get_updated_at()]);
$html.=select_field(["label"=>"Group Section Id","name"=>"cmbGroup_section","table"=>"group_sections","value"=>$obj->get_group_section_id()]);

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