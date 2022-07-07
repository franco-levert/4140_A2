</br>
<p>Submit your user ID</p>

<form action="/~levert/4140/POList.php" method="post">
  <input type="text" id="userid" name="userid"><br><br>
  <input type="submit" value="Submit">
</form>
</br>

<?php 

include 'database.php';

if($_POST["userid"]){
  $userid = $_POST["userid"];
  $stmt = $mysqli->prepare("SELECT * FROM PO652 WHERE Clients652_clientId652 = ?");
  $stmt->bind_param("i", $param_user);
  $param_user = $userid;

  /* execute prepared statement */
  $stmt->execute();
  $stmt->bind_result($poNO, $date, $status, $clientid);

  while ($stmt->fetch()) {
    echo "<pre>";
    echo "Purchase Order Number: $poNO\n";
    echo "Date: $date\n";
    echo "Status: $status\n";
    echo "</pre>";
  }


  /* close statement and connection */
  $stmt->close();
  $mysqli->close();
} 

?>

<form action="https://web.cs.dal.ca/~levert/4140/lines.php" method="POST">
  <label for="id">Enter ID of purchase order for more details:</label>
  <input type="text" id="id" name="id"><br>
  <input type="submit" value="Submit" />
</form>
