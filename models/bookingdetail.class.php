<?php
class BookingDetail implements JsonSerializable{
	public $id;
	public $book_register_id;
	public $booking_id;
	public $member_id;

	public function __construct(){
	}
	public function set($id,$book_register_id,$booking_id,$member_id){
		$this->id=$id;
		$this->book_register_id=$book_register_id;
		$this->booking_id=$booking_id;
		$this->member_id=$member_id;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}booking_details(book_register_id,booking_id,member_id)values('$this->book_register_id','$this->booking_id','$this->member_id')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}booking_details set book_register_id='$this->book_register_id',booking_id='$this->booking_id',member_id='$this->member_id' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}booking_details where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,book_register_id,booking_id,member_id from {$tx}booking_details");
		$data=[];
		while($bookingdetail=$result->fetch_object()){
			$data[]=$bookingdetail;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,book_register_id,booking_id,member_id from {$tx}booking_details $criteria limit $top,$perpage");
		$data=[];
		while($bookingdetail=$result->fetch_object()){
			$data[]=$bookingdetail;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}booking_details $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,book_register_id,booking_id,member_id from {$tx}booking_details where id='$id'");
		$bookingdetail=$result->fetch_object();
			return $bookingdetail;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}booking_details");
		$bookingdetail =$result->fetch_object();
		return $bookingdetail->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Book Register Id:$this->book_register_id<br> 
		Booking Id:$this->booking_id<br> 
		Member Id:$this->member_id<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbBookingDetail"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}booking_details");
		while($bookingdetail=$result->fetch_object()){
			$html.="<option value ='$bookingdetail->id'>$bookingdetail->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}booking_details $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,book_register_id,booking_id,member_id from {$tx}booking_details $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-bookingdetail\">New BookingDetail</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Book Register Id</th><th>Booking Id</th><th>Member Id</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Book Register Id</th><th>Booking Id</th><th>Member Id</th></tr>";
		}
		while($bookingdetail=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$bookingdetail->id, "name"=>"Details", "value"=>"Detials", "class"=>"info", "url"=>"details-bookingdetail"]);
				$action_buttons.= action_button(["id"=>$bookingdetail->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-bookingdetail"]);
				$action_buttons.= action_button(["id"=>$bookingdetail->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"booking_details"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$bookingdetail->id</td><td>$bookingdetail->book_register_id</td><td>$bookingdetail->booking_id</td><td>$bookingdetail->member_id</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,book_register_id,booking_id,member_id from {$tx}booking_details where id={$id}");
		$bookingdetail=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">BookingDetail Details</th></tr>";
		$html.="<tr><th>Id</th><td>$bookingdetail->id</td></tr>";
		$html.="<tr><th>Book Register Id</th><td>$bookingdetail->book_register_id</td></tr>";
		$html.="<tr><th>Booking Id</th><td>$bookingdetail->booking_id</td></tr>";
		$html.="<tr><th>Member Id</th><td>$bookingdetail->member_id</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
