<?php 
    include ("open_mmddb-kopi.php");
    
    $source = $_GET['s'];
    $system = $_GET['sys'];
    //$interval = 'INTERVAL' . $_POST['inter'] . 'MINUTE';

    
    $sql = 'SELECT left (obstime, 16)';
    $sql = $sql . ' as nobstime,';
    $sql = $sql . ' avg(value) as nvalue ';
    $sql = $sql . ' FROM iot ';
    $sql = $sql . ' WHERE system = "'. $system.'" AND source = "' . $source . '" ';
    $sql = $sql . ' AND obstime >= DATE_SUB(NOW(), INTERVAL 5 MINUTE ) ';
    $sql = $sql . ' GROUP BY nobstime';
    $sql = $sql . ' order by nobstime desc';
   

    $resultat = mysqli_query($conn,$sql); 

    $jsonArray = array();

    while ($row = mysqli_fetch_assoc($resultat)){
        $jsonArray[] = $row;
    }

    print json_encode($jsonArray); 
?>
  