<?php
include('db.php');
$obj= new database();
@$keyword=$_REQUEST['keyword'];
$status=$_REQUEST['status'];
$pagelimt=3;
$start=0;
$cPage=1;
$pPage=0;
$condition='';
if(isset($_REQUEST['page'])){
	$cPage=$_REQUEST['page'];
	$start=($cPage-1)*$pagelimt;
}
// check the keyword string is for extension eg *pdf

if (strpos($keyword, '*') !== false) {
	$keyword = explode("*",$keyword);
	$condition="WHERE file_isdeleted='$status' AND file_url LIKE '%$keyword[1]%' LIMIT ".$start.",".$pagelimt;
}else{
	$condition="WHERE file_isdeleted='$status' AND file_title LIKE '%$keyword%' LIMIT ".$start.",".$pagelimt;
}
$fileResult=$obj->listFileTable($condition);

?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>File Name</th>
			<th>File Description</th>
			<th>Last Updated</th>
			<th>Download</th>
			<?php if(!$status){?><th>Action</th><?php } ?>
		</tr>
	</thead>
	<tbody>
		<?php
While($fileData=mysqli_fetch_assoc($fileResult)){
	extract($fileData);
	echo "<tr>
<td>$file_title</td>
<td>$file_description</td>
<td>".date('m-d-Y H:i:s',$file_last_update)."</td>
<td>
<a href='$file_url' download>Download</a></td>";
if(!$status){?>
<td><a href='?del=<?= $file_id;?>' onclick="return confirm('Are you sure you want to delete this item?');">Delete</a></td>
<?php 
}
echo "</tr>";
}

?>
	</tbody>
</table>

<div>
	<?php
/*Pagination area*/
if(isset($keyword[1])){
	$condition="where file_isdeleted='$status' AND file_url LIKE '%$keyword[1]%'";
}else{
	$condition="where file_isdeleted='$status' AND file_title LIKE '%$keyword%'";
}
$count= $obj->listFileTableTotalCount($condition);
$page=ceil($count/$pagelimt);
$pPage=($cPage>1)? $cPage-1:1;
$nPage=($cPage!=$page)? $cPage+1:$page;
?>
	<ul class="pagination">
		<li >
			<a class="page-link" data-href="<?= $pPage;?>"  href="#">Previous</a>
		</li>
		<?php for($i=1; $i<=$page;$i++){?>
		<li class="page-item">
			<a class="page-link" href="#" data-href="<?= $i;?>"><?= $i;?>
			</a>
		</li>
		<?php }?>
		<li class="page-item">
			<a class="page-link active" data-href="<?= $nPage;?>" href="#">Next</a>
		</li>
	</ul>
	<?/*pagination area ends*/?>
</div>
<script>
// script for pagination

$('.page-link').on('click',function() {
    var page = $(this).data("href");
	//alert(page);
		var status ='<?= $status;?>';
		var keyword='<?= $keyword;?>';
		//alert(keyword);
		$.ajax({
			method:'GET',
			data:{'keyword':keyword,'page':page,'status':status},
			url:'check.php',
			success:function(data){
				$('#innerdata').html(data);
			}
		})
});
</script>