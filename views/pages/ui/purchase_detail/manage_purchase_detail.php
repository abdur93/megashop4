<?php
if(isset($_POST["btnDelete"])){
	$purchase_detail_id=$_POST["txtId"];
	Purchase_detail::delete($purchase_detail_id);}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Purchase_detail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Purchase_detail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card">
      <div class='card-header'>
				<a href='create-purchase_detail' class='btn btn-success'>New Purchase_detail</a>
			</div>
				<div class='card-body'>
		<?php
			echo Purchase_detail::manage_purchase_details();
		?>
			</div>
    <div class="card-footer">
      &nbsp;
    </div>
</div>

</section>
    <!-- /.content -->