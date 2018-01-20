<?php 

//session_start(); //myadd
require_once("incfiles/head.php");
?>
<br>
<script type="text/javascript">
  function reload(){
  	window.location.reload();
  }
function addtype(){
		$('#loadaddtype').html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Checking');
		setTimeout(function(){
			$('#check').load('addtype.php',$('#form-addtype').serializeArray());
			$('#loadaddtype').html('<i class="fa fa-check-square-o" aria-hidden="true"></i> Add Type');
		},1000);
    	
    }
function addbook(){
		$('#loadaddbook').html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Checking');
		setTimeout(function(){
			$('#check2').load('addbook.php',$('#form-addbook').serializeArray());
			$('#loadaddbook').html('<i class="fa fa-check-square-o" aria-hidden="true"></i> Add book');
		},1000);
    	
    }
    
function edittype(id){
		console.log(id);
		
		$('#loadedittype'+id).html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Checking');
		setTimeout(function(){
		$('#check'+id).load('edittype.php',$('#form-edittype'+id).serializeArray());
		$('#loadedittype'+id).html('<i class="fa fa-check-square-o" aria-hidden="true"></i> Save');
		},1000);
		
    	
    }
   

</script>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-9">
			<table class="table table-hover">
			    <thead>
			      <tr>
			        <th>ID</th>
			        <th>Type</th>
			        <th>Quantity</th>
			        <th>Action</th>
			      </tr>
			    </thead>

			    <tbody>
			    <?php 
			    	$result = mysqli_query($conn,"select * from theloai");
			    	// test
			    	if(!$result)
					{
					    echo 'SQL error: '.mysqli_error();
					    echo "\r\n<br />";
					    echo 'SQL: '.$result;
					    exit;
					}
			    	while ($row = mysqli_fetch_array($result))
			    	{
			    		$query_sl = mysqli_num_rows(mysqli_query($conn,"select * from dsbook where theloai = ".$row['ID'].""));
			    	
			    		?>
			     <tr>
			        <td><?php echo $row['ID']; ?></td>
			        <td><?php echo $row['name']; ?></td>
			        <td><?php echo $query_sl; ?></td>
			        <td>
			        <!-- View danh sách book -->
			        <a href="viewlistbook.php?id=<?php echo $row['ID']; ?>"><i class="fa fa-eye" style="color:#5bc0de; margin-right: 10px;" aria-hidden="true"></i></a>
			         <!-- Xóa thể loại -->
			        <a href="deltype.php?id=<?php echo $row['ID']; ?>"><i style="color:red; margin-right: 10px;" class="fa fa-times-circle" aria-hidden="true"></i></a>
			         <!-- chỉnh sửa thể loại -->
			        <!-- Button trigger modal -->
					<a href="" data-toggle="modal" data-target="#myModal<?php echo $row['ID']; ?>">
					  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>
					<!-- Modal -->
					<div class="modal fade" id="myModal<?php echo $row['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">Modify Type</h4>
					      </div>
					      <div class="modal-body">
					        	<form method="POST" id="form-edittype<?php echo $row['ID']; ?>">
					        		<input class="form-control" name="idtype" id="idtype" value="<?php echo $row['ID']; ?>" type="hidden">
					        		<input class="form-control" type="text" name="theloai" id="etheloai" value="<?php echo $row['name']; ?>">
					        	</form><br>
					        	<div id="check<?php echo $row['ID']; ?>"></div>
					        	
					      </div>
					      <div class="modal-footer">
					        <button onclick="reload();" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button id="btn-edittype" onclick="edittype(<?php echo $row['ID']; ?>);" type="button" class="btn btn-primary">
					        	<div id="loadedittype<?php echo $row['ID']; ?>"><i class="fa fa-check-square-o" aria-hidden="true"></i> Save</div>
					        </button>
					        
					      </div>
					    </div>
					  </div>
					</div>
					 <!-- end modal -->
			        
					</td>
			      </tr>
			     <?php } ?>
			      <tr>
			      	<td></td>
			      	<td>
			      	<form id="form-addtype" method="POST">
			      	<input type="text" class="form-control" name ="theloai" id="exampleInputAmount" placeholder="Input new type"></td>
			      	<td colspan="2">
			      	</form>
			      	<button onclick="addtype();" name="btn-reg" class="btn btn-info"><div id="loadaddtype"><i class="fa fa-check-square-o" aria-hidden="true"></i> Add Type</div> </button>
					<font color="red" id="check"></font>
			      	</td>
			      </tr>
			    </tbody>
			</table>
		</div>
		<!-- Right col -->
		<div class="col-md-3">
			<div class="panel panel-primary">
				  <div class="panel-heading">Add Book</div>
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
						    	$result = mysqli_query($conn,"select * from theloai");
						    	while ($row = mysqli_fetch_array($result))
						    	{
						    		echo'<option value="'.$row['ID'].'">'.$row['name'].'</option>';
						    	}
					    	?>

						  </select>
						</div>
						
					</form>
					<center>
						<button onclick="addbook();" name="btn-reg" class="btn btn-info"><div id="loadaddbook"><i class="fa fa-check-square-o" aria-hidden="true"></i> Add book </div> </button><br>
						<font color="red" id="check2"></font>
						</center>
				  </div>
			</div>
		</div>
		<!--End  Right col -->
	</div>

</div>
<?php require_once("incfiles/end.php"); ?> 

	
