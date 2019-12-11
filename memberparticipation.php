<?php
//QUERY 8 //
   $title="Member Participation";
   
   require_once('head.php');

  echo "<body>";
     echo"<h2>Member Participation</h2>";
	  
	  if (empty ($_POST['firstName']))
		 echo"<p class= 'p' >Please Enter Your First Name</p>";
	 else if (empty ($_POST['lastName']))
		 echo"<p class= 'p'>Please Enter Your Last Name</p>";

	 else{
		$conn= mysqli_connect('localhost','root','password','canary');
	
	    $firstName=$_POST['firstName'];
	    $lastName=$_POST['lastName'];
	 
	    $query ="SELECT firstName,lastName, memberID FROM member WHERE '$firstName'= member.firstName 
		AND '$lastName'= member.lastName";
	    $result = mysqli_query($conn,$query);
	    $row = mysqli_fetch_assoc($result);
		$memberID = $row['memberID'];
		if (!$memberID)
			echo"<p class= 'p'>Sorry, Member does not exist</p>";
		else{
		$query ="SELECT firstName,lastName,grade,seriesName,seriesYear, raceName, raceDate, position 
		FROM member,series,race,competitor 
		WHERE '$memberID' = competitor.memberID AND member.memberID = competitor.memberID AND race.seriesID = series.seriesID 
		AND competitor.raceID =race.raceID 
		AND position != 'NULL' ORDER BY position";
		$result = mysqli_query($conn,$query);
		
	     echo"<table>";
           echo"<tr><th>First Name</th><th>Last Name</th><th>Grade</th><th>Series Name</th>
		   <th>Series Year</th><th>Race Name</th>
		   <th>Race Date</th><th>Position</th></tr>";
           while($row = mysqli_fetch_assoc($result))
		 {
	      echo"<tr>";
          echo"<td class='td'>" .$row['firstName']. "</td>";
	      echo"<td class='td'>" .$row['lastName']. "</td>";
	      echo"<td class='td'>" .$row['grade']. "</td>";
	      echo"<td class='td'>" .$row['seriesName']. "</td>";
	      echo"<td class='td'>" .$row['seriesYear']. "</td>";
	      echo"<td class='td'>" .$row['raceName']. "</td>";
	      echo"<td class='td'>" .$row['raceDate']. "</td>";
	      echo"<td class='td'>" .$row['position']. "</td>";
          echo"</tr>";
		 }
		
	    echo"</table>";
		
		 }
	     mysqli_close($conn);
	    }
	 
	  echo"<a class='next' href='index.php'>Next</a>";
require_once('footer.php');
  echo"</body>";
 echo"</html>";
?>