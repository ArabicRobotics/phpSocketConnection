<?php
#include("socket.php");
$RaspberryPiIP = '192.168.1.XXX'; // Change by your RaspberryPi/PC IP 
$RaspberryPiPORT = 5000; // Change by your RaspberryPi / PC Port Number ..
$connection = new Socket(RaspberryPiIP,$RaspberryPiPORT); // Create a new socet Connection object. 
$connection->init();

////////  Get Command from front end page

$on = "on";
$off = "off";
$data = "";
$operation = $_GET["op"];
if ($operation =="on")
{

$command = $on;
}
if ($operation =="off")
{

$command = $off;
}

//// end Get Command from front end page

$connection->open_socket(); // Connect PHP to RaspberryPi or computer.
$connection->send_data($command); //Send command String
$connection->close_socket(); //////////Close connection 
///////////// DONE :)  ///////////////


?>