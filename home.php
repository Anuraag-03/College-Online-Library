<?php require_once "controllerUserData.php"; ?>
<!-- controllerUserData file embeded with current file   -->
<?php 
// getting session variables from controllerUserData file 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$name=$_SESSION["name"];
// retruns  string with first character in Upper-case
$namecap=ucwords($name);
?>


<?php
include("conn.php");
// establishes new connection with Lib-DB 
?>


<!DOCTYPE html>
<html>

<style>
/* Styling the Web-Page   */
body{
  background: url("2.jpg");
}
.box{
  width:74%;
  height:160px;

  background-image: url("lib.jpeg");
  background-size: cover;
  margin-left: 13%;
  opacity: .9;
  box-shadow:0px 0px 15px lightgreen;
  border-radius:12px;
   border:solid 1px #CF0403;
}
.boxtwo{
  background-image: url("lg3.jpg");
  background-size: cover;
  box-shadow:0px 0px 15px lightgreen;
   border:solid 1px #CF0403;

}
ul{
  padding: 0  ;
  list-style: none;
}
ul li{
  float: left;
  width: 248px;
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
  padding-left:13%;
}
.box-cnt{

  box-shadow: 0px 0px 15px lightgreen;
  background:rgba(0,0,0,0.38);
  float:left;
  border-radius:12px;
  overflow: auto;
  height:400px;
  width:46%;
  margin: 2% 2%;
    float: left;

}
    .box-cnt-h{
        color:white;
       text-align: center;
        padding-top:2px;
        padding-bottom: 2px;
        background:#660000;
        border-radius:12px;
        
    }

    .box-table{
        color: white;
        text-align: center;
        border-collapse: collapse;
        margin:1%;
        box-shadow: 0px 0px 10px white;
        height: auto;
        width:450px;
        
    }
    .box-table td,tr{
        border: 3px solid white;
        
    }
    
    a{
        color: white;
    }
        
</style>
    
     
<head>
  <title>Student_DashBoard</title>
</head>
<!-- Body Starts here  -->
<body>
  <div class="box">
    <!-- Title Box  -->
   <table  style =" font-size:16pt"  align="center" width="100%" height="100%">
      <tr>
        <td style="color:white"><h1 align="center">
          <marquee><i>Welcome To Online Library</i>  </marquee></h1></td>
      </tr>
      <tr>
        <td ><mark style="color:white;background-color:maroon";> &nbsp;Welcome 
            <b><?php echo $namecap; ?> &nbsp;</b></mark></td>
      </tr>
    </table>
  </div>

  <div class="nav">
    <ul>
      <!-- current page  -->
      <li><a style="background-color: green" href="sdb.php">HOME</a></li> 
      <!-- redirects to help-us page  -->
      <li><a href="helpus.php">HELP US</a></li>
      <!-- redirects to about-us page  -->
      <li><a href="aboutus.php">ABOUT US</a></li>
      <!-- redirects to login page  -->
      <li><a href="logout-user.php">LOGOUT</a></li>
    </ul>
  
<br><br>

