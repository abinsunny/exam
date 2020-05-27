<!doctype html>
<head>
	<title>Deleted Files</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"  crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
</head>
<body onload="search_data('')">
	<div class="row">

		<!-- navigation-->
		<nav class="navbar navbar-expand-lg navbar-light bg-light col-md-12">
			<div class="collapse navbar-collapse" >
				<div class="container">
					<div class="navbar-nav">
						<a class="nav-item nav-link" href="index.php">Dashboard</a>
						<a class="nav-item nav-link active" href="history.php">Deleted Files</a>
						<a class="nav-item nav-link" href="upload.php">Upload File</a>
					</div>
				</div>
			</div>
		</nav>
		<!-- navigation-->

		<div class="container">
			<div class="col-md-12">
				<input type=""  name="keyword" class="keyword" placeholder="Search Deleted File" >
				</div>
				<div class="col-md-12">
					<div id="innerdata">

					</div>

				</div>				
			</div>
			
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"/></script>
			<script>

			//setup before functions
var typingTimer;                //timer identifier
var doneTypingInterval = 800;  //time in ms, 2 second for example
var $input = $('.keyword');

//on keyup, start the countdown
$input.on('keyup', function () {
  clearTimeout(typingTimer);
  typingTimer = setTimeout(search_data, doneTypingInterval);
});

//on keydown, clear the countdown 
$input.on('keydown', function () {
  clearTimeout(typingTimer);
});

function search_data(){
	var val=$('.keyword').val();
	$.ajax({
		data: {keyword: val,status:1},
		url: 'check.php',
		type: 'GET',
		success: function(data){
			$('#innerdata').html(data);
		}
	});
}
			</script>

		</body>
	</html>