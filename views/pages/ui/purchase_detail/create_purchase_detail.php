<?php
if(isset($_POST["btnCreate"])){

		$purchase_id=$_POST["cmbPurchase"];
	$product_id=$_POST["cmbProduct"];
	$qty=$_POST["txtQty"];
	$price=$_POST["txtPrice"];
	$vat=$_POST["txtVat"];
	$discount=$_POST["txtDiscount"];

	$obj=new Purchase_detail("",$purchase_id,$product_id,$qty,$price,$vat,$discount);
	$obj->save();
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Purchase_detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Purchase_detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><form class='form-horizontal' action='create-purchase_detail' method='post' enctype='multipart/form-data'><div class='card-header'>
				<a href='manage-purchase-detail' class='btn btn-success'>Manage Purchase_detail</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=select_field(["label"=>"Purchase Id","name"=>"cmbPurchase","table"=>"purchases"]);
$html.=select_field(["label"=>"Product Id","name"=>"cmbProduct","table"=>"products"]);
$html.=input_field(["label"=>"Qty","name"=>"txtQty"]);
$html.=input_field(["label"=>"Price","name"=>"txtPrice"]);
$html.=input_field(["label"=>"Vat","name"=>"txtVat"]);
$html.=input_field(["label"=>"Discount","name"=>"txtDiscount"]);

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