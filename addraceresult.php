<?php
//QUERY 7 //
   $title="Add Race Result";
   
   require_once('head.php');

   echo "<body>";
     echo"<h2>ADD A Race Result</h2>";
	
	 if (empty ($_POST['memberID']))
		 echo"<p class= 'p' >Please Enter A MemberID</p>";
	 else if (empty ($_POST['raceID']))
		 echo"<p class= 'p' >Please Enter A RaceID</p>";
	 else if (empty ($_POST['position']))
		 echo"<p class= 'p' >Please Enter A Position</p>";
	
	else{
		$conn= mysqli_connect('localhost','root','password','canary');
	
	    $memberID = $_POST['memberID'];
	    $raceID = $_POST['raceID'];
	    $position = $_POST['position'];
	 
		 /* QUERY TO PREVENT USERS FROM ENTERING A MEMBER ID THAT DOES NOT EXIST IN THE DATABASE*/ /*Not working*/
	     $query="SELECT memberID FROM member WHERE member.memberID = $memberID";
	     $result = mysqli_query($conn,$query);
	     $row = mysqli_fetch_assoc($result);
	     $memberID = $row['memberID'];
	   if(!$memberID) 
		 echo"<p class= 'p' >Sorry, Member ID Does Not Exist , Please Enter An Existing ID </p>"; 
		 
		/* QUERY TO PREVENT USERS FROM ENTERING A Race ID THAT DOES NOT EXIST IN THE DATABASE*/
	 else{
	      $query="SELECT raceID FROM race WHERE race.raceID = $raceID";
	      $result = mysqli_query($conn,$query);
	      $row = mysqli_fetch_assoc($result);
	      $raceID = $row['raceID'];
	   if(!$raceID) 
		echo"<p class= 'p' >Sorry, Race ID Does Not Exist , Please Enter An Existing ID </p>";
	
	else{
		$query ="UPDATE competitor SET position ='$position' WHERE memberID = $memberID AND raceID= $raceID";
	    $result = mysqli_query($conn,$query);

	    echo "<p class= 'p' >
		Member ID - $memberID <br>
	    With Race ID - $raceID <br>
		Has a Result of Position - $position. </p>";
	    mysqli_close($conn);
		}
	 }
	}
      echo"<a class='next' href='index.php'>Next</a>";
require_once('footer.php');
  echo"</body>";
 echo"</html>";
?>



