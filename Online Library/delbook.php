<?php include("conn.php");
// includes conn.php file which establishes connection with Lib-DB

$msg=""; // Success/Error Message

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['sub']))

{
  // gets id posted by admin
  $id=$_POST['book_id'];  
  
  // if id is not empty string
  if($id!="")
  {  
    // SQL query to delete from table 
      $sql="DELETE FROM `book` WHERE `book`.`b_id` ="."'$id'";
  // executing the query and retrieving into data    
	$data = mysqli_query($conn, $sql);
	
   // if query is executed successfully 
    if($data)
	  {
	    $msg= "Book Delete Successfully"; // success message
	  }
    // if query failed to execute
	  else
	  {
	    $msg= "Something Went Wrong.."; // failure message
	  }
  }
  // if book_id is left empty and submit is invoked
  else
	  {
	   $msg="Book ID Required";
	  }
}
?>


<html>
<head>
<title>Delete_Book</title>


<style>
/* Styling for the web-page  */
body{
  background: url(2.jpg);
}
.box{
  width:74%;
  height:160px;

  background-image: url(lib.jpeg);
  background-size: cover;
  margin-left: 13%;
  opacity: .9;
  border-radius:12px;
  box-shadow:0px 0px 15px lightgreen;
   border:solid 1px #CF0403;
  border-radius: 12px;
}

	 .header{
	         width:400px;
			color:#FFFFFF;
			 display: inline-block;
			 width:78.5%;
			 height:370px;
			 margin-left:13%;
       background-image: url("lg3.jpg");
       background-size: cover;
			 box-shadow:0px 0px 15px lightgreen;
       border-radius:12px;
         border:solid 1px #CF0403;

			 }


	.title
	       {
				color:#FFFFFF;
			   font-size:20px;
			 	font-weight:10px;
				
				background:rgba(0,0,0,0.5);
                margin-top: 4%;
				margin-right:56%;
				padding-left:10%;
				font-style:italic;
				}
	.title h2{
	           background:#660000;
			   border:none;
         margin-left:20px;
         margin-top: 10px;
			  padding-top:3px;
        padding-bottom: 2px;
			    padding-left:150px;
				border-radius:15px;
        width:280px;
	           }

	.container{
        margin-top: 15px;
	            margin-left:20%;

				font-weight:10px;
				height:350px;
				background:rgba(0,0,0,0.5);
				padding-left:3%;
                width:600px;
        box-shadow:0px 0px 15px lightgreen;
        border-radius:18px;
        overflow:auto;
				}

   .header input[type="submit"]
          {

		    font-size:25px;
		    text-align:center;
			border:none;
			height:40px;
			margin-left:110% ;
            margin-top: 10px;
			background:#660000;
			color:#FFFFFF;
			border-radius:18px;
			}



ul{
  padding: 0  ;
  list-style: none;
}
ul li{
  float: left;
  width: 200px;
  height: 40px;
  background-color: purple;
  opacity: .8;
  line-height: 40px;
  text-align: center;
  font-size: 20px;
  margin-right: 2px;
}
ul li a{
  text-decoration: none;
  color: white;
  display: block;
}
ul li a:hover{
  background-color: green;
}
ul li ul li{
  display: none;
}
ul li:hover ul li{
  display: block;
}
.nav{
  padding-left:12%;

}
</style>
</head>

<!-- Body starts here  -->
<body>
  <div class="box">
  <!-- Info Display Box -->
   <table  style ="border-color:red; font-size:16pt"  align="center" width="100%" height="100%">
      <tr>
        <td style="color:blue"><h1 align="center">
          <marquee>Welcome To Online Library System</marquee></h1></td>
      </tr>
      <tr>
        <td style="color:blue" align="center"><b><i>DELETE BOOK FROM DATABASE</i></b></td>
      </tr>
    </table>
  </div>
<div class="nav">
<!-- Menu Options -->
<ul>
  <!-- Redirects to Admin DashBoard -->
  <li><a href = "admin.php">Admin Dashboard</a></li>
  <!-- redirects to add book page -->
  <li ><a href = "add_book.php" >Add Book</a></li>
  <!-- redirects to edit book page -->
  <li><a href = "edit_book.php" >Edit Book</a></li>
  <!-- current file  -->
  <li><a href = "delbook.php"  style="background-color:green">Delete Book</a></li>
  <!-- log-out which redirects to login page -->
  <li><a href = "logout-user.php">Logout</a></li>
</ul>
<br><br><br>
</div>

<form action="" method="POST" enctype="multipart/form-data">
<!-- Form which sends inputs suing post method 
and the enctype here provides files to passed by the form using post method -->
<div class = "header">
<!-- Outer Box -->
  <div class = "container">
  <!-- Inner Box -->
    <div class="title">
    <!-- Heading element -->
    <h2>DELETE BOOK</h2>
    </div>

  <table style= "color:#FFFFFF;padding-top:10px;">
      <!-- Table for deleting the file  -->

      <!-- Book_id field  -->
      <tr> 
     <td style="width:250px;text-align:center">BOOK ID:</td>
     <td><input style="width:200px;" type="text" name="book_id" placeholder="books ID"/></td>
	</tr>
     
    <!-- Submit Button  -->
    <tr>
	  <td><h2><input style="margin-left:100%;margin-top:30%;" type="submit" name="sub" value="Delete"/></h2></td>
	  </tr>
      
    <!-- To echo success or failure message  -->
    <tr><td  style="color:red;font-weight:bold;text-align:center">
    <?php echo $msg; ?>
    </td></tr> 

    </table>
    </div>
   </div> 

 </form>

</body>
</html>