<?php
if(isset($_POST["btnDetails"])){
	$purchase_detail_id=$_POST["txtId"];
	$obj=Purchase_detail::get_purchase_detail($purchase_detail_id);
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Purchase_detail Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Purchase_detail Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><div class='card-header'>
				<a href='manage-purchase_detail' class='btn btn-success'>Manage Purchase_detail</a>
			</div>
				<div class='card-body'>
<?php
$html="<table class='table'>";
$html.="<tr><th>Id</th><td>{$obj->get_id()}</td></tr>
<tr><th>Purchase Id</th><td>{$obj->get_purchase_id()}</td></tr>
<tr><th>Product Id</th><td>{$obj->get_product_id()}</td></tr>
<tr><th>Qty</th><td>{$obj->get_qty()}</td></tr>
<tr><th>Price</th><td>{$obj->get_price()}</td></tr>
<tr><th>Vat</th><td>{$obj->get_vat()}</td></tr>
<tr><th>Discount</th><td>{$obj->get_discount()}</td></tr>
";
$html.="</table>";
		echo $html;
?>
			</div>
				<div class='card-footer'>
			</div>

</section>
    <!-- /.content -->