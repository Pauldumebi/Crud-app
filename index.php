<?php
   require_once("include/Db.php");
   if(isset($_POST["submit"])) {
         if(!empty($_POST["EName"]) && !empty($_POST["SSnumber"]) && !empty($_POST["Department"]) && !empty($_POST["Salary"])) {
            $EmployeeName = $_POST["EName"];
            $SSN = $_POST["SSnumber"];
            $Dept = $_POST["Department"];
            $Salary = $_POST["Salary"];
            $HomeAddress = $_POST["Address"];
            $ConnectingDB;
         //Use PDO named parameter to prevent sql injection
         $sql = "INSERT INTO records (EmployeeName, SSN, Dept, Salary, HomeAddress) VALUES (:enamE, :ssN, :depT, :salarY, :homeaddresS)";
         //function of the arrow indicates you are using a variable as an object
         $stmt = $ConnectingDB->prepare($sql);
         $stmt->bindValue(':enamE', $EmployeeName);
         $stmt->bindValue(':ssN', $SSN);
         $stmt->bindValue(':depT', $Dept);
         $stmt->bindValue(':salarY', $Salary);
         $stmt->bindValue(':homeaddresS', $HomeAddress);
         $Execute = $stmt->execute();
         if ($Execute) {
            echo '<span style="color: green">Record has been added successfully </span>';
         }
      } else {
         echo '<span style="color: red"> Please enter the required information</span>';
      }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
   <title>Crud Management Application</title>
</head>
<body class="container">
<div class="row">
   <div class="col">
      <form action="index.php" method="POST">
      <legend>Employee Data Records</legend>
      <small style="color: red">Please fill out the following fields *</small>
      <div class="form-group">
         <label>Employee Name</label><span class="Error">*</span>
         <input type="name" class="form-control" Name="EName" placeholder="Enter name">
      </div>
      <div class="form-group">
         <label>Social Security Number</label><span class="Error">*</span>
         <input type="number" class="form-control" Name="SSnumber"><span class="Error">
      </div>
      <div class="form-group">
         <label for="Department">Department</label>
         <input class="form-control" Name="Department" type="text" placeholder="Department">
      </div>
      <div class="form-group">
         <label for="Salary">Salary</label>
         <input class="form-control" Name="Salary" type="text" placeholder="Salary">
      </div>
      <div class="form-group">
         <label for="Address">Home Address</label>
         <textarea class="form-control" id="textarea" rows="3" Name="Address" placeholder="Your home address"></textarea>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </form>

   </div>
   <div class="col"></div>
</div>









<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
   
</body>
</html>