<?php  include "server.php"; ?>
<html>
<style>
#divt {
	padding: 30px;	
	margin: 30px;
  	border-radius: 5px;
  	background-color: #D3D3D3;
}
#btn {
	margin-left: 100px;
}
#anchor {float: right;}
.testDiv {
    margin-top: 4px;
    padding-top: 4px;
    margin-bottom: 0px;
    padding-bottom: 0px;
}
</style>
<head>
	<title>Add Cources</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

	<div id="divt" align="center">
		<h1>Add Cources<a href="index.php" id="anchor"><button class="btn btn-primary">Home Page</button></a></h1>
		
		<form action="courceAdd.php" method="post">
 		 <div class="form-group row">
   		 <label for="inputEmail3" class="col-sm-2 col-form-label">Cource Code:</label>
   		 <div class="col-sm-10">
  		    <input type="text" name="code" class="form-control"  placeholder="Enter Cource Code" required>
   		 </div>
  		</div>
	<div class="form-group row">
  		<label  class="col-sm-2 col-form-label">Cource Name:</label>
  		<div class="col-sm-10">
  			<input type="text" name="cname" class="form-control"  placeholder="Enter cource name" required>
  		</div>
 	</div>
 	<div class="form-group row">
  		<label  class="col-sm-2 col-form-label">Cource Credits:</label>
  		<div class="col-sm-10">
        <select name="credits" class="custom-select mr-sm-2" id="inlineFormCustomSelect"  required>
        	<option selected>Choose...</option>
        	<option value="1">1</option>
        	<option value="3">3</option>
        	
     	 </select>
     	</div>
    </div>
 
  <div class="form-group row" >
    <div class="col-sm-10" id="btn">
      <button type="submit" class="btn btn-success btn-lg">Add Cource </button>
    </div>
  </div>
</form>
	
    <h3>
    <div align="center" class="testDiv">
       
    <?php
            if (isset($_GET["Message"])) {
              echo $_GET["Message"];
              unset($_GET["Message"]);
            }
           
      ?>
      </div></h3><hr>
 	
</div>
</body>
</html>