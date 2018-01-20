
<?php 
session_start();
require_once("incfiles/head.php");
$idtype= $_GET['id'];
?>
<br>
<script type="text/javascript">
	function reload(){
	  	window.location.reload();
	  }
	function editbook(id){
		
		
		$('#loadeditbook'+id).html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Checking');
		setTimeout(function(){
		$('#check'+id).load('editbook.php',$('#form-editbook'+id).serializeArray());
		$('#loadeditbook'+id).html('<i class="fa fa-check-square-o" aria-hidden="true"></i> Save');
		},1000);
		
    	
    }
    function addbook(){
		$('#loadaddbook').html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Checking');
		setTimeout(function(){
			$('#check2').load('addbook.php',$('#form-addbook').serializeArray());
			$('#loadaddbook').html('<i class="fa fa-check-square-o" aria-hidden="true"></i> Add book');
		},1000);
    	
    }
</script>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-9">
<?php 
$title = mysqli_query($conn,"select * from theloai where ID=".$idtype."");
$title2 = mysqli_fetch_array($title);
?>
<button class="btn btn-success">Index: <?php echo $title2['name']; ?> </button></a>
			<table class="table table-hover">
			    <thead>
			      <tr>
			        <th>ID</th>
			        <th>Name</th>
			       	<th>Author</th>
			        <th>Quantity</th>
			        <th>Action</th>
			      </tr>
			    </thead>

			    <tbody>
			    <?php 
			    	$kq = mysqli_query($conn,"select * from dsbook where theloai=".$idtype."");
			    	while ($row = mysqli_fetch_array($kq))
			    	{
			    		?>
			     <tr>
			        <td><?php echo $row['IDbook']; ?></td>
			        <td><?php echo $row['namebook']; ?></td>
			       	<td><?php echo $row['tacgia']; ?></td>
			        <td><?php echo $row['soluong']; ?></td>

			        <td>
			        
			        <a href="delbook.php?idbook=<?php echo $row['IDbook']; ?>&idtype=<?php echo $row['theloai']; ?>"><i style="color:red; margin-right: 10px;" class="fa fa-times-circle" aria-hidden="true"></i></a>
			        <!-- Modal chỉnh sửa -->
					<a href="" data-toggle="modal" data-target="#myModal<?php echo $row['IDbook']; ?>">
					  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>
					<!-- Modal -->
					<div class="modal fade" id="myModal<?php echo $row['IDbook']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">Modify Book</h4>
					      </div>
					      <div class="modal-body">
							   <form id="form-editbook<?php echo $row['IDbook']; ?>" method="POST">
						  		<div class="form-group">
						  		<input class="form-control" name="idbook" id="idtype" value="<?php echo $row['IDbook']; ?>" type="hidden">
								    <div class="input-group">
								      <div class="input-group-addon">Name</div>
								      <input type="text" name="tensach" class="form-control" id="exampleInputAmount" placeholder="Nhập tên sách" value="<?php echo $row['namebook']; ?>">
								    </div>
								</div>
								<div class="form-group">
								    <div class="input-group">
								      <div class="input-group-addon">Quantity</div>
								      <input type="text" name="soluong" class="form-control" id="exampleInputAmount" placeholder="" value="<?php echo $row['soluong']; ?>">
								    </div>
								</div>
								<div class="form-group">
								    <div class="input-group">
								      <div class="input-group-addon">Author</div>
								      <input type="text" name="tacgia" class="form-control" id="exampleInputAmount" placeholder="Nhập tên tác giả" value="<?php echo $row['tacgia']; ?>">
								    </div>
								</div>
								<div class="form-group">
								  <label for="sel1">Type:</label>
								  <select class="form-control" name="theloai" id="sel1">
								   <?php 
							    	$kq2 = mysqli_query($conn,"select * from theloai");
							    	while ($row2 = mysqli_fetch_array($kq2))
							    	{
							    		echo'<option ';if ($row2['ID']==$row['theloai']) echo' selected="selected"'; echo' value="'.$row2['ID'].'">'.$row2['name'].'</option>';
							    	}
							    	?>

								  </select>
								</div>
								
							</form>
							<div id="check<?php echo $row['IDbook']; ?>"></div>
					        	
					      </div>
					      <div class="modal-footer">
					        <button onclick="reload();" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button id="btn-edittype" onclick="editbook(<?php echo $row['IDbook']; ?>);" type="button" class="btn btn-primary">
					        	<div id="loadeditbook<?php echo $row['IDbook']; ?>"><i class="fa fa-check-square-o" aria-hidden="true"></i> Save</div>
					        </button>
					        
					      </div>
					    </div>
					  </div>
					</div>
					<!-- end Modal chỉnh sửa -->
					</td>
			      </tr>
			     <?php } ?>
			      
			    </tbody>
			</table>
<a href="/project"> <button class="btn btn-success">Back</button></a>
		</div>
		<div class="col-md-3">
			<div class="panel panel-primary">
				  <div class="panel-heading">Add book</div>
				  <div class="panel-body">
				  <form action="addbook.php" id="form-addbook" method="POST">
				  		<div class="form-group">
						    <div class="input-group">
						      <div class="input-group-addon">Name</div>
						      <input type="text" name="tensach" class="form-control" id="exampleInputAmount" placeholder="">
						    </div>
						</div>
						<div class="form-group">
						    <div class="input-group">
						      <div class="input-group-addon">Quantity</div>
						      <input type="text" name="soluong" class="form-control" id="exampleInputAmount" placeholder="">
						    </div>
						</div>
						<div class="form-group">
						    <div class="input-group">
						      <div class="input-group-addon">Author</div>
						      <input type="text" name="tacgia" class="form-control" id="exampleInputAmount" placeholder="">
						    </div>
						</div>
						<div class="form-group">
						  <label for="sel1">Type:</label>
						  <select class="form-control" name="theloai" id="sel1">
						   <?php 
					    	$kq = mysqli_query($conn,"select * from theloai");
					    	while ($row = mysqli_fetch_array($kq))
					    	{
					    		echo'<option value="'.$row['ID'].'">'.$row['name'].'</option>';
					    	}
					    		?>

						  </select>
						</div>
						
					</form>
					<center>
						<button onclick="addbook();" name="btn-reg" class="btn btn-info"><div id="loadaddbook"><i class="fa fa-check-square-o" aria-hidden="true"></i> Add </div> </button><br>
						<font color="red" id="check2"></font>
						</center>
				  </div>
			</div>
		</div>
		<!--End  Right col -->
	</div>

</div>

<?php require_once("incfiles/end.php"); ?> 