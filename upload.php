<?php
include('db.php');
$obj=new database();
$message='';
// upload file  
$upload_Err=0;
if(isset($_POST['file_submit'])){
if(!empty($_FILES['file_name'])){
	$temp_url = $_FILES['file_name']['tmp_name'];
	$file_url = $_FILES['file_name']['name'];
	$fileType = strtolower(pathinfo($file_url,PATHINFO_EXTENSION));
if($_FILES['file_name']['size']>2097152){		// file size should be lessthan 2mb
	$upload_Err=1;
	$message="File size exceeded 2 MB";
}
// suported file types txt,doc,docx,pdf,png,jpeg,jpg,gif
if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif" && $fileType != "txt" && $fileType != "doc" && $fileType != "docx" && $fileType != "pdf" ){
	$upload_Err=1;
	$message.="File type not suported. Please try agin";
}
if($upload_Err==0){
	move_uploaded_file($temp_url,$file_url);
	}
}
if($upload_Err==0){
$obj->insertData($_POST,$file_url);
$message="<div class='alert alert-success' role='alert'>Sucessfully Added</div>";  // sucess message
}else{
	$message="<div class='alert alert-danger' role='alert'>".$message."</div>"; // failure message
}
}
?>
<!doctype html>
<head>
	<title>Upload File</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"  crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="row">

		<!-- navigation-->
		<nav class="navbar navbar-expand-lg navbar-light bg-light col-md-12">
			<div class="collapse navbar-collapse" >
				<div class="container">
					<div class="navbar-nav">
						<a class="nav-item nav-link" href="index.php">Dashboard</a>
						<a class="nav-item nav-link" href="history.php">Deleted Files</a>
						<a class="nav-item nav-link active" href="upload.php">Upload File</a>
					</div>
				</div>
			</div>
		</nav>
		<!-- navigation-->

		<div class="container">
			<div class="col-md-6 form-area">

				<?php echo $message;?>
				<form action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="name">File Name</label>
						<input type="" id="name" class="input-field" name="file_title" placeholder="File Title" required>
					</div>
					<div class="form-group">
						<label for="name">File description</label>
						<input type="textarea" class="input-field" name="file_description" placeholder="Description" required>
					</div>
					<div class="form-group">
						<label for="name">Attach File</label>
						<input type="file" class="input-field"  name="file_name" placeholder="File" accept=".txt,.doc,.docx,.pdf,.png,.jpeg,.jpg,.gif" required>
					</div>
					<div class="form-group">
						<input type="submit" name="file_submit" value="Upload">
					</div>
				</form>
			</div>				
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"/></script>
		
	</body>
</html>