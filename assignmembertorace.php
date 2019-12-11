<?php
//QUERY 12 //
   $title="Add Member to a Race";
   
   require_once('head.php');

   echo "<body>";
     echo"<h2>ADD A Member To A Race </h2>";
	
	 if (empty ($_POST['firstName']))
		 echo"<p  class= 'p' >Please Enter Your First Name</p>";
	 else if (empty ($_POST['lastName']))
		 echo"<p  class= 'p' >Please Enter Your Last Name</p>";
	 else if (empty ($_POST['raceName']))
		 echo"<p  class= 'p' >Please Enter A Race Name</p>";
	 else if (empty ($_POST['seriesName']))
		 echo"<p  class= 'p' >Please Enter A series Name</p>";
	 else if (empty ($_POST['seriesYear']))
		 echo"<p  class= 'p' >Please Enter A Series Year</p>";
	 
	else{
		$conn= mysqli_connect('localhost','root','password','canary');
		
		$firstName=$_POST['firstName'];
	    $lastName=$_POST['lastName'];
	    $raceName = $_POST['raceName'];
		$seriesName = $_POST['seriesName'];
		$seriesYear = $_POST['seriesYear'];
		
		$query="SELECT memberID FROM member WHERE  member.firstName= '$firstName' AND member.lastName = '$lastName'";
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($result);
		$memberID = $row['memberID'];
		if(!$memberID) 
			echo"<p  class= 'p' >Sorry, Member Does Not Exist ,Please Enter An Existing Member. </p>"; 
		else{
		$query="SELECT seriesID FROM series WHERE '$seriesName'= series.seriesName AND '$seriesYear' = series.seriesYear";
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($result);
		$seriesID = $row['seriesID'];
	   	if(!$seriesID) 
			echo"<p  class= 'p' >Sorry, Series Does Not Exist, Please Enter An Existing Race.</p>"; 
		else{
		$query="SELECT raceID FROM race WHERE race.raceName = '$raceName' AND race.seriesID = $seriesID";
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($result);
	    $raceID = $row['raceID'];
	   	if(!$raceID) 
			echo"<p  class= 'p' >Sorry, Race Does Not Exist, Please Enter An Existing Race.</p>";
	    else{
		     $query ="INSERT INTO competitor VALUES(NULL,'$memberID', '$raceID',NULL)";
	         $result = mysqli_query($conn,$query);
			 
	          echo "<p class= 'p' >
			  First Name - $firstName <br>
	          Last Name - $lastName <br>
	          Race Name -  $raceName <br>
              Series Name - $seriesName <br>
		      Series Year - $seriesYear <br>
			  Has been added into the database</p>";
		    }
		}
		
		}
	  mysqli_close($conn);	
	}
      echo"<a  class='next' href='index.php'>Next</a>";
require_once('footer.php');
  echo"</body>";
 echo"</html>";
?>

