<?php
    //------insert.php------
     $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "utrtbl";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 


          $name=$_POST['utr'];
        $pass=$_POST['amt'];
         $sql = "INSERT INTO utr (utrno,amt) VALUES('{$name}','{$pass}')";
    mysqli_query($conn, $sql);

    if(mysqli_query($conn, $sql)){
        echo 1;
        }else{
        echo 0;
    }
    mysqli_close($conn);
           

 ?>