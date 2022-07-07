<?php 

//code taken from create.php example

include 'database.php';

//creating purchase order

$userid = -1;
$pids = "";
$qty = "";

if($_POST["userid"]){
	$userid = $_POST["userid"];
	$pids = explode (",", $_POST["pids"]);
	$qty = explode (",", $_POST["qty"]);
} else {
	printf("Error, no purchase detected");
}

// Prepare an insert statement
$stmt = $mysqli->prepare("INSERT INTO PO652 (datePO652, status652, Clients652_clientId652) VALUES (now(), ?, ?)");
$stmt->bind_param("si", $param_status, $param_client);

    // Set parameters
    $param_status = "Pending";
    $param_client = $userid;

    /* execute prepared statement */
$stmt->execute();

//poNo is be unique because it is auto-incremented
//client ID is valid since it's a foreign key

$poID = $mysqli->insert_id;

$stmt->close();

//inserting in the lines
for ($i = 0; $i < count($pids); $i++) {
  $stmt = $mysqli->prepare("SELECT currentPrice652, QoH652 FROM Parts652 WHERE partNo652=?");
  $stmt->bind_param("i", $param_partNo);
  $param_partNo = (int)$pids[$i];

  /* execute prepared statement */
  $stmt->execute();
  $stmt->bind_result($price, $QoH);
  $stmt->fetch(); 
  $stmt->close();

  if ($QoH < $qty[$i]) {
    echo "item with ID " . $pids[$i] . " could not be bought, insufficient stock </br>";
    
    continue;
  }
  echo "item with ID " . $pids[$i] . " was purchased </br>";

  // Prepare an insert statement
  $stmt = $mysqli->prepare("INSERT INTO `Lines652` (`lineNO652`,`numOfUnits652`, `linePrice652`, `PO652_poNO652`, `Parts652_partNo652`) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("iidii", $param_id, $param_num, $param_price, $param_poNo, $param_partNO);

  // Set parameters
  $param_id = $i;
  $param_num = $qty[$i]; 
  $param_price = $price; 
  $param_poNo = $poID; 
  $param_partNO = $pids[$i];

  /* execute prepared statement */
  $stmt->execute();
  $stmt->close();

  //updating quantity on hand of parts
  $stmt = $mysqli->prepare("UPDATE Parts652 SET QoH652 = QoH652 - ? WHERE partNo652 = ?");
  $stmt->bind_param("ii", $param_num, $param_partNO);

  /* execute prepared statement */
  $stmt->execute();
  $stmt->close();

}

$mysqli->close();
?>

</br>
<a href="https://web.cs.dal.ca/~levert/4140/parts.php">Return to parts</a>
</br>
<a href="https://web.cs.dal.ca/~levert/4140/POList.php">See list of purchase orders</a>