</div>

  <div class="boxtwo" style="border-radius: 10px; width:80%; 
  height:900px; margin-left:13%;margin-top:10px;background-color:white">
  <!-- outer box  -->
      
  <!-- cse box  -->
    <div class="box-cnt">
      <h3 class="box-cnt-h">COMPUTER SCIENCE ENGINEERING</h3>
         <table class="box-table">
                <tr>
                  <!-- row fields  -->
                    <th> Book ID </th>
                    <th> Book Name </th>
                    <th> Book Writter </th>
                    <th> Ebook Name </th>
                </tr>
               <!-- finds all books brom cse dept from Lib-DB -->
            <?php  $data=mysqli_query($conn,"SELECT * FROM `book`");
	              while($row = mysqli_fetch_array($data))
	               {   
                      if($row["dept"]=="cse"){
                        echo "<tr>";
                          $bookid_cse=NULL;
                          $bookid_cse=$row["b_id"]; // book_id
                          $lg1="<a href='view_book.php?id=$bookid_cse'>"; // link to open to view eBook
                        echo "<td>" ;echo $row["b_id"]; echo "</td>";
                        echo "<td>";echo "$lg1"; echo $row["booksname"]; echo "</a>"; echo "</td>"; // link
                        echo "<td>"; echo $row["authorname"]; echo "</td>"; // author name
                        echo "<td>"; echo $row["file_name"]; echo "</td>"; // file name 
                        echo "</tr>";
                        $bookid_cse=NULL; // clearing id 
                      }
                    }

	            ?>
         </table>
    </div>

    <!-- IT box  -->
    <div class="box-cnt">
      <h3 class="box-cnt-h">INFORMATION TECHNOLOGY</h3>
        
        <table class="box-table">
                <tr>
                  <!-- row fields  -->
                    <th>Book ID</th> 
                    <th>Book Name</th>
                    <th>Book Writter</th>
                    <th>Ebook Name</th>
                </tr>
               <!-- finds all books brom IT dept from Lib-DB -->
            <?php  $data=mysqli_query($conn,"SELECT * FROM `book`");
	              while($row = mysqli_fetch_array($data))
	               {   
                      if($row["dept"]=="it"){
                        echo "<tr>";
                          $bookid_tt=NULL;
                          $bookid_tt=$row["b_id"]; // book_id
                          $lg2="<a href='view_book.php?id=$bookid_tt'>"; // link to open to view eBook
                        echo "<td>" ;echo $row["b_id"]; echo "</td>";
                        echo "<td>";echo "$lg2"; echo $row["booksname"]; echo "</a>"; echo "</td>";// link
                        echo "<td>"; echo $row["authorname"]; echo "</td>"; // author name
                        echo "<td>"; echo $row["file_name"]; echo "</td>"; // file name
                        echo "</tr>";
                          $bookid_tt=NULL;
                      }
                    }

	            ?>
                </table>
    </div>
        
      <br/clear="all">

    <!-- EEE Box  -->
    <div class="box-cnt">
      <h3 class="box-cnt-h">ELECTRICAL AND ELECTRONICS ENGINEERING</h3>
        
        <table class="box-table">
                <tr>
                  <!-- row fields  -->
                    <th>Book ID</th>
                    <th>Book Name</th>
                    <th>Book Writter</th>
                    <th>Ebook Name</th>
                </tr>
               <!-- finds all books brom EEE dept from Lib-DB -->
            <?php  $data=mysqli_query($conn,"SELECT * FROM `book`");
	              while($row = mysqli_fetch_array($data))
	               {   
                      if($row["dept"]=="ee"){
                        echo "<tr>";
                          $bookid_ee=NULL;
                          $bookid_ee=$row["b_id"]; // b_id
                          $lg3="<a href='view_book.php?id=$bookid_ee'>"; // link to open view book
                        echo "<td>" ;echo $row["b_id"]; echo "</td>";
                        echo "<td>";echo "$lg3"; echo $row["booksname"]; echo "</a>"; echo "</td>"; // link
                        echo "<td>"; echo $row["authorname"]; echo "</td>"; // author name
                        echo "<td>"; echo $row["file_name"]; echo "</td>"; // file name 
                        echo "</tr>";
                          $bookid_ee=NULL;
                      }
                    }

	            ?>
                </table>


    </div>

    <!-- Mechanical Box   -->
    <div class="box-cnt">
      <h3 class="box-cnt-h">MECHANICAL ENGINEERING</h3>
        
        
        <table class="box-table">
                <tr>
                  <!-- row fields  -->
                    <th>Book ID</th>
                    <th>Book Name</th>
                    <th>Book Writter</th>
                    <th>Ebook Name</th>
                </tr>
               <!-- finds all books brom Mechanical dept from Lib-DB -->
            <?php  $data=mysqli_query($conn,"SELECT * FROM `book`");
	              while($row = mysqli_fetch_array($data))
	               {   
                      if($row["dept"]=="me"){
                        echo "<tr>";
                          $bookid_me=NULL;
                          $bookid_me=$row["b_id"]; // b_id 
                          $lg4="<a href='view_book.php?id=$bookid_me'>"; // link to open view book
                        echo "<td>" ;echo $row["b_id"]; echo "</td>";
                        echo "<td>";echo "$lg4"; echo $row["booksname"]; echo "</a>"; echo "</td>"; // link
                        echo "<td>"; echo $row["authorname"]; echo "</td>"; // author name 
                        echo "<td>"; echo $row["file_name"]; echo "</td>"; // file name 
                        echo "</tr>";
                          $bookid_me=NULL;
                      }
                    }

	            ?>
                </table>


    </div>
          </br/clear>


  </div>

     <!-- thanks box  -->
      <div class="boxthree" style="background-color:orange; border:solid 2px orange;border-radius: 10px; width:73.5%; height:40px; margin-left:13%; margin-top:15px" >
        <marquee behavior="alternate" direction="right" loop="1" style="margin-right:38%" align="center"><h6 style="line-height:1px;">Thank You For Using This System.</h6></marquee>


      </div>

</body>
<html>