<?php
class BookingApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["bookings"=>Booking::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["bookings"=>Booking::pagination($page,$perpage),"total_records"=>Booking::count()]);
	}
	function find($data){
		echo json_encode(["booking"=>Booking::find($data["id"])]);
	}
	function delete($data){
		Booking::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$booking=new Booking();
		$booking->member_id=$data["customer_id"];
		$booking->booking_date=$data["order_date"];
		$booking->return_date=$data["delivery_date"];

		$booking_id=$booking->save();


		$book=$data["products"];

		foreach($book as $i){

			$bookingdetail=new BookingDetail();
			$bookingdetail->book_register_id=$i["item_id"];
			$bookingdetail->booking_id=$booking_id;
			$bookingdetail->member_id=$data["customer_id"];
	
			$bookingdetail->save();
		}

	






		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$booking=new Booking();
		$booking->id=$data["id"];
		$booking->member_id=$data["member_id"];
		$booking->booking_date=$data["booking_date"];
		$booking->return_date=$data["return_date"];

		$booking->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
