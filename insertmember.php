<?php
//QUERY 3 //

   $title="Add Member";
   
   require_once('head.php');

   echo "<body>";
     echo"<h2>ADD A Member</h2>";
	
	 /* Code bellow checks if the user has left an empty field, if so an error message appears*/
	  if (empty ($_POST['firstName']))
		 echo"<p  class= 'p' >Please Enter Your First Name</p>";
	 else if (empty ($_POST['lastName']))
		 echo"<p  class= 'p' >Please Enter Your Last Name</p>";
	 else if (empty ($_POST['grade']))
		 echo"<p  class= 'p' >Please Enter A Grade</p>";
	
	else{
		
	 /* code to start the coonection with the database*/	
     $conn= mysqli_connect('localhost','root','password','canary');
	
	 /* identifying the variables */	
	 $firstName=$_POST['firstName'];
	 $lastName=$_POST['lastName'];
	 $grade =$_POST['grade'];
	 if ($grade == 's' OR $grade == 'j'){
	 
	/* code to run query within the database*/	
	 $query ="INSERT INTO member VALUES(NULL,'$firstName','$lastName','$grade')";
	 $result = mysqli_query($conn,$query);
	 
	 
	/* code to show the final result to the user */	
	  echo "<p  class= 'p'>First Name - $firstName <br> 
	   Last Name - $lastName <br> 
       with Grade - $grade <br> 
	   Was Added Into The Membership Database</p>";
     }
     else{
          echo"<p  class= 'p' >Sorry, This Grade Does Not Exist In The Database </p>";
     }
	 
	/* code to stop the coonection with the database*/	
	  mysqli_close($conn);
	 
	}
      echo"<a class='next' href='index.php'>Next</a>";
require_once('footer.php');
  echo"</body>";
 echo"</html>";
?>