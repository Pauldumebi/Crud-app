<?php
   require_once("include/Db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Database Result</title>
</head>
<body>
<h2 style="color: green"><?php echo @$_GET["id"];?></h2>
<!-- <fieldset>
   <form class="" action="databaseResult.php" method="GET">
      <input type="text" name="search" value="" placeholder="Search by name and ssn">
      <input type="submit" name="searchButton" value="Search records">
   </form>
</fieldset> -->
<?php
   if(isset($_GET["searchButton"])) {
      $ConnectingDB;
      $Search = $_GET["search"];
      $sql = "SELECT * FROM records WHERE ename=:searcH or ssn=:searcH";
      $stmt = $ConnectingDB->prepare($sql);
      $stmt->bindValue(':searcH', $Search);
      $stmt->execute();
      while ($DataRows=$stmt->fetch()) {
         $id = $DataRows['id'];
         $EmployeeName = $DataRows['EmployeeName'];
         $SSN = $DataRows['SSN'];
         $Dept = $DataRows['Dept'];
         $Salary = $DataRows['Salary'];
         $HomeAddress = $DataRows['HomeAddress'];
     ?>
     <table width="1000" border="5" align="center">
         <caption>Search Result</caption>
         <tr>
            <th>ID</th>
            <th>Name</th>
            <th>SSN</th>
            <th>Department</th>
            <th>Salary</th>
            <th>Home Address</th>
            <th>Search Again</th>
         </tr>
         <tr>
            <td><?php echo $id;?></td>
            <td><?php echo $EmployeeName;?></td>
            <td><?php echo $SSN;?></td>
            <td><?php echo $Dept;?></td>
            <td><?php echo $Dept;?></td>
            <td><?php echo $Salary;?></td>
            <td><?php echo $HomeAddress;?></td>
            <td><a href="databaseResult.php">Search Again</a></td>
            
         </tr>
     </table>
     <?php }
   }
?>
   <table width="1000" border="5" align="center">
      <caption style="font-size: 36px">View from Database</caption>
      <tr>
         <th>ID</th>
         <th>Name</th>
         <th>SSN</th>
         <th>Department</th>
         <th>Salary</th>
         <th>HomeAddress</th>
         <th>Update</th>
         <th>Delete</th>
      </tr>
   <?php 
      $ConnectingDB;
      $sql = "SELECT * FROM records";
      $stmt = $ConnectingDB->query($sql);
      while ($DataRows=$stmt->fetch()) {
         $id = $DataRows['id'];
         $EmployeeName = $DataRows['EmployeeName'];
         $SSN = $DataRows['SSN'];
         $Dept = $DataRows['Dept'];
         $Salary = $DataRows['Salary'];
         $HomeAddress = $DataRows['HomeAddress'];
   ?>  
   <tr>
      <td><?php echo $id?></td>
      <td><?php echo $EmployeeName?></td>
      <td><?php echo $SSN?></td>
      <td><?php echo $Dept?></td>
      <td><?php echo $Salary?></td>
      <td><?php echo $HomeAddress?></td>
      <td> <a href="Update.php?id=<?php echo $id ?>">Update</a> </td>
      <td> <a href="Delete.php?id=<?php echo $id ?>">Delete</a> </td>
   </tr>
   <?php }?>
   </table>
   <div></div>
</body>
</html>