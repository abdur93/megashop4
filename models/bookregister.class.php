<?php
class BookRegister implements JsonSerializable{
	public $id;
	public $title;
	public $author;
	public $publisher;
	public $subject_id;
	public $class_id;
	public $book_type_id;
	public $edition;
	public $self_no;
	public $rak_no;
	public $is_booked;
	public $comment;

	public function __construct(){
	}
	public function set($id,$title,$author,$publisher,$subject_id,$class_id,$book_type_id,$edition,$self_no,$rak_no,$is_booked,$comment){
		$this->id=$id;
		$this->title=$title;
		$this->author=$author;
		$this->publisher=$publisher;
		$this->subject_id=$subject_id;
		$this->class_id=$class_id;
		$this->book_type_id=$book_type_id;
		$this->edition=$edition;
		$this->self_no=$self_no;
		$this->rak_no=$rak_no;
		$this->is_booked=$is_booked;
		$this->comment=$comment;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}book_registers(title,author,publisher,subject_id,class_id,book_type_id,edition,self_no,rak_no,is_booked,comment)values('$this->title','$this->author','$this->publisher','$this->subject_id','$this->class_id','$this->book_type_id','$this->edition','$this->self_no','$this->rak_no','$this->is_booked','$this->comment')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}book_registers set title='$this->title',author='$this->author',publisher='$this->publisher',subject_id='$this->subject_id',class_id='$this->class_id',book_type_id='$this->book_type_id',edition='$this->edition',self_no='$this->self_no',rak_no='$this->rak_no',is_booked='$this->is_booked',comment='$this->comment' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}book_registers where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,title,author,publisher,subject_id,class_id,book_type_id,edition,self_no,rak_no,is_booked,comment from {$tx}book_registers");
		$data=[];
		while($bookregister=$result->fetch_object()){
			$data[]=$bookregister;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,title,author,publisher,subject_id,class_id,book_type_id,edition,self_no,rak_no,is_booked,comment from {$tx}book_registers $criteria limit $top,$perpage");
		$data=[];
		while($bookregister=$result->fetch_object()){
			$data[]=$bookregister;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}book_registers $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,title,author,publisher,subject_id,class_id,book_type_id,edition,self_no,rak_no,is_booked,comment from {$tx}book_registers where id='$id'");
		$bookregister=$result->fetch_object();
			return $bookregister;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}book_registers");
		$bookregister =$result->fetch_object();
		return $bookregister->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Title:$this->title<br> 
		Author:$this->author<br> 
		Publisher:$this->publisher<br> 
		Subject Id:$this->subject_id<br> 
		Class Id:$this->class_id<br> 
		Book Type Id:$this->book_type_id<br> 
		Edition:$this->edition<br> 
		Self No:$this->self_no<br> 
		Rak No:$this->rak_no<br> 
		Is Booked:$this->is_booked<br> 
		Comment:$this->comment<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbBookRegister"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}book_registers");
		while($bookregister=$result->fetch_object()){
			$html.="<option value ='$bookregister->id'>$bookregister->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx;
		$count_result =$db->query("select count(*) total from {$tx}book_registers $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,title,author,publisher,subject_id,class_id,book_type_id,edition,self_no,rak_no,is_booked,comment from {$tx}book_registers $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'><a class=\"btn btn-success\" href=\"create-bookregister\">New BookRegister</a></th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Title</th><th>Author</th><th>Publisher</th><th>Subject Id</th><th>Class Id</th><th>Book Type Id</th><th>Edition</th><th>Self No</th><th>Rak No</th><th>Is Booked</th><th>Comment</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Title</th><th>Author</th><th>Publisher</th><th>Subject Id</th><th>Class Id</th><th>Book Type Id</th><th>Edition</th><th>Self No</th><th>Rak No</th><th>Is Booked</th><th>Comment</th></tr>";
		}
		while($bookregister=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='clearfix' style='display:flex;'>";
				$action_buttons.= action_button(["id"=>$bookregister->id, "name"=>"Details", "value"=>"Detials", "class"=>"info", "url"=>"details-bookregister"]);
				$action_buttons.= action_button(["id"=>$bookregister->id, "name"=>"Edit", "value"=>"Edit", "class"=>"primary", "url"=>"edit-bookregister"]);
				$action_buttons.= action_button(["id"=>$bookregister->id, "name"=>"Delete", "value"=>"Delete", "class"=>"danger", "url"=>"book_registers"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$bookregister->id</td><td>$bookregister->title</td><td>$bookregister->author</td><td>$bookregister->publisher</td><td>$bookregister->subject_id</td><td>$bookregister->class_id</td><td>$bookregister->book_type_id</td><td>$bookregister->edition</td><td>$bookregister->self_no</td><td>$bookregister->rak_no</td><td>$bookregister->is_booked</td><td>$bookregister->comment</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx;
		$result =$db->query("select id,title,author,publisher,subject_id,class_id,book_type_id,edition,self_no,rak_no,is_booked,comment from {$tx}book_registers where id={$id}");
		$bookregister=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">BookRegister Details</th></tr>";
		$html.="<tr><th>Id</th><td>$bookregister->id</td></tr>";
		$html.="<tr><th>Title</th><td>$bookregister->title</td></tr>";
		$html.="<tr><th>Author</th><td>$bookregister->author</td></tr>";
		$html.="<tr><th>Publisher</th><td>$bookregister->publisher</td></tr>";
		$html.="<tr><th>Subject Id</th><td>$bookregister->subject_id</td></tr>";
		$html.="<tr><th>Class Id</th><td>$bookregister->class_id</td></tr>";
		$html.="<tr><th>Book Type Id</th><td>$bookregister->book_type_id</td></tr>";
		$html.="<tr><th>Edition</th><td>$bookregister->edition</td></tr>";
		$html.="<tr><th>Self No</th><td>$bookregister->self_no</td></tr>";
		$html.="<tr><th>Rak No</th><td>$bookregister->rak_no</td></tr>";
		$html.="<tr><th>Is Booked</th><td>$bookregister->is_booked</td></tr>";
		$html.="<tr><th>Comment</th><td>$bookregister->comment</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
