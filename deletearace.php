<?php
//QUERY 5 //
   $title="Delete Race";
   require_once('head.php');

   echo "<body>";
     echo"<h2> Delete A Race </h2>";
	 
	 if(empty($_POST['raceID']))
		   echo"<p class= 'p' >Please Enter A Race ID</p>";
	   
	   else{
        
	     $conn= mysqli_connect('localhost','root','password','canary');
		 
	     $raceID=$_POST['raceID'];
		 
		 
		$query="SELECT raceID FROM race WHERE race.raceID = $raceID";
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_assoc($result);
	    $raceID = $row['raceID'];
	   	if(!$raceID) 
			echo"<p  class= 'p' >Sorry, Race Does Not Exist, Please Enter An Existing Race.</p>";
		 
		else{
	     $query = "DELETE FROM competitor WHERE raceID='$raceID'";
   		 $result= mysqli_query($conn,$query);
		 
		 $query2 = "DELETE FROM race WHERE raceID='$raceID'";
   		 $result2= mysqli_query($conn,$query2);
		 
		
		 echo"<p class= 'p' >
		 Race ID - $raceID </br>
		 Has Been Deleted From The Database</p>";
		 
	     mysqli_close($conn);
		
	    }
	   }
	 echo"<a class='next' href='index.php'>Next</a>";
     
require_once('footer.php');    
  echo"</body>";
 echo"</html>";
 
?>
