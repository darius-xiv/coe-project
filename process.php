<?php
session_start();

if( empty($_POST['object1']) || empty($_POST['object2']) )
{   
    //SQL injection security
    session_destroy();
    header("location: index.php");
}

else
{
    // SET DB connection
    $serverName = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "coe-project";

    $conn = mysqli_connect ($serverName, $dbUsername, $dbPassword, $dbName);

    if (!$conn) {
    die("Connect failed: " . mysqli_connect_error());
    }

    // Set post value into variables
    $object1 = $_POST['object1'];
    $object2 = $_POST['object2'];
    
    // SQL for object 1
    $sql = "SELECT * FROM items WHERE url = '{$object1}' ";
    $result = mysqli_query($conn, $sql);    

    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        $_SESSION['name1'] = $row['name'];
        $_SESSION['date1'] = $row['date'];
        $_SESSION['clockspeed1'] = $row['clockspeed'];
        $_SESSION['memtype1'] = $row['memtype'];
        $_SESSION['memsize1'] = $row['memsize'];
        $_SESSION['thermal1'] = $row['thermal'];
        $_SESSION['url1'] = $row['url'];
      }
    } 
    // SQL for object 2
    $sql2 = "SELECT * FROM items WHERE url = '{$object2}' ";
    $result2 = mysqli_query($conn, $sql2);

    if (mysqli_num_rows($result2) > 0) {
        // output data of each row
        while($row2 = mysqli_fetch_assoc($result2)) {
          $_SESSION['name2'] = $row2['name'];
          $_SESSION['date2'] = $row2['date'];
          $_SESSION['clockspeed2'] = $row2['clockspeed'];
          $_SESSION['memtype2'] = $row2['memtype'];
          $_SESSION['memsize2'] = $row2['memsize'];
          $_SESSION['thermal2'] = $row2['thermal'];
          $_SESSION['url2'] = $row2['url'];
        }
    } 
    // Clock speed
    if ($_SESSION['clockspeed1'] == $_SESSION['clockspeed2']){
        $_SESSION['clockspeedresult1'] = " ";
        $_SESSION['clockspeedresult2'] = " ";
    }
    else if($_SESSION['clockspeed1'] > $_SESSION['clockspeed2']){
        $_SESSION['clockspeedresult1'] = "<p class='green'>&#9650; faster</p>";
        $_SESSION['clockspeedresult2'] = "<p class='red'>&#9660; slower</p>";
    }
    else {
        $_SESSION['clockspeedresult1'] = "<p class='red'>&#9660; slower</p>";
        $_SESSION['clockspeedresult2'] = "<p class='green'>&#9650; faster</p>";
    }
    // Memory type
    if ($_SESSION['memtype1'] == $_SESSION['memtype2']){
        $_SESSION['memtyperesult1'] = " ";
        $_SESSION['memtyperesult2'] = " ";
    }
    else if($_SESSION['memtype1'] > $_SESSION['memtype2']){
        $_SESSION['memtyperesult1'] = "<p class='green'>&#9650; higher</p>";
        $_SESSION['memtyperesult2'] = "<p class='red'>&#9660; lower</p>";
    }
    else {
        $_SESSION['memtyperesult1'] = "<p class='red'>&#9660; lower</p>";
        $_SESSION['memtyperesult2'] = "<p class='green'>&#9650; higher</p>";
    }

    // Memory size
    if ($_SESSION['memsize1'] == $_SESSION['memsize2']){
        $_SESSION['memsizeresult1'] = " ";
        $_SESSION['memsizeresult2'] = " ";
    }
    else if($_SESSION['memsize1'] > $_SESSION['memsize2']){
        $_SESSION['memsizeresult1'] = "<p class='green'>&#9650; larger</p>";
        $_SESSION['memsizeresult2'] = "<p class='red'>&#9660; smaller</p>";
    }
    else {
        $_SESSION['memsizeresult1'] = "<p class='red'>&#9660; smaller</p>";
        $_SESSION['memsizeresult2'] = "<p class='green'>&#9650; larger</p>";
    }

    // Thermal
    if ($_SESSION['thermal1'] == $_SESSION['thermal2']){
        $_SESSION['thermalresult1'] = " ";
        $_SESSION['thermalresult2'] = " ";
    }
    else if($_SESSION['thermal1'] > $_SESSION['thermal2']){
        $_SESSION['thermalresult1'] = "<p class='green'>&#9650; better</p>";
        $_SESSION['thermalresult2'] = "<p class='red'>&#9660; lower</p>";
    }
    else {
        $_SESSION['thermalresult1'] = "<p class='red'>&#9660; lower</p>";
        $_SESSION['thermalresult2'] = "<p class='green'>&#9650; better</p>";
    }
    

    header("location: index.php");
    echo $_SESSION['url1']."<br>";
    echo $_POST['object1'];
}