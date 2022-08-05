<?php
//require_once("db_config.php");
if(isset($_POST["btnDetails"])){
	$adjustment=StockAdjustment::find($_POST["txtId"]);

	$warehouse=Warehouse::find($adjustment->werehouse_id);
	$adjustment_details=StockAdjustmentDetail::all_adjustment_by_id($adjustment->id);
	//print_r($adjustment_details);
  //$warehouse=Warehouse::get_warehouse($adjustment->get_werehouse_id());


  //$adjustment_details=Stock_adjustment_detail::get_stock_adjustment_details__by_order_id($adjustment_id);
 
}
?>

<style>
  #cmbCustomer {
    padding: 5px;
  }
</style>

<!-- page content for me start -->
<!-- main content area start -->
<div class="main-content">
 
  <!-- page title area start -->
  <div class="page-title-area">
    <div class="row align-items-center">
      <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
          <h4 class="page-title pull-left">Details Order</h4>
          <ul class="breadcrumbs pull-left">
            <li><a href="index.html">Home</a></li>
            <li><span>Invoice</span></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-6 clearfix">
        <div class="user-profile pull-right">
          <img class="avatar user-thumb" src="img/profile1.jpg" alt="avatar">
          <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Mohammad Rajib <i class="fa fa-angle-down"></i></h4>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Message</a>
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="logout.php">Log Out</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- page title area end -->
  <div class="main-content-inner">
    <div class="row">
      <div class="col-lg-12 mt-5">
        <div class="card">
          <div class="card-body">
            <div class="invoice-area">
             
              <div class="row align-items-center">
                
                <div class="col-md-4">
                  <div class="invoice-address">
                  <span>Adjustment ID &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp&nbsp&nbsp#<span><?php  echo $adjustment->id; ?></span></span>
                  <address>
                    Warehouse &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp&nbsp
                      <?php 
                      echo $warehouse->name;
                      //echo "<br>";
                      //echo $warehouse->mobile;
                      //echo "<br>";
                      //echo $customer->get_email();
                      ?>
                      <div class="customer-info"></div>
                    </address >
                  

                  </div>
                </div>
                <div class="col-md-4">
                  <div class="invoice-address">
                  <h3 style="text-align: center;"><strong >Daily Needs</strong></h3>
                    <p style="text-align: center;">157/C, Distrilary Road, Gendariya, Dhaka-1204</p>
                    

                  </div>
                </div>
                <div class="col-md-4 text-md-right">
                  <ul class="invoice-date">
                    <li>Adjustment Date:<?php echo $adjustment->adjustment_at; ?></li>
                  
                    
                    
                  </ul>
                </div>


              </div>
               <!-- Table row -->
          <div class="row">
            <div class="col-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>SN</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    
                    <th>Subtotal</th>
                    <!-- <th><input type="button" id="clearAll" value="Clear" /></th> -->
                  </tr>
                  <tr>
                    <?php
                    $total=0;
					$i=1;
                    foreach($adjustment_details as $row){
                      $subtotal=($row->price * $row->qty)-( $row->qty);
                      //-($row->discount * $row->qty);
                      $code ="<tr>";
                      $code .="

                      <th>".$i++."</th>
                      <th>$row->product_id</th>
                      <th>$row->price</th>
                      <th>$row->qty</th>
                     
                      <th>$subtotal</th>
                      
                     
                      ";
                      $code.="</tr>";
                      echo $code;
                      $total +=$subtotal;
                     
                      //let tax = (subtotal * 0.05).toFixed(2);
                    }
                      $tax = $total* 0.00;
                      $alltotal=$total+$tax;
                    
                    ?>
                   

                  
                  </tr>
                </thead>
                <tbody id="items">

                </tbody>
              </table>
            </div>
            <!-- /.col -->
          </div>

          <div class="row">
            <!-- accepted payments column -->
            <div class="col-6">
             

              <div>
                <strong>Remark</strong><br>
                <?php echo $adjustment->remark;?>
                
              </div>

              <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">


                Thank you for shopping

              </p>
              
            </div>
            <!-- /.col -->
            <div class="col-6">
              <p class="lead">Amount Due 2/22/2014</p>

              <div class="table-responsive">
                <table class="table">
                  <tbody>
                    <tr>
                      <th style="width:50%">Subtotal:</th>
                      <td id="subtotal"><?php echo $total;?></td>
                    </tr>
                    <!-- <tr>
                      <th>Tax (5%)</th>
                      <td id="tax"><?php //echo $tax;?></td>
                    </tr>
                    <tr>
                      <th>Shipping:</th>
                      <td id="shopping-cost">0</td>
                    </tr> -->
                    <tr>
                      <th>Total:</th>
                      <td id="net-total"><?php echo $alltotal;?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          
          <!-- /.row -->

            </div>
            <div class="invoice-buttons text-right">
            <a href="stock_adjustments" class="invoice-btn">Manage order</a>
              <a href="javascript:void(0)" class="invoice-btn">print invoice</a>
              <a href="javascript:void(0)" id="btnProcessOrder" class="invoice-btn">Process Order</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- main content area end -->


<!-- page content for me end -->




