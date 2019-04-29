<!DOCTYPE html>
<html>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 40%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=button] {
  width: 40%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #000000;
}
input[type=button]:hover {
  background-color: #000000;
}
.btn1 {float:left;}
.btn2 {float:right;}
#btn {
  float: right;
  margin: 5px;
  padding: 5px;
}

.testDiv {
    margin-top: 4px;
    padding-top: 4px;
    margin-bottom: 0px;
    padding-bottom: 0px;
}

div {
  border-radius: 5px;
  background-color: #D3D3D3;
  padding: 20px;
}
</style>
<head>
  <title>Student Registration</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
</head>
<body>


  <div><h1 align="center">Registration From</h1><a href="./cource.php"><button class="btn btn-primary " id="btn">Add Cource </button></a></div>

<div>
   
 
  <form action="register.php" method="POST">
     
    
    <label>Roll Number</label>
    <input type="text"  name="rollno" placeholder="Enter your roll number.." required >

    <label>Name</label>
    <input type="text"  name="Name" placeholder="Your Name.." required >

    <label >Father Name</label>
    <input type="text"  name="Fname" placeholder="Your Father Name.." required>

    <label >Gender</label>
    <select  name="gender">
      <option>Gender</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
      <option value="other">Other</option>
    </select>

     <label >Contact</label>
    <input type="text"  name="contact" placeholder="Your Contact.." requlired>

     <label >Address</label>
    <input type="text"  name="address" placeholder="Your Address.." required>

   
  
    <input type="submit" value="Register Student" class="btn1">
    <a href="./search.php">
    <input type="button" value="Search Record" class="btn2">
   </a>
   
    <h3>
    <div align="center" class="testDiv">
       
    <?php
            if (isset($_GET["Message"])) {
              echo $_GET["Message"];
              unset($_GET["Message"]);
            }
            else{
              //echo "------------------------";
            }
      ?>
      </div></h3><hr>
    <font color="black" size="5" face="monotype corsiva">
      
    <marquee  scrollamount="6" behavior="scroll" height="100" width:100% direction="left"
      onmouseover="this.stop();" onmouseout="this.start();">
     Hello World! This is Muhammad Ahsan,<br>
     ------     This is my first web base assignment using PHP and MySQL.<br>
     ------     For more updates state tunned and keep visiting this page.
    
   </marquee></font>
    
  </form>

</div>

</body>
</html>