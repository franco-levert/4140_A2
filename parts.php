<?php 

//code taken from read.php example

include 'database.php';

printf("A list of all parts");

$stmt = $mysqli->prepare("SELECT * FROM Parts652");

/* execute prepared statement */
$stmt->execute();
$stmt->bind_result($partNo652, $partDescription652, $QoH652, $partName652, $currentPrice652);

while ($stmt->fetch()) {

  echo "<pre>";
  echo "Name: $partName652\n";
  echo "Part No: $partNo652\n";
  echo "Description: $partDescription652\n";
  echo "Current Price: $currentPrice652\n";
  echo "</pre>";
}


/* close statement and connection */
$stmt->close();
$mysqli->close();

?>


<!? form taken from https://www.w3schools.com/html/html_forms.asp ?>
<form action="/~levert/4140/purchase.php" method="post">
  <label for="partIds">List part IDs seperated by a comma and no space:</label>
  <input type="text" id="pids" name="pids"><br><br>
  <label for=qty"">List quantity of parts above seperated by a comma and no space:</label>
  <input type="text" id="qty" name="qty"><br><br>
  <label for="id">Enter your user ID:</label>
  <input type="text" id="userid" name="userid"><br><br>
  <input type="submit" value="Submit">
</form>
