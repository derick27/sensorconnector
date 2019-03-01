
<html>
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("mytable");
  tr = table.getElementsByTagName("tr");
 
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";

      } else {
        tr[i].style.display = "none";

      }
    }       
  }
}
</script>
<?php  require_once("master.php");
$obj = new Master();
  $obj->getBootstrap();
  $obj->getHead();
?>
<body>
<div class="container-fluid"><!-- start container div-->
	<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Rechercher par  loraDevEui" 
style="width:300px;align-content:right; margin-left: 1000px; margin-bottom:3px;">

<table id="mytable"  border="1">
<thead>
<tr>
 <th>ID</th>
 <th>version</th>
 <th>loraDevEui </th>
 <th>loraPacketSequenceNumber</th/>
 <th> packetTimestamp </th>
 <th>device SN</th>
 <th>Tank level</th>
 <th>batteryVoltage</th>
 <th>temperature</th>
 <th>rawPayloadBytes</th>
 <th>created_at </th>
 <th>updated_at</th>
 </tr>
</thead>

<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');  // display errors
require_once("dbconnector.php");
$obj = new DBconnector(); // craete an object
$con = $obj->connectDB(); // call  connectDB function  from dbconnector.php
$results_per_page = 100;
$sql ="SELECT * FROM logs"; //used to determinate the total number of raw
$result =  mysqli_query($con,$sql);
$number_of_results = mysqli_num_rows($result);

//determine  number of total pages available
 ceil($number_of_pages=$number_of_results/$results_per_page);
//determine which page number visitor is currently on
if(!isset($_GET['page'])){
$page = 1;
}else{
$page =$_GET['page'];
}
//echo'<br>';
//determine the sql LIMIT starting number for the results on the display page
$this_page_first_result =($page-1)*$results_per_page;

//retrieve selected results from database and display hem on the page
$sql="SELECT * FROM logs LIMIT $this_page_first_result,$results_per_page";
$result =  mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
echo '<tr>
  <td> '.$row['id'].'  
 <td> '.$row['version'].'  
 <td> '.$row['loraDevEui'].'  
 <td> '.$row['loraPacketSequenceNumber'].'  
 <td> '.$row['packetTimestamp'].'  
 <td> '.$row['deviceSerialNumber'].' 
 <td> '.$row['tankLevel'].' 
 <td> '.$row['batteryVoltage'].' 
 <td> '.$row['temperature'].' 
 <td> '.$row['rawPayloadBytes'].' 
 <td> '.$row['created_at'].' 
 <td> '.$row['updated_at'].' 
 </tr>';
} ?>
</table>
<?php
for($page=1; $page<=$number_of_pages; $page++){
echo '<a href="paging.php?page=' .$page.'  ">'.$page.'  '.'</a>';
}
?>
</div> <!-- end div container -->
</body>
<?php
	$footer = new Master();
	$footer->getFooter(); 
	?>
</html>

