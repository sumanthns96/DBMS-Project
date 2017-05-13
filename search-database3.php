<?php 
//load database connection
    $con = mysqli_connect("localhost","root","","wpproject");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  
  $sym = mysqli_real_escape_string($con, $_REQUEST['symptom']);
  $sym1 = mysqli_real_escape_string($con, $_REQUEST['symptom1']);
$sql = "SELECT Name,Content,Used_for FROM medicalstore where Symptoms1 or Symptoms2 like '%$sym%'";
$sql2 = "SELECT Name,Content,Used_for FROM medicalstore where Symptoms1 or Symptoms2 like '%$sym1%'";
$result = mysqli_query($con,$sql);
$result1 = mysqli_query($con,$sql2);


echo "<table border='4' class='stats' cellspacing='0'>

            <tr>
            <td class='hed' colspan='8'>MEDICINE DETAILS 1</td>
              </tr>
            <tr>
            <th>MEDCINE NAME 1</th>
            <th>CONTENT</th>
            <th>USED</th>

            </tr>";

     // output data of each row
     while($row = mysqli_fetch_array($result,MYSQLI_ASSOC) ) {
        echo "<tr>";
              echo "<td>" . $row["Name"]. "</td>";
              echo "<td>" . $row["Content"]. "</td>";
              echo "<td>" . $row["Used_for"] . "</td>";
			 
			   echo "</tr>";
			    echo "</table>";
	 }
	 
	 echo "<table border='4' class='stats' cellspacing='0'>

            <tr>
            <td class='hed' colspan='8'>MEDICINE DETAILS 2</td>
              </tr>
            <tr>
            <th>MEDCINE NAME 2</th>
            <th>CONTENT</th>
            <th>USED</th>

            </tr>";
	 while($row2 = mysqli_fetch_array($result1,MYSQLI_ASSOC) ) {
		 
		 echo "<tr>";
   
			  echo "<td>" . $row2["Name"]. "</td>";
              echo "<td>" . $row2["Content"]. "</td>";
              echo "<td>" . $row2["Used_for"] . "</td>";
			 
		  echo "</tr>";
		 
		  echo "</table>";
	 }
	 if (!$sql) {
    printf("Error: %s\n", mysqli_error($con));
	
    exit();

}
$con->close();
?>