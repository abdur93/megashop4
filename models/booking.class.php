<?php
class Booking implements JsonSerializable{
	public $id;
	public $member_id;
	public $booking_date;
	public $return_date;

	public function __construct(){
	}
	public function set($id,$member_id,$booking_date,$return_date){
		$this->id=$id;
		$this->member_id=$member_id;
		$this->booking_date=$booking_date;
		$this->return_date=$return_date;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}bookings(member_id,booking_date,return_date)values('$this->member_id','$this->booking_date','$this->return_date')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}bookings set member_id='$this->member_id',booking_date='$this->booking_date',return_date='$this->return_date' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}bookings where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,member_id,booking_date,return_date from {$tx}bookings");
		$data=[];
		while($booking=$result->fetch_object()){
			$data[]=$booking;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,member_id,booking_date,return_date from {$tx}bookings $criteria limit $top,$perpage");
		$data=[];
		while($booking=$result->fetch_object()){
			$data[]=$booking;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}bookings $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,member_id,booking_date,return_date from {$tx}bookings where id='$id'");
		$booking=$result->fetch_object();
			return $booking;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}bookings");
		$booking =$result->fetch_object();
		return $booking->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Member Id:$this->member_id<br> 
		Booking Date:$this->booking_date<br> 
		Return Date:$this->return_date<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbBooking"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}bookings");
		while($booking=$result->fetch_object()){
			$html.="<option value ='$booking->id'>$booking->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}bookings $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,member_id,booking_date,return_date from {$tx}bookings $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-booking\">New Booking</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Member Id</th><th>Booking Date</th><th>Return Date</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Member Id</th><th>Booking Date</th><th>Return Date</th></tr>";
		}
		while($booking=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$booking->id, "name"=>"Details", "value"=>"Detials", "class"=>"info", "url"=>"details-booking"]);
				$action_buttons.= action_button(["id"=>$booking->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-booking"]);
				$action_buttons.= action_button(["id"=>$booking->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"bookings"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$booking->id</td><td>$booking->member_id</td><td>$booking->booking_date</td><td>$booking->return_date</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,member_id,booking_date,return_date from {$tx}bookings where id={$id}");
		$booking=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Booking Details</th></tr>";
		$html.="<tr><th>Id</th><td>$booking->id</td></tr>";
		$html.="<tr><th>Member Id</th><td>$booking->member_id</td></tr>";
		$html.="<tr><th>Booking Date</th><td>$booking->booking_date</td></tr>";
		$html.="<tr><th>Return Date</th><td>$booking->return_date</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
