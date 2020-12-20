<?php
   require_once("include/Db.php");
   $SearchQueryParameter = $_GET["id"];
   if(isset($_POST["submit"])) {
      $EmployeeName = $_POST["EName"];
      $SSN = $_POST["SSnumber"];
      $Dept = $_POST["Department"];
      $Salary = $_POST["Salary"];
      $HomeAddress = $_POST["Address"];
      $ConnectingDB;
      $sql = "DELETE FROM records WHERE id='$SearchQueryParameter'";
      $Execute = $ConnectingDB->query($sql);
      
      if ($Execute) {
         echo '<script>window.open("databaseResult.php?id=Record Deleted Successfully", "_self")</script>';
      } else {
         echo "error";
      }
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
   <title>Update Management Application</title>
</head>
<body class="container">
<?php
   $ConnectingDB;
   $sql = "SELECT * FROM records WHERE id='$SearchQueryParameter'";
   $stmt = $ConnectingDB->query($sql);
   while($DataRows = $stmt->fetch()) {
      $id = $DataRows['id'];
      $EmployeeName = $DataRows['EmployeeName'];
      $SSN = $DataRows['SSN'];
      $Dept = $DataRows['Dept'];
      $Salary = $DataRows['Salary'];
      $HomeAddress = $DataRows['HomeAddress'];
   }
?>

<div class="row">
   <div class="col">
      <form action="delete.php?id=<?php echo $SearchQueryParameter?>" method="POST">
      <legend>Employee Data Records</legend>
      <small style="color: red">Please fill out the following fields *</small>
      <div class="form-group">
         <label>Employee Name</label><span class="Error">*</span>
         <input type="name" class="form-control" Name="EName" placeholder="Enter name" value="<?php echo $EmployeeName;?>">
      </div>
      <div class="form-group">
         <label>Social Security Number</label><span class="Error">*</span>
         <input type="number" class="form-control" Name="SSnumber" value="<?php echo $SSN;?>"><span class="Error">
      </div>
      <div class="form-group">
         <label for="Department">Department</label>
         <input class="form-control" Name="Department" type="text" placeholder="Department"  value="<?php echo $Dept;?>">
      </div>
      <div class="form-group">
         <label for="Salary">Salary</label>
         <input class="form-control" Name="Salary" type="text" placeholder="Salary"  value="<?php echo $Salary;?>">
      </div>
      <div class="form-group">
         <label for="Address">Home Address</label>
         <textarea class="form-control" id="textarea" rows="3" Name="Address" placeholder="Your home address"><?php echo $HomeAddress;?></textarea>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Delete Record</button>
      </form>

   </div>
   <div class="col"></div>
</div>









<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
   
</body>
</html>