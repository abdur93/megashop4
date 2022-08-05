<?php
class Product_group implements JsonSerializable{
	private $id;
	private $name;
	private $created_at;
	private $updated_at;
	private $group_section_id;


	function __construct($_id,$_name,$_created_at,$_updated_at,$_group_section_id){
		$this->id=$_id;
		$this->name=$_name;
		$this->created_at=$_created_at;
		$this->updated_at=$_updated_at;
		$this->group_section_id=$_group_section_id;
	}

	public function set_id($id){
		$this->id=$id;
	}

	public function set_name($name){
		$this->name=$name;
	}

	public function set_created_at($created_at){
		$this->created_at=$created_at;
	}

	public function set_updated_at($updated_at){
		$this->updated_at=$updated_at;
	}

	public function set_group_section_id($group_section_id){
		$this->group_section_id=$group_section_id;
	}

	public function get_id(){
		return $this->id;
	}

	public function get_name(){
		return $this->name;
	}

	public function get_created_at(){
		return $this->created_at;
	}

	public function get_updated_at(){
		return $this->updated_at;
	}

	public function get_group_section_id(){
		return $this->group_section_id;
	}

	public function __toString(){
		return "Id:<i>$this->id</i>, Name:<i>$this->name</i>, Created_at:<i>$this->created_at</i>, Updated_at:<i>$this->updated_at</i>, Group_section_id:<i>$this->group_section_id</i>";
	}

	public function jsonSerialize(){
		return get_object_vars($this);
	}

	public function json(){
		return json_encode($this);
	}

	static function get_last_id(){
		global $db,$tx;
		$result=$db->query("select max(id) from {$tx}product_groups");
		list($last_id)=$result->fetch_row();
		return $last_id;
	}

	function save(){
		global $db,$tx;
		$db->query("insert into {$tx}product_groups(name,created_at,updated_at,group_section_id)values('$this->name','$this->created_at','$this->updated_at','$this->group_section_id')");
		return $db->insert_id;
	}

	function update(){
		global $db,$tx;
		$db->query("update {$tx}product_groups set name='$this->name',created_at='$this->created_at',updated_at='$this->updated_at',group_section_id='$this->group_section_id' where id='$this->id'");
	}

	static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}product_groups where id='$id'");
	}

	static function get_product_group($id){
		global $db,$tx;
		$result=$db->query("select name,created_at,updated_at,group_section_id from {$tx}product_groups where id='$id'");
		list($name,$created_at,$updated_at,$group_section_id)=$result->fetch_row();
		$product_group=new Product_group($id,$name,$created_at,$updated_at,$group_section_id);
		return $product_group;
	}

	static function get_obj_product_group($id){
		global $db,$tx;
		$result=$db->query("select name,created_at,updated_at,group_section_id from {$tx}product_groups where id='$id'");
		$row=$result->fetch_object();
		$product_group=new Product_group($id,$row->name,$row->created_at,$row->updated_at,$row->group_section_id);
		return $product_group;
	}

	static function get_product_group_json($id){
		global $db,$tx;
		$result=$db->query("select name,created_at,updated_at,group_section_id from {$tx}product_groups where id='$id'");
		$row=$result->fetch_object();
		$product_group=new Product_group($id,$row->name,$row->created_at,$row->updated_at,$row->group_section_id);
		return json_encode($product_group);
	}

	static function product_group_selectbox($name="cmbProduct_group"){
		global $db,$tx;
		$result=$db->query("select id,name from {$tx}product_groups");
		$html="<select id='$name' name='$name'>";
		while(list($id,$name)=$result->fetch_row()){
			$html.="<option value='$id'>$name</option>";
		}
		$html.="</select>";
		return $html;
	}

	static function manage_product_groups(){
		global $db,$tx;
		$result=$db->query("select id,name,created_at,updated_at,group_section_id from {$tx}product_groups ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Created At</th><th>Updated At</th><th>Group Section Id</th></tr>";
		while(list($id,$name,$created_at,$updated_at,$group_section_id)=$result->fetch_row()){
			$action_buttons="<div class='clearfix' style='display:flex;'>";
			$action_buttons.=action_button(["id"=>$id,"name"=>"Details","value"=>"Detials","class"=>"info","url"=>"details-product-group"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-product-group"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-product-group"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$id</td><td>$name</td><td>$created_at</td><td>$updated_at</td><td>$group_section_id</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function manage_obj_product_groups(){
		global $db,$tx;
		$result=$db->query("select id,name,created_at,updated_at,group_section_id from {$tx}product_groups ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Created At</th><th>Updated At</th><th>Group Section Id</th></tr>";
		while($row=$result->fetch_object()){
			$action_buttons="<div class='clearfix' style='display:flex;'>";
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Details","value"=>"Detials","class"=>"info","url"=>"details-product-group"]);
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-product-group"]);
			$action_buttons.=action_button(["id"=>$row->id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-product-group"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$row->id</td><td>$row->name</td><td>$row->created_at</td><td>$row->updated_at</td><td>$row->group_section_id</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_product_groups(){
		global $db,$tx;
		$result=$db->query("select id,name,created_at,updated_at,group_section_id from {$tx}product_groups ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Created At</th><th>Updated At</th><th>Group Section Id</th></tr>";
		while(list($id,$name,$created_at,$updated_at,$group_section_id)=$result->fetch_row()){
			$html.="<tr><td>$id</td><td>$name</td><td>$created_at</td><td>$updated_at</td><td>$group_section_id</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_obj_product_groups(){
		global $db,$tx;
		$result=$db->query("select id,name,created_at,updated_at,group_section_id from {$tx}product_groups ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Created At</th><th>Updated At</th><th>Group Section Id</th></tr>";
		while($row=$result->fetch_object()){
			$html.="<tr><td>$row->id</td><td>$row->name</td><td>$row->created_at</td><td>$row->updated_at</td><td>$row->group_section_id</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_product_groups_json(){
		global $db,$tx;
		$result=$db->query("select id,name,created_at,updated_at,group_section_id from {$tx}product_groups ");
		$data=[];
		while($row=$result->fetch_object()){
			array_push($data,$row);
		}
		return json_encode($data);
	}

	static function get_product_groups_site(){
		global $db,$tx;
		$result=$db->query("select id,name,created_at,updated_at,group_section_id from {$tx}product_groups ");
	    return $result;
	}

}
?>