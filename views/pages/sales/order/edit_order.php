<?php
if(isset($_POST["btnEdit"])){
	$id=$_POST["txtId"];
	$obj=Order::get_order($id);
}
if(isset($_POST["btnUpdate"])){
	$id=$_POST["txtId"];
		$customer_id=$_POST["cmbCustomer"];
	$order_date=$_POST["txtOrder_date"];
	$delivery_date=$_POST["txtDelivery_date"];
	$shipping_address=$_POST["txtShipping_address"];
	$order_total=$_POST["txtOrder_total"];
	$paid_amount=$_POST["txtPaid_amount"];
	$remark=$_POST["txtRemark"];
	$status_id=$_POST["cmbStatus"];
	$discount=$_POST["txtDiscount"];
	$vat=$_POST["txtVat"];

	$obj=new Order($id,$customer_id,$order_date,$delivery_date,$shipping_address,$order_total,$paid_amount,$remark,$status_id,$discount,$vat);
	$obj->update();
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Order</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Order</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><form class='form-horizontal' action='edit-order' method='post' enctype='multipart/form-data'><div class='card-header'>
				<a href='manage-order' class='btn btn-success'>Manage Order</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["type"=>"hidden","name"=>"txtId","value"=>$obj->get_id()]);
$html.=select_field(["label"=>"Customer Id","name"=>"cmbCustomer","table"=>"customers","value"=>$obj->get_customer_id()]);
$html.=input_field(["label"=>"Order Date","name"=>"txtOrder_date","value"=>$obj->get_order_date()]);
$html.=input_field(["label"=>"Delivery Date","name"=>"txtDelivery_date","value"=>$obj->get_delivery_date()]);
$html.=input_field(["label"=>"Shipping Address","name"=>"txtShipping_address","value"=>$obj->get_shipping_address()]);
$html.=input_field(["label"=>"Order Total","name"=>"txtOrder_total","value"=>$obj->get_order_total()]);
$html.=input_field(["label"=>"Paid Amount","name"=>"txtPaid_amount","value"=>$obj->get_paid_amount()]);
$html.=input_field(["label"=>"Remark","name"=>"txtRemark","value"=>$obj->get_remark()]);
$html.=select_field(["label"=>"Status Id","name"=>"cmbStatus","table"=>"statuss","value"=>$obj->get_status_id()]);
$html.=input_field(["label"=>"Discount","name"=>"txtDiscount","value"=>$obj->get_discount()]);
$html.=input_field(["label"=>"Vat","name"=>"txtVat","value"=>$obj->get_vat()]);

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