<?php
//QUERY 4 //

   $title="View Members";
   
   require_once('head.php');

   echo "<body>";
     echo"<h2>View Members</h2>";
	 /* code to start the coonection with the database*/
	 $conn= mysqli_connect('localhost','root','password','canary');
	 
	 /* code to run query within the database*/	
	 $query ="SELECT * FROM member";
	 $result = mysqli_query($conn,$query);
	 
	 echo"<table>";
       echo"<tr><th>Member ID</th><th>First Name</th><th>Last Name</th><th>Grade</th></tr>";

       while($row = mysqli_fetch_assoc($result))
		 {
	   echo"<tr>";
	   echo"<td class='tdd'> ".$row['memberID']."</td>";
       echo"<td class='tdd'>" .$row['firstName']."</td>";
	   echo"<td class='tdd'>" .$row['lastName']."</td>";
	   echo"<td class='tdd'>" .$row['grade']."</td>";
       echo"</tr>";
		 }
	echo"</table>";
	 mysqli_close($conn);
	
	 echo"<a class='next' href='index.php'>Next</a>";
 
require_once('footer.php');
  echo"</body>";
 echo"</html>";
?>