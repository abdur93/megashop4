<?php
class Product_group_detail implements JsonSerializable{
	private $id;
	private $group_id;
	private $product_id;
	private $created_at;
	private $updated_at;


	function __construct($_id,$_group_id,$_product_id,$_created_at,$_updated_at){
		$this->id=$_id;
		$this->group_id=$_group_id;
		$this->product_id=$_product_id;
		$this->created_at=$_created_at;
		$this->updated_at=$_updated_at;
	}

	public function set_id($id){
		$this->id=$id;
	}

	public function set_group_id($group_id){
		$this->group_id=$group_id;
	}

	public function set_product_id($product_id){
		$this->product_id=$product_id;
	}

	public function set_created_at($created_at){
		$this->created_at=$created_at;
	}

	public function set_updated_at($updated_at){
		$this->updated_at=$updated_at;
	}

	public function get_id(){
		return $this->id;
	}

	public function get_group_id(){
		return $this->group_id;
	}

	public function get_product_id(){
		return $this->product_id;
	}

	public function get_created_at(){
		return $this->created_at;
	}

	public function get_updated_at(){
		return $this->updated_at;
	}

	public function __toString(){
		return "Id:<i>$this->id</i>, Group_id:<i>$this->group_id</i>, Product_id:<i>$this->product_id</i>, Created_at:<i>$this->created_at</i>, Updated_at:<i>$this->updated_at</i>";
	}

	public function jsonSerialize(){
		return get_object_vars($this);
	}

	public function json(){
		return json_encode($this);
	}

	static function get_last_id(){
		global $db,$tx;
		$result=$db->query("select max(id) from {$tx}product_group_details");
		list($last_id)=$result->fetch_row();
		return $last_id;
	}

	function save(){
		global $db,$tx;
		$db->query("insert into {$tx}product_group_details(group_id,product_id,created_at,updated_at)values('$this->group_id','$this->product_id','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}

	function update(){
		global $db,$tx;
		$db->query("update {$tx}product_group_details set group_id='$this->group_id',product_id='$this->product_id',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}

	static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}product_group_details where id='$id'");
	}

	static function get_product_group_detail($id){
		global $db,$tx;
		$result=$db->query("select group_id,product_id,created_at,updated_at from {$tx}product_group_details where id='$id'");
		list($group_id,$product_id,$created_at,$updated_at)=$result->fetch_row();
		$product_group_detail=new Product_group_detail($id,$group_id,$product_id,$created_at,$updated_at);
		return $product_group_detail;
	}

	static function get_obj_product_group_detail($id){
		global $db,$tx;
		$result=$db->query("select group_id,product_id,created_at,updated_at from {$tx}product_group_details where id='$id'");
		$row=$result->fetch_object();
		$product_group_detail=new Product_group_detail($id,$row->group_id,$row->product_id,$row->created_at,$row->updated_at);
		return $product_group_detail;
	}

	static function get_product_group_detail_json($id){
		global $db,$tx;
		$result=$db->query("select group_id,product_id,created_at,updated_at from {$tx}product_group_details where id='$id'");
		$row=$result->fetch_object();
		$product_group_detail=new Product_group_detail($id,$row->group_id,$row->product_id,$row->created_at,$row->updated_at);
		return json_encode($product_group_detail);
	}

	static function product_group_detail_selectbox($name="cmbProduct_group_detail"){
		global $db,$tx;
		$result=$db->query("select id,name from {$tx}product_group_details");
		$html="<select id='$name' name='$name'>";
		while(list($id,$name)=$result->fetch_row()){
			$html.="<option value='$id'>$name</option>";
		}
		$html.="</select>";
		return $html;
	}

	static function manage_product_group_details(){
		global $db,$tx;
		$result=$db->query("select id,group_id,product_id,created_at,updated_at from {$tx}product_group_details ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Group Id</th><th>Product Id</th><th>Created At</th><th>Updated At</th></tr>";
		while(list($id,$group_id,$product_id,$created_at,$updated_at)=$result->fetch_row()){
			$action_buttons="<div class='clearfix' style='display:flex;'>";
			$action_buttons.=action_button(["id"=>$id,"name"=>"Details","value"=>"Detials","class"=>"info","url"=>"details-product-group-detail"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-product-group-detail"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-product-group-detail"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$id</td><td>$group_id</td><td>$product_id</td><td>$created_at</td><td>$updated_at</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function manage_obj_product_group_details(){
		global $db,$tx;
		$result=$db->query("select id,group_id,product_id,created_at,updated_at from {$tx}product_group_details ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Group Id</th><th>Product Id</th><th>Created At</th><th>Updated At</th></tr>";
		while($row=$result->fetch_object()){
			$action_buttons="<div class='clearfix' style='display:flex;'>";
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Details","value"=>"Detials","class"=>"info","url"=>"details-product-group-detail"]);
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-product-group-detail"]);
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-product-group-detail"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$row->id</td><td>$row->group_id</td><td>$row->product_id</td><td>$row->created_at</td><td>$row->updated_at</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_product_group_details(){
		global $db,$tx;
		$result=$db->query("select id,group_id,product_id,created_at,updated_at from {$tx}product_group_details ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Group Id</th><th>Product Id</th><th>Created At</th><th>Updated At</th></tr>";
		while(list($id,$group_id,$product_id,$created_at,$updated_at)=$result->fetch_row()){
			$html.="<tr><td>$id</td><td>$group_id</td><td>$product_id</td><td>$created_at</td><td>$updated_at</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_obj_product_group_details(){
		global $db,$tx;
		$result=$db->query("select id,group_id,product_id,created_at,updated_at from {$tx}product_group_details ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Group Id</th><th>Product Id</th><th>Created At</th><th>Updated At</th></tr>";
		while($row=$result->fetch_object()){
			$html.="<tr><td>$row->id</td><td>$row->group_id</td><td>$row->product_id</td><td>$row->created_at</td><td>$row->updated_at</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_product_group_details_json(){
		global $db,$tx;
		$result=$db->query("select id,group_id,product_id,created_at,updated_at from {$tx}product_group_details ");
		$data=[];
		while($row=$result->fetch_object()){
			array_push($data,$row);
		}
		return json_encode($data);
	}

	static function get_product_group_details_site($group_id){
		global $db,$tx;
		$result=$db->query("select id,group_id,product_id,created_at,updated_at from {$tx}product_group_details where group_id='$group_id'");
		return $result;
	}

}
?>