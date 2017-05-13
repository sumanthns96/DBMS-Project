<?php 
//load database connection
    $con = mysqli_connect("localhost","root","","wpproject");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  
  $name = mysqli_real_escape_string($con, $_REQUEST['name']);
$sql = "SELECT Name,Content,Used_for,Symptoms1,Symptoms2 FROM medicalstore where Name like '%$name%'";
$result = mysqli_query($con,$sql);

echo "<table border='4' class='stats' cellspacing='0'>

            <tr>
            <td class='hed' colspan='8'>MEDICINE DETAILS</td>
              </tr>
            <tr>
            <th>NAME</th>
            <th>CONTENT</th>
            <th>USED</th>
			<th>SYMPTOM 1</th>
			<th>SYMPTOM 2</th>

            </tr>";
 
     while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
		 
		

              echo "<tr>";
              echo "<td>" . $row["Name"]. "</td>";
              echo "<td>" . $row["Content"]. "</td>";
              echo "<td>" . $row["Used_for"] . "</td>";
              echo "<td>" . $row["Symptoms1"] . "</td>";
              echo "<td>" . $row["Symptoms2"] . "</td>";
              echo "</tr>";
		 
		 echo "</table>";
		 
		
	 }
	 if (!$sql) {
    printf("Error: %s\n", mysqli_error($con));
    exit();

}
$con->close();
?>