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
  $stmt = $mysqli->prepare("SELECT currentPrice652, QoH652 FROM Parts652 WHERE partNo652='?'");
  $stmt->bind_param("i", $param_partNo);
  $param_partNo = $pids[$i];
  printf($pids[$i]);

  /* execute prepared statement */
  $stmt->execute();
  $stmt->bind_result($price, $QoH);
  $stmt->fetch();
  $stmt->close();
  printf($QoH);
  echo "</br>";
  printf($qty[$i]);
  printf($price);
  echo "</br>";

  if ($QoH < $qty[$i]) {
    echo "item with ID " . $pids[$i] . " could not be bought, insufficient stock </br>";
    
    continue;
  }
  echo "item with ID " . $pids[$i] . " was purchased </br>";

  

  $stmt->close();
}

$mysqli->close();
?>