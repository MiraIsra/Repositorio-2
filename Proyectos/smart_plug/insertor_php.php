<?php

  include 'selector.php';
  require("connector.php");

  echo "estoy";

  if ($est_deseado == "0")
    $n_est_deseado = "1";
  else
    $n_est_deseado = "0";

  $query = "INSERT INTO estado(est_deseado, est_actual, hora) VALUES('".$n_est_deseado."', '".$est_actual."', now())";
  //echo $query;
  mysqli_query($con, $query);
  mysqli_close($con);

  // <form action="./smart_plug.php" >

?>
