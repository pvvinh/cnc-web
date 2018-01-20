<?php 

//session_start(); //myadd
require_once("incfiles/head.php");
?>
<br>
<style> /* myadd */
/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
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
			<div class="myadd"> 
				<!-- myadd for test -->
				<h2>Modal Login Form</h2>
				<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>

				<div id="id01" class="modal">
				  
				  <form class="modal-content animate" action="/action_page.php">
				    <div class="imgcontainer">
				      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
				      <img src="img/logo.gif" alt="Avatar" class="avatar">
				    </div>

				    <div class="container">
				      <label><b>Username</b></label>
				      <input type="text" placeholder="Enter Username" name="uname" required>

				      <label><b>Password</b></label>
				      <input type="password" placeholder="Enter Password" name="psw" required>
				        
				      <button type="submit">Login</button>
				      <label>
				        <input type="checkbox" checked="checked"> Remember me
				      </label>
				    </div>

				    <div class="container" style="background-color:#f1f1f1">
				      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
				      <span class="psw">Forgot <a href="#">password?</a></span>
				    </div>
				  </form>
				</div>

				<script>
				// Get the modal
				var modal = document.getElementById('id01');

				// When the user clicks anywhere outside of the modal, close it
				window.onclick = function(event) {
				    if (event.target == modal) {
				        modal.style.display = "none";
				    }
				}
				</script>

			</div>
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

	
