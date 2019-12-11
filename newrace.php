<?php
//QUERY 11 //
   $title="Add New Race";
   
   require_once('head.php');

   echo "<body>";
     echo"<h2>ADD A New Race</h2>";
	
	 if (empty ($_POST['raceName']))
		 echo"<p class= 'p' >Please Enter A Race Name</p>";
	 else if (empty ($_POST['raceDate']))
		 echo"<p  class= 'p' >Please Enter A Race Date</p>";
	 else if (empty ($_POST['seriesName']))
		 echo"<p  class= 'p' >Please Enter A Series Name</p>";
	 else if (empty ($_POST['seriesYear']))
		 echo"<p  class= 'p' >Please Enter A Series Year</p>";
	 
     else{
		
		$conn= mysqli_connect('localhost','root','password','canary');
		
	    $raceName =$_POST['raceName'];
		$raceDate =$_POST['raceDate'];
		$seriesName =$_POST['seriesName'];
		$seriesYear =$_POST['seriesYear'];
		
		$query="SELECT seriesID FROM series WHERE '$seriesName'= series.seriesName AND '$seriesYear' = series.seriesYear";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);
	    $seriesID = $row['seriesID'];
		
	   	if(!$seriesID) 
			echo"<p class= 'p' >Sorry, Series Does Not Exist , Please Enter An Existing Series.</p>"; 
	    else{
			$query ="INSERT INTO race VALUES(NULL,'$seriesID', '$raceName','$raceDate')";
	        $result = mysqli_query($conn,$query);
		
	         echo "<p  class= 'p' >
			 New Race Name - $raceName<br>
             With Race Date - $raceDate <br>
             Series Name - $seriesName <br>
		     Series Year - $seriesYear <br>
			 Has Been Added Into The Database</p>";
	    }
		mysqli_close($conn);	
	}
      echo"<a class='next' href='index.php'>Next</a>";
require_once('footer.php');
  echo"</body>";
 echo"</html>";
?>