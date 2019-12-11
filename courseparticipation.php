<?php
//QUERY 9 //
   $title="Course Participation";
   
   require_once('head.php');

  echo "<body>";
     echo"<h2>Course Participation</h2>";
	  
	  if (empty ($_POST['courseName']))
		 echo"<p class= 'p' >Please Enter A Course Name</p>";

	 else{
		$conn= mysqli_connect('localhost','root','password','canary');
	
	    $courseName=$_POST['courseName'];
	   
	    $query ="SELECT courseName,courseID FROM course WHERE '$courseName'= course.courseName"; /*finds the courseID for the courseName*/
	    $result = mysqli_query($conn,$query);
	    $row = mysqli_fetch_assoc($result);
		$courseID = $row['courseID']; /*makes course ID into a variable*/
		if (!$courseID)
			echo"<p class= 'p' >Sorry, Course Does Not Exist In The Database </p>";
		
		else{
		$query ="SELECT courseName,firstName,lastName,grade,seriesName,seriesYear, raceName, raceDate, position,enrolmentID 
		FROM member,series,course,enrolment,race,competitor 
		WHERE '$courseID' = enrolment.courseID AND enrolment.courseID = course.courseID AND enrolment.memberID = member.memberID
		AND member.memberID = competitor.memberID 
		AND race.seriesID = series.seriesID AND competitor.raceID =race.raceID 
		AND position != 'NULL' ORDER BY lastName";
		$result = mysqli_query($conn,$query);
		
	     echo"<table>";
           echo"<tr><th>First Name</th><th>Last Name</th><th>Grade</th>
		   <th>Series Name</th><th>Series Year</th><th>Race Name</th>
		   <th>Race Date</th><th>Position</th><th>Course Name</th></tr>";
           while($row = mysqli_fetch_assoc($result))
		 {
	      echo"<tr>";
          echo"<td class='ttd'>" .$row['firstName']. "</td>";
	      echo"<td class='ttd'>" .$row['lastName']. "</td>";
	      echo"<td class='ttd'>" .$row['grade']. "</td>";
	      echo"<td class='ttd'>" .$row['seriesName']. "</td>";
	      echo"<td class='ttd'>" .$row['seriesYear']. "</td>";
	      echo"<td class='ttd'>" .$row['raceName']. "</td>";
	      echo"<td class='ttd'>" .$row['raceDate']. "</td>";
	      echo"<td class='ttd'>" .$row['position']. "</td>";
		  echo"<td class='ttd'>" .$row['courseName']. "</td>";
          echo"</tr>";
		 }
		
	    echo"</table>";
	     mysqli_close($conn);
	    }
	  }
	  echo"<a class='next' href='index.php'>Next</a>";
require_once('footer.php');
  echo"</body>";
 echo"</html>";
?>