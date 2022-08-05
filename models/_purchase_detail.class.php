<?php
class Purchase_detail implements JsonSerializable{
	private $id;
	private $purchase_id;
	private $product_id;
	private $qty;
	private $price;
	private $vat;
	private $discount;


	function __construct($_id,$_purchase_id,$_product_id,$_qty,$_price,$_vat,$_discount){
		$this->id=$_id;
		$this->purchase_id=$_purchase_id;
		$this->product_id=$_product_id;
		$this->qty=$_qty;
		$this->price=$_price;
		$this->vat=$_vat;
		$this->discount=$_discount;
	}

	public function set_id($id){
		$this->id=$id;
	}

	public function set_purchase_id($purchase_id){
		$this->purchase_id=$purchase_id;
	}

	public function set_product_id($product_id){
		$this->product_id=$product_id;
	}

	public function set_qty($qty){
		$this->qty=$qty;
	}

	public function set_price($price){
		$this->price=$price;
	}

	public function set_vat($vat){
		$this->vat=$vat;
	}

	public function set_discount($discount){
		$this->discount=$discount;
	}

	public function get_id(){
		return $this->id;
	}

	public function get_purchase_id(){
		return $this->purchase_id;
	}

	public function get_product_id(){
		return $this->product_id;
	}

	public function get_qty(){
		return $this->qty;
	}

	public function get_price(){
		return $this->price;
	}

	public function get_vat(){
		return $this->vat;
	}

	public function get_discount(){
		return $this->discount;
	}

	public function __toString(){
		return "Id:<i>$this->id</i>, Purchase_id:<i>$this->purchase_id</i>, Product_id:<i>$this->product_id</i>, Qty:<i>$this->qty</i>, Price:<i>$this->price</i>, Vat:<i>$this->vat</i>, Discount:<i>$this->discount</i>";
	}

	public function jsonSerialize(){
		return get_object_vars($this);
	}

	public function json(){
		return json_encode($this);
	}

	static function get_last_id(){
		global $db,$tx;
		$result=$db->query("select max(id) from {$tx}purchase_details");
		list($last_id)=$result->fetch_row();
		return $last_id;
	}

	function save(){
		global $db,$tx;
		$db->query("insert into {$tx}purchase_details(purchase_id,product_id,qty,price,vat,discount)values('$this->purchase_id','$this->product_id','$this->qty','$this->price','$this->vat','$this->discount')");
		return $db->insert_id;
	}

	function update(){
		global $db,$tx;
		$db->query("update {$tx}purchase_details set purchase_id='$this->purchase_id',product_id='$this->product_id',qty='$this->qty',price='$this->price',vat='$this->vat',discount='$this->discount' where id='$this->id'");
	}

	static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}purchase_details where id='$id'");
	}

	static function get_purchase_detail($id){
		global $db,$tx;
		$result=$db->query("select purchase_id,product_id,qty,price,vat,discount from {$tx}purchase_details where id='$id'");
		list($purchase_id,$product_id,$qty,$price,$vat,$discount)=$result->fetch_row();
		$purchase_detail=new Purchase_detail($id,$purchase_id,$product_id,$qty,$price,$vat,$discount);
		return $purchase_detail;
	}

	static function get_obj_purchase_detail($id){
		global $db,$tx;
		$result=$db->query("select purchase_id,product_id,qty,price,vat,discount from {$tx}purchase_details where id='$id'");
		$row=$result->fetch_object();
		$purchase_detail=new Purchase_detail($id,$row->purchase_id,$row->product_id,$row->qty,$row->price,$row->vat,$row->discount);
		return $purchase_detail;
	}

	static function get_purchase_detail_json($id){
		global $db,$tx;
		$result=$db->query("select purchase_id,product_id,qty,price,vat,discount from {$tx}purchase_details where id='$id'");
		$row=$result->fetch_object();
		$purchase_detail=new Purchase_detail($id,$row->purchase_id,$row->product_id,$row->qty,$row->price,$row->vat,$row->discount);
		return json_encode($purchase_detail);
	}

	static function purchase_detail_selectbox($name="cmbPurchase_detail"){
		global $db,$tx;
		$result=$db->query("select id,name from {$tx}purchase_details");
		$html="<select id='$name' name='$name'>";
		while(list($id,$name)=$result->fetch_row()){
			$html.="<option value='$id'>$name</option>";
		}
		$html.="</select>";
		return $html;
	}

	static function manage_purchase_details(){
		global $db,$tx;
		$result=$db->query("select id,purchase_id,product_id,qty,price,vat,discount from {$tx}purchase_details ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Purchase Id</th><th>Product Id</th><th>Qty</th><th>Price</th><th>Vat</th><th>Discount</th></tr>";
		while(list($id,$purchase_id,$product_id,$qty,$price,$vat,$discount)=$result->fetch_row()){
			$action_buttons="<div class='clearfix' style='display:flex;'>";
			$action_buttons.=action_button(["id"=>$id,"name"=>"Details","value"=>"Detials","class"=>"info","url"=>"details-purchase-detail"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-purchase-detail"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-purchase-detail"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$id</td><td>$purchase_id</td><td>$product_id</td><td>$qty</td><td>$price</td><td>$vat</td><td>$discount</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function manage_obj_purchase_details(){
		global $db,$tx;
		$result=$db->query("select id,purchase_id,product_id,qty,price,vat,discount from {$tx}purchase_details ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Purchase Id</th><th>Product Id</th><th>Qty</th><th>Price</th><th>Vat</th><th>Discount</th></tr>";
		while($row=$result->fetch_object()){
			$action_buttons="<div class='clearfix' style='display:flex;'>";
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Details","value"=>"Detials","class"=>"info","url"=>"details-purchase-detail"]);
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-purchase-detail"]);
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-purchase-detail"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$row->id</td><td>$row->purchase_id</td><td>$row->product_id</td><td>$row->qty</td><td>$row->price</td><td>$row->vat</td><td>$row->discount</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_purchase_details(){
		global $db,$tx;
		$result=$db->query("select id,purchase_id,product_id,qty,price,vat,discount from {$tx}purchase_details ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Purchase Id</th><th>Product Id</th><th>Qty</th><th>Price</th><th>Vat</th><th>Discount</th></tr>";
		while(list($id,$purchase_id,$product_id,$qty,$price,$vat,$discount)=$result->fetch_row()){
			$html.="<tr><td>$id</td><td>$purchase_id</td><td>$product_id</td><td>$qty</td><td>$price</td><td>$vat</td><td>$discount</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_obj_purchase_details(){
		global $db,$tx;
		$result=$db->query("select id,purchase_id,product_id,qty,price,vat,discount from {$tx}purchase_details ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Purchase Id</th><th>Product Id</th><th>Qty</th><th>Price</th><th>Vat</th><th>Discount</th></tr>";
		while($row=$result->fetch_object()){
			$html.="<tr><td>$row->id</td><td>$row->purchase_id</td><td>$row->product_id</td><td>$row->qty</td><td>$row->price</td><td>$row->vat</td><td>$row->discount</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_purchase_details_json(){
		global $db,$tx;
		$result=$db->query("select id,purchase_id,product_id,qty,price,vat,discount from {$tx}purchase_details ");
		$data=[];
		while($row=$result->fetch_object()){
			array_push($data,$row);
		}
		return json_encode($data);
	}

}
?>