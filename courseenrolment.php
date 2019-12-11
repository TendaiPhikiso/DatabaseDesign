<?php
//QUERY 10//
   $title="Enrol Member";
   
   require_once('head.php');

   echo "<body>";
     echo"<h2>Member Enrolment</h2>";
	
	  if (empty ($_POST['firstName']))
		 echo"<p class= 'p' >Please Enter Your First Name</p>";
	 else if (empty ($_POST['lastName']))
		 echo"<p class= 'p' >Please Enter Your Last Name</p>";
	 else if (empty ($_POST['courseName']))
		 echo"<p class= 'p' >Please Enter a Course Name</p>";
	else{
	 $conn= mysqli_connect('localhost','root','password','canary');
	 
	 $firstName=$_POST['firstName'];
	 $lastName=$_POST['lastName'];
	 $courseName=$_POST['courseName'];
	 
	 $query ="SELECT memberID FROM member WHERE '$firstName'= member.firstName
	 AND '$lastName'= member.lastName ";
	 $result = mysqli_query($conn,$query);
	 $row = mysqli_fetch_assoc($result);
	 $memberID = $row['memberID'];
		if (!$memberID) 
			echo"<p class= 'p' >Sorry, Member Does Not Exist</p>"; 	  
	else{
	 $query ="SELECT courseID FROM course WHERE '$courseName'= course.courseName"; /*finds the courseID for the courseName*/
	 $result = mysqli_query($conn,$query);
	 $row = mysqli_fetch_assoc($result);
	 $courseID = $row['courseID']; /*makes course ID into a variable*/
	    if (!$courseID)
			echo"<p class= 'p' >Sorry, Course Does Not Exist In The Database </p>";	  
	 else{
	 $query ="INSERT INTO enrolment VALUES(NULL,'$memberID','$courseID')";
	 $result = mysqli_query($conn,$query);
	 
	 echo "<p class= 'p' >
	 First Name - $firstName <br>
	 Last Name - $lastName <br>
 	 Has Been Enrolled To Course - $courseName.</p>";
	 mysqli_close($conn);
	 
	 }
	}
	}
      echo"<a  class='next' href='index.php'>Next</a>";
require_once('footer.php');
  echo"</body>";
 echo"</html>";
?>