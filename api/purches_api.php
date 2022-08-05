<?php

class PurchaseApi{

  static function save($data){
   
    // "customer_id":customer_id,
    // "order_date":order_date,
    // "delivery_date":due_date,
    // "shipping_address":shipping_address,
    // "discount":discount,
    // "vat":vat,
    // "remark":remark,
    // "order_total":order_total,
    // "products":products

    $order_date=$data["order_date"];
    $due_date=$data["delivery_date"];   
    $order_date=date("Y-m-d",strtotime($order_date));//convert date into mysql format
    $due_date=date("Y-m-d",strtotime($due_date));//convert date into mysql format

    $products=$data["products"];
       //print_r($products);
       $purchase=new Purchase();
       $purchase->supplier_id=$data["customer_id"];
       $purchase->shipping_address=$data["shipping_address"];
       $purchase->purchase_total=$data["order_total"];
       $purchase->paid_amount=0;
       $purchase->remark=$data["remark"];
       $purchase->status_id=0;
       $purchase->discount=$data["discount"];
       $purchase->vat=$data["vat"];
       $purchase->purchase_date=$order_date;
       $purchase->delivery_date=$due_date;
   
      $pid= $purchase->save(); 
    
    $now=date("Y-m-d H:i:s"); 

      // "name":name,
              // "item_id":item_id,
              // "price":price,
              // "qty":parseFloat(qty),
              // "discount":discount,
              // 'total_discount':total_discount,
              // "subtotal":subtotal


    foreach($products as $product){
      $purchasedetail=new PurchaseDetail();
      $purchasedetail->purchase_id= $pid;
      $purchasedetail->product_id=$product["item_id"];
      $purchasedetail->qty=$product["qty"];
      $purchasedetail->price=$product["price"];
      //$purchasedetail->vat=$product["vat"];
      $purchasedetail->discount=$product["discount"];
  
      $purchasedetail->save();
      
      $stock=new Stock();//1 for sales order      
      $stock->product_id=$product["item_id"];
      $stock->qty=$product["qty"];
      $stock->transaction_type_id=1;//1 for sales, 2 
      $stock->remark="Purchase";
      $stock->warehouse_id=2;
      $stock->save();
    }

   
    echo json_encode(["status" => "success"]);
  
  

  }//end function
   
}//end class
?>