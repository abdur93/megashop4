<?php
if(isset($_POST["btnDelete"])){
	$product_group_detail_id=$_POST["txtId"];
	Product_group_detail::delete($product_group_detail_id);}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Product_group_detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Product_group_detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card">
      <div class='card-header'>
				<a href='create-product-group-detail' class='btn btn-success'>New Product_group_detail</a>
			</div>
				<div class='card-body'>
		<?php
			echo Product_group_detail::manage_product_group_details();
		?>
			</div>
    <div class="card-footer">
      &nbsp;
    </div>
</div>

</section>
    <!-- /.content -->