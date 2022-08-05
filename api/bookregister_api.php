<?php
class BookRegisterApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["book_registers"=>BookRegister::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["book_registers"=>BookRegister::pagination($page,$perpage),"total_records"=>BookRegister::count()]);
	}
	function find($data){
		echo json_encode(["bookregister"=>BookRegister::find($data["id"])]);
	}
	function delete($data){
		BookRegister::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$bookregister=new BookRegister();
		$bookregister->title=$data["title"];
		$bookregister->author=$data["author"];
		$bookregister->publisher=$data["publisher"];
		$bookregister->subject_id=$data["subject_id"];
		$bookregister->class_id=$data["class_id"];
		$bookregister->book_type_id=$data["book_type_id"];
		$bookregister->edition=$data["edition"];
		$bookregister->self_no=$data["self_no"];
		$bookregister->rak_no=$data["rak_no"];
		$bookregister->is_booked=$data["is_booked"];
		$bookregister->comment=$data["comment"];

		$bookregister->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$bookregister=new BookRegister();
		$bookregister->id=$data["id"];
		$bookregister->title=$data["title"];
		$bookregister->author=$data["author"];
		$bookregister->publisher=$data["publisher"];
		$bookregister->subject_id=$data["subject_id"];
		$bookregister->class_id=$data["class_id"];
		$bookregister->book_type_id=$data["book_type_id"];
		$bookregister->edition=$data["edition"];
		$bookregister->self_no=$data["self_no"];
		$bookregister->rak_no=$data["rak_no"];
		$bookregister->is_booked=$data["is_booked"];
		$bookregister->comment=$data["comment"];

		$bookregister->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
