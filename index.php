<?php
   $title="Home Page";
   require_once('head.php');
?>

 <body>
    <table>
	<tr>
	<td>
    <h2>Add Member</h2>
	
     <form action ="insertmember.php" method="post">
     First Name <br><input type="text" name = "firstName"><br>
     Last Name <br><input type="text" name = "lastName"><br>
	 Grade <br><input type="text" name = "grade"><br>
    <input type = "submit" value = "Add Member" ><br>
   </form>
   
	</td>
	<td>
  <h2>View All Members</h2>
 
   <form action ="viewmembers.php" method="post">
      <input type = "submit" value = "View All Members" >
   </form>
  </td>
  <td>
  <h2>Delete A Race </h2>
 
    <form action ="deletearace.php" method="post">
     Race ID <br><input type="text" name = "raceID"><br>
      <input type = "submit" value = "Delete Race" >
    </form>
  </td>
  
  <td>
  <h2>Race Member Sign Up</h2>
  
     <form action ="assignmember.php" method="post">
      Member ID <br><input type="text" name = "memberID"><br> 
      Race ID <br><input type="text" name = "raceID"><br>
        <input type = "submit" value = "Assign Member" ><br>
     </form>
  </td>
  <td>
   <h2>Add A Race Result </h2>
     <form action ="addraceresult.php" method="post">
       Member ID <br><input type="text" name = "memberID"><br>
       Race ID <br><input type="text" name = "raceID"><br>
	   Position <br><input type="text" name = "position"><br>
       <input type = "submit" value = "Add Result" ><br>
     </form>
  </td>
  </tr>
  <tr>
  <td>
    <h2>Member Participation</h2>
      <form action ="memberparticipation.php" method="post">
        First Name <br><input type="text" name = "firstName"><br>
        Last Name <br><input type="text" name = "lastName"><br>
        <input type = "submit" value = "View Participation" ><br>
	  </form>
   </td>
   <td>
	  <h2> Course Participation</h2>
      <form action ="courseparticipation.php" method="post">
        Course Name<br><input type="text" name = "courseName"><br>
        <input type = "submit" value = "View Course Participation" ><br>
	  </form>
	</td>
	<td>
   <h2>Course Enrolment </h2>
       <form action ="courseenrolment.php" method="post">
        First Name <br><input type="text" name = "firstName"><br>
        Last Name <br><input type="text" name = "lastName"><br>
		Course Name <br><input type="text" name = "courseName"><br>
        <input type = "submit" value = "Enrol Member" ><br>
	  </form>
	</td>
	<td>
	<h2>Add New Race </h2>
       <form action ="newrace.php" method="post">
        Race Name <br><input type="text" name = "raceName"><br>
        Race Date <br><input type="text" name = "raceDate"><br>
		Series Name <br><input type="text" name = "seriesName"><br>
		Series Year <br><input type="text" name = "seriesYear"><br>
        <input type = "submit" value = "Add New Race" ><br>
	  </form>
	 </td>
	 <td>
    <h2>Assign Member To Race </h2>
       <form action ="assignmembertorace.php" method="post">
        First Name <br><input type="text" name = "firstName"><br>
        Last Name <br><input type="text" name = "lastName"><br>
		Race Name <br><input type="text" name = "raceName"><br>
		Series Name <br><input type="text" name = "seriesName"><br>
        Series Year <br><input type="text" name = "seriesYear"><br>
        <input type = "submit" value = "Member Assign" ><br>
	  </form>
	 </td>
	 </tr>
	</table>
    
 <?php
   require_once('footer.php');
?>
 </body>
</html>
 

