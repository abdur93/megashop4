<?php
if(isset($_POST["btnEdit"])){
	$id=$_POST["txtId"];
	$obj=Purchase_detail::get_purchase_detail($id);
}
if(isset($_POST["btnUpdate"])){
	$id=$_POST["txtId"];
		$purchase_id=$_POST["cmbPurchase"];
	$product_id=$_POST["cmbProduct"];
	$qty=$_POST["txtQty"];
	$price=$_POST["txtPrice"];
	$vat=$_POST["txtVat"];
	$discount=$_POST["txtDiscount"];

	$obj=new Purchase_detail($id,$purchase_id,$product_id,$qty,$price,$vat,$discount);
	$obj->update();
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Purchase_detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Purchase_detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><form class='form-horizontal' action='edit-purchase_detail' method='post' enctype='multipart/form-data'><div class='card-header'>
				<a href='manage-purchase_detail' class='btn btn-success'>Manage Purchase_detail</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["type"=>"hidden","name"=>"txtId","value"=>$obj->get_id()]);
$html.=select_field(["label"=>"Purchase Id","name"=>"cmbPurchase","table"=>"purchases","value"=>$obj->get_purchase_id()]);
$html.=select_field(["label"=>"Product Id","name"=>"cmbProduct","table"=>"products","value"=>$obj->get_product_id()]);
$html.=input_field(["label"=>"Qty","name"=>"txtQty","value"=>$obj->get_qty()]);
$html.=input_field(["label"=>"Price","name"=>"txtPrice","value"=>$obj->get_price()]);
$html.=input_field(["label"=>"Vat","name"=>"txtVat","value"=>$obj->get_vat()]);
$html.=input_field(["label"=>"Discount","name"=>"txtDiscount","value"=>$obj->get_discount()]);

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