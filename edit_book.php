<?php include("conn.php");
// includes conn.php file which establishes connection with Lib-DB

$msg=""; // Success/Error Message

// if request method is post and submit button is clicked 
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['sub']))
{
  // extrating the inputs entered using submit into php variables 
  $bookname=$_POST['booksname'];
  $authorname=$_POST['authorname'];
  $id=$_POST['book_id'];  
  $dept=$_POST['dept'];
  
  // If none of the field is left empty
  if($bookname!="" && $authorname!="" && $id!="")
  {  
    // Gets the name of the file uploaded 
    $file_name = $_FILES['file']['name'];
    
    // creates a new name of the same file using b_id which is primary key 
    // so that no collision occurs
	  $new_file_name=$id.".pdf";
    
    // gets the file location path from where the file is located on Admin system ex (Downloads folder)
    $file_tmp_loc = $_FILES['file']['tmp_name'];

    // specifies where the file should be stored on Admin Local System which is in ebooks folder
	  $file_store = "ebooks/";
    //  this stores the relative  file path location from current file 
    $fpath=$file_store.$new_file_name;
    
    // it has extentions of file types accepted
	  $accepted=array("pdf");
	 
  // here pathinfo() returns only path_extention of the file_name passed as it is given as parameter
  // if the extention is not found in accepted file types array  then echo error message 
	if(!in_array(pathinfo($file_name,PATHINFO_EXTENSION),$accepted))
	{
	 $msg= $file_name."<br> is not acceptable file type";
	}
  // if uploaded file is of pdf type
	else
	{
	  move_uploaded_file($_FILES['file']['tmp_name'],$file_store.$new_file_name);
	 }
      
  // Sql Query 
  $sql="UPDATE `book` SET". "`booksname` ='$bookname',"."`authorname` = '$authorname',"."`dept` = '$dept',"."`file_name` = '$new_file_name',"."`path` = '$fpath'". " WHERE `book`.`b_id` ="."'$id'";
      
  // Trying to update the file attributes into lib-DB 
	$data1 = mysqli_query($conn,$sql);
	
  // if update successful
    if($data1)
	  {
	    $msg= "Successfully Edit";
	  }
    // if update unsuccessful
	  else
	  {
	    $msg= "Something Went Wrong..";
	  }
  }
  // If all fields are not filled  
  else
	  {
	   $msg="all field are required";
	  }
}
?>

<!-- Html file begins here -->
<html>
<head>
<!-- title of the tab -->
<title>Edit_Book</title>

<style>
/* Styling for the Page  */
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
<!-- Body Starts from here -->
<body>
  <!-- Info Display Box -->
  <div class="box">
   <table  style ="border-color:red; font-size:16pt"  align="center" width="100%" height="100%">
      <tr>
        <td style="color:blue"><h1 align="center"><marquee>Welcome To Online Library</marquee></h1></td>
      </tr>
      <tr>
        <td style="color:blue" align="center"><b><i>EDIT BOOK FROM DATABASE</i></b></td>
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
  <!-- current file  -->
  <li><a href = "edit_book.php"  style="background-color:green">Edit Book</a></li>
  <!-- redirects to delete book page -->
  <li><a href = "delbook.php">Delete Book</a></li>
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
    <h2>EDIT BOOK</h2>
      </div>

  <!-- Table for editing the book -->
  <table style= "color:#FFFFFF;padding-top:10px;">
  
  <!-- Book_ID feild -->  
  <tr>
     <td>BOOK ID:</td>
     <td><input type="text" name="book_id" placeholder="books ID"/></td>
	</tr>
  
  <!-- Book Name feild -->    
  <tr>
     <td>BOOK NAME:</td>
     <td><input type="text" name="booksname" placeholder="books name"/></td>
  </tr>
  
  <!-- Author name feild -->
	<tr>
	  <td>AUTHOR NAME:</td>
	 <td><input type="text" name="authorname" placeholder="books author name"/></td>
        <td style="color:red;font-weight:bold;text-align:center">
        <?php echo $msg; ?>
        <!-- echos  message success or failure  -->
      </td>
	</tr>
  
  <!-- Department Feild -->
   <tr>
	  <td>DEPARTMENT:</td>
	 <td>
	 <select name="dept">
     <!-- DropDown with options -->
	   <option value="cse">Computer Science Engineering</option>
	   <option value="it">Information Technology</option>
	   <option value="me">Mechanical Engineering</option>
	   <option value="ee">Electrical and Electronics Engineering</option>
	   </select>
	   
	 </td>
	</tr>
  
  <!-- To Re-upload the book -->
	<tr>
	 <td>RE-UPLOAD EBOOK:</td>
	 <td><input type="file" name="file"  /></td>
   <!-- allows input of file type -->
	</tr>
    
  <tr>
	  <td><h2><input style="margin-left:180%;margin-top:10%;
    " type="submit" name="sub" value="RE-UPLOAD"/></h2></td>
    <!-- Submit Button -->
	</tr>
</table>
</div>
</div> 

</form>

</body>
</html>