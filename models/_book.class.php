<?php
class Book{
	private $id;
	private $title;
	private $subject_id;
	private $author;
	private $isbn;
	private $photo;

	function __construct($_id,$_title,$_subject_id,$_author,$_isbn,$_photo){
		$this->id=$_id;
		$this->title=$_title;
		$this->subject_id=$_subject_id;
		$this->author=$_author;
		$this->isbn=$_isbn;
		$this->photo=$_photo;
	}

	public function set_id($id){
		$this->id=$id;
	}

	public function set_title($title){
		$this->title=$title;
	}

	public function set_subject_id($subject_id){
		$this->subject_id=$subject_id;
	}

	public function set_author($author){
		$this->author=$author;
	}

	public function set_isbn($isbn){
		$this->isbn=$isbn;
	}

	public function set_photo($photo){
		$this->photo=$photo;
	}

	public function get_id(){
		return $this->id;
	}

	public function get_title(){
		return $this->title;
	}

	public function get_subject_id(){
		return $this->subject_id;
	}

	public function get_author(){
		return $this->author;
	}

	public function get_isbn(){
		return $this->isbn;
	}

	public function get_photo(){
		return $this->photo;
	}

	static function get_last_id(){
		global $db,$tx;
		$result=$db->query("select max(id) from {$tx}books");
		list($last_id)=$result->fetch_row();
		return $last_id;
	}

	function save(){
		global $db,$tx;
		$db->query("insert into {$tx}books(title,subject_id,author,isbn,photo)values('$this->title','$this->subject_id','$this->author','$this->isbn','$this->photo')");
		return $db->insert_id;
	}

	function update(){
		global $db,$tx;
		$db->query("update {$tx}books set title='$this->title',subject_id='$this->subject_id',author='$this->author',isbn='$this->isbn',photo='$this->photo' where id='$this->id'");
	}

	static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}books where id='$id'");
	}

	static function get_book($id){
		global $db,$tx;
		$result=$db->query("select title,subject_id,author,isbn,photo from {$tx}books where id='$id'");
		list($title,$subject_id,$author,$isbn,$photo)=$result->fetch_row();
		$book=new Book($id,$title,$subject_id,$author,$isbn,$photo);
		return $book;
	}

	static function book_selectbox($name="cmbBook"){
		global $db,$tx;
		$result=$db->query("select id,name from {$tx}books");
		$html="<select id='$name' name='$name'>";
		while(list($id,$name)=$result->fetch_row()){
			$html.="<option value='$id'>$name</option>";
		}
		$html.="</select>";
		return $html;
	}

	static function manage_books(){
		global $db,$tx;
		$result=$db->query("select id,title,subject_id,author,isbn,photo from {$tx}books ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Title</th><th>Subject_id</th><th>Author</th><th>Isbn</th><th>Photo</th></tr>";
		while(list($id,$title,$subject_id,$author,$isbn,$photo)=$result->fetch_row()){
			$action_buttons="<div class='clearfix' style='display:flex;'>";
			$action_buttons.=action_button(["id"=>$id,"name"=>"Details","value"=>"Detials","class"=>"info","url"=>"details-book"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-book"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-book"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$id</td><td>$title</td><td>$subject_id</td><td>$author</td><td>$isbn</td><td><img src='img/$photo' width='150' /> </td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_books(){
		global $db,$tx;
		$result=$db->query("select id,title,subject_id,author,isbn,photo from {$tx}books ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Title</th><th>Subject_id</th><th>Author</th><th>Isbn</th><th>Photo</th></tr>";
		while(list($id,$title,$subject_id,$author,$isbn,$photo)=$result->fetch_row()){
			$html.="<tr><td>$id</td><td>$title</td><td>$subject_id</td><td>$author</td><td>$isbn</td><td><img src='img/$photo' width='150' /> </td></tr>";
		}
		$html.="</table>";
		return $html;
	}

}
?>