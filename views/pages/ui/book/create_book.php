<?php
if(isset($_POST["btnCreate"])){

		$title=$_POST["txtTitle"];
	$subject_id=$_POST["cmbSubject"];
	$author=$_POST["txtAuthor"];
	$isbn=$_POST["txtIsbn"];
	$file=$_FILES["filePhoto"];
	$photo=upload($file,"img",$title);

	$obj=new Book("",$title,$subject_id,$author,$isbn,$photo);
	$obj->save();
}
?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Book</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Book</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">     
     <div class="card"><form class='form-horizontal' action='create-book' method='post' enctype='multipart/form-data'><div class='card-header'>
				<a href='manage-book' class='btn btn-success'>Manage Book</a>
			</div>
				<div class='card-body'>
<?php
$html="";
$html.=input_field(["label"=>"Title","name"=>"txtTitle"]);
$html.=select_field(["label"=>"Subject","name"=>"cmbSubject","table"=>"subjects"]);
$html.=input_field(["label"=>"Author","name"=>"txtAuthor"]);
$html.=input_field(["label"=>"Isbn","name"=>"txtIsbn"]);
$html.=input_field(["label"=>"Photo","type"=>"file","name"=>"filePhoto"]);

		echo $html;
?>
			</div>
				<div class='card-footer'>
<?php
	$html=input_button(["type"=>"submit","name"=>"btnCreate","value"=>"Create"]);
		echo $html;
?>
			</div>
</form>

</section>
    <!-- /.content -->