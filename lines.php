<?php 

include 'database.php';

if($_POST["id"]){
  $id = $_POST["id"];
  printf("<p>Details of Purchase Order with ID = %u</p></br>", $id);

  $stmt = $mysqli->prepare("SELECT * FROM Lines652 WHERE PO652_poNO652 = ?");
  $stmt->bind_param("i", $param_id);
  $param_id = $id;

  /* execute prepared statement */
  $stmt->execute();
  $stmt->bind_result($lineNO, $num, $price, $poNO, $partNO);

  while ($stmt->fetch()) {
    echo "<pre>";
    echo "Part number: $partNO\n";
    echo "Quantity ordered: $num\n";
    echo "Total price: $price\n";
    echo "</pre>";
  }


  /* close statement and connection */
  $stmt->close();
  $mysqli->close();
} 

?>