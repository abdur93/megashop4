<?php
if(isset($_POST["btnDetails"])){
	$book_id=$_POST["txtId"];
	$obj=Book::get_book($book_id);
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Book Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Book Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><div class='card-header'>
				<a href='manage-book' class='btn btn-success'>Manage Book</a>
			</div>
				<div class='card-body'>
<?php
$html="<table class='table'>";
$html.="<tr><th>Id</th><td>{$obj->get_id()}</td></tr>
<tr><th>Title</th><td>{$obj->get_title()}</td></tr>
<tr><th>Subject_id</th><td>{$obj->get_subject_id()}</td></tr>
<tr><th>Author</th><td>{$obj->get_author()}</td></tr>
<tr><th>Isbn</th><td>{$obj->get_isbn()}</td></tr>
<tr><th>Photo</th><td><img src='img/{$obj->get_photo()}' width='150' /></td></tr>
";
$html.="</table>";
		echo $html;
?>
			</div>
				<div class='card-footer'>
			</div>

</section>
    <!-- /.content -->