<?php
if(isset($_POST["btnCreate"])){

		$name=$_POST["txtName"];
	$created_at=date("Y-m-d",strtotime($_POST["txtCreated_at"]));
	$updated_at=date("Y-m-d",strtotime($_POST["txtUpdated_at"]));
	$group_section_id=$_POST["cmbGroup_section"];

	$obj=new Product_group("",$name,$created_at,$updated_at,$group_section_id);
	$obj->save();
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Product_group</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Product_group</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><form class='form-horizontal' action='create-product_group' method='post' enctype='multipart/form-data'><div class='card-header'>
				<a href='manage-product-group' class='btn btn-success'>Manage Product_group</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["label"=>"Name","name"=>"txtName"]);
$html.=input_field(["label"=>"Created At","type"=>"date","name"=>"txtCreated_at"]);
$html.=input_field(["label"=>"Updated At","type"=>"date","name"=>"txtUpdated_at"]);
$html.=select_field(["label"=>"Group Section Id","name"=>"cmbGroup_section","table"=>"group_sections"]);

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