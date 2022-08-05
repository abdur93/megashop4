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
          <h4 class="page-title pull-left">Create Stock Adjustment</h4>
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
                  <span>Adjustment ID &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp&nbsp&nbsp#<span><?php  echo Stockadjustment::get_last_id() + 1; ?></span></span>
                  <address>
                  Warehouse &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp&nbsp&nbsp
                      <?php 
                      echo  Warehouse::html_select();
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
                    <li>Adjustment Date : <input type="text" id="txtStockAdjustmentDate" value=<?php echo date("d-m-Y"); ?> /></li>
                    <li>Adjustment Type : <?php echo Stockadjustmenttype::html_select(); ?></li>
                    
                    
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
                    <th>Discount</th>
                    <th>Subtotal</th>
                    <th><input type="button" id="clearAll" value="Clear" /></th>
                  </tr>
                  <tr>
                    <th></th>
                    <th>
                      <?php
                      echo Product::html_select();
                      ?>
                    </th>
                    <th><input type="text" id="txtPrice" /></th>
                    <th><input type="text" id="txtQty" /></th>
                    <th><input type="text" id="txtDiscount" /></th>
                    <th></th>
                    <th><input type="button" id="btnAddToCart" value=" + " /></th>
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
                <textarea id="txtRemark"></textarea>
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
                      <td id="subtotal">0</td>
                    </tr>
                    <!-- <tr>
                      <th>Tax (5%)</th>
                      <td id="tax">0</td>
                    </tr> -->
                    <!-- <tr>
                      <th>Shipping:</th>
                      <td id="shopping-cost">0</td>
                    </tr> -->
                    <tr>
                      <th>Total:</th>
                      <td id="net-total">0</td>
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
           
            <a href="stock_adjustments " class="invoice-btn">Manage Adjustment</a>
              <a href="javascript:void(0)" class="invoice-btn">print invoice</a>
              <a href="javascript:void(0)" id="btnStockAdjustment" class="invoice-btn">Process Adjustment</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- main content area end -->


<!-- page content for me end -->



<script>
  $(function() {
    const cart = new Cart("stock_adjustment");
    //Show calander in textbox
    $("#txtStockAdjustmentDate").datepicker({
      dateFormat: 'dd-mm-yy'
    });
    // $("#txtDueDate").datepicker({
    //   dateFormat: 'dd-mm-yy'
    // });



    //Save into database table
    $("#btnStockAdjustment").on("click", function() {
      let warehouse_id = $("#cmbWarehouse").val();
      let adjustment_date = $("#txtStockAdjustmentDate").val();
      //let due_date = $("#txtDueDate").val();
      let discount = 0;
      let vat = 0;
      let stock_adjustment_type = $("#cmbStockAdjustmentType").val();      
      let remark = $("#txtRemark").val();
      let products = cart.getCart();
     //console.log(products);
      $.ajax({
        url: 'api/StockAdjustmentApi/save',
        type: 'POST',
        data: {
          "cmbWarehouse": warehouse_id,
          "txtStockAdjustmentDate": adjustment_date,
          "txtDiscount": discount,
          "txtVat": vat,
          "txtRemark": remark,
          "cmbStockAdjustmentType": stock_adjustment_type,
          "txtProducts": products,
        },
        success: function(res) {
          console.log(res);
          cart.clearCart();
          $("#items").html("");
        }
      });

    });



    // //Show customer other information
    // $("#cmbCustomer").on("change", function() {
       
    //  // alert(id)
    //   $.ajax({
    //     url: 'api/get_customer',
    //     type: 'POST',
    //     data: {
    //       "cmbCustomer":$(this).val()
    //     },
    //     success: function(res) {
         
    //       let customer = JSON.parse(res);
    //      // console.log(customer);
    //     // alert(customer.name);

    //       $(".customer-info").html(customer.mobile + "<br>" + customer.email);
    //     }
    //   });


    // }); //   



    // //Show customer other information
    // $("#cmbProduct").on("change", function() {

    //   $.ajax({
    //     url: 'api/get_product',
    //     type: 'POST',
    //     data: {
    //       "cmbProduct": $(this).val()
    //     },
    //     success: function(res) {
    //       let product = JSON.parse(res)
    //       $("#txtPrice").val(product.offer_price);
    //       $("#txtQty").val(1);
    //     }
    //   });

    // }); //  




    //Add item to bill temporarily

    $("#btnAddToCart").on("click", function() {

      let item_id = $("#cmbProduct").val();
      
      let name = $("#cmbProduct option:selected").text();
      let price = $("#txtPrice").val();
      let qty = $("#txtQty").val();
      let discount = $("#txtDiscount").val();

      let total_discount = discount * qty;
      let subtotal = price * qty - total_discount;

      let item = {
        "name": name,
        "item_id": item_id,
        "price": price,
        "qty": parseFloat(qty),
        "discount": discount,
        'total_discount': total_discount,
        "subtotal": subtotal
      };

      cart.save(item);

      printCart();

    });



    $("body").on("click", ".delete", function() {
      let id = $(this).data("id");
      cart.delItem(id)
      printCart();
    });

    $("#clearAll").on("click", function() {
      cart.clearCart();
      printCart();
    });


    //------------------Cart Functions----------//      

    function printCart() {

      let orders=cart.getCart();
      let sn = 1;
      let $bill = "";
      let subtotal = 0;
      if(orders!=null){
      orders.forEach(function(item, i) {
        //console.log(item.name);
        subtotal += item.price * item.qty - item.discount * item.qty;
        let $html = "<tr>";
        $html += "<td>";
        $html += sn;
        $html += "</td>";
        $html += "<td>";
        $html += item.name;
        $html += "</td>";
        $html += "<td data-field='price'>";
        $html += item.price;
        $html += "</td>";
        $html += "<td data-field='qty'>";
        $html += item.qty;
        $html += "</td>";
        $html += "<td data-field='discount'>";
        $html += item.total_discount;
        $html += "</td>";
        $html += "<td data-field='subtotal'>";
        $html += item.subtotal;
        $html += "</td>";
        $html += "<td>";
        $html += "<input type='button' class='delete' data-id='" + item.item_id + "' value='-'/>";
        $html += "</td>";
        $html += "</tr>";
        $bill += $html;
        sn++;
      });
      }
      $("#items").html($bill);

      //Order Summary
      $("#subtotal").html(subtotal);
      let tax = (subtotal * 0.00).toFixed(2);
      $("#tax").html(tax);
      $("#net-total").html(parseFloat(subtotal) + parseFloat(tax));
    }
    printCart();
  });
</script>
<script src="js/cart.js"></script>