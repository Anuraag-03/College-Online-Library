<?php 
// includes the conn file which connects with 
include("conn.php");?>

<html>
<head>
<style>
/* Styling Effects of the page */
body{
  background: url("2.jpg");
}
    table{
                width: 100%;
                border-collapse: collapse;
                height: auto;
        text-align: center;
        color: white;
        font-weight: bold;

            }
    
    th{
        font-size: 17px;
        text-decoration: underline;
        font-style: italic;
    }
    
    .main{
        width: 80%;
        box-shadow: 0px 0px 20px red;
        border-radius: 20px;
        overflow: auto;
        margin-left: 10%;
        margin-top: 2%;
        height:270px;
        background: rgba(0, 0, 0, 0.57);
    }
.box{
  width:74%;
  height:160px;
  background-image: url("lib.jpeg");
  background-size: cover;
  margin-left: 13%;
  opacity: .9;
 border:solid 1px #CF0403;
  border-radius: 12px;

}
.boxtwo{
  background-image: url("lg3.jpg");
  background-size: cover;
  box-shadow:0px 0px 15px lightgreen;
  border-radius:12px;
  

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
.three{
  margin-left: 60%;
  margin-top: 5px;
  box-shadow:0px 0px 15px green;
}
    button{
        margin-top: 10px;
    }
</style>

<title>Admin Dasboard</title>
<!-- title of tab -->
</head>

<!-- body starts here -->
<body>

  
    <div class="box">
     <table  style =" font-size:16pt"  align="center" width="100%" height="100%">
        <tr>
            <td style="color:white"><h1 align="center">
              <marquee><i>Welcome To Online Library System</i>  </marquee></h1>
              <!-- moving text  -->
            </td>
        </tr>

        <tr>
          <td align="center"><b><i><mark style="color:white;background-color:maroon";>
          ADMIN CONTROL PANEL</mark></i></b>
          </td>
        </tr>
      </table>
    </div>

      <div class="nav">
        <ul>
          <!-- current file  -->
          <li><a style="background-color: green" href="admin.php">Admin Dashboard</a></li> 
          <!-- redirects to add book page -->
          <li><a href="add_book.php">Add Book</a></li>
          <!-- redirects to edit book page -->
          <li><a href="edit_book.php">Edit Book</a></li>
          <!-- redirects to delete book page -->
          <li><a href="delbook.php">Delete Book</a></li>
          <!-- log-out which redirects to login page -->
          <li><a href="logout-user.php">Logout</a></li>
        </ul>
           </div>
    <br><br>
          
          
  <div class="boxtwo" style="border:solid 1px #CF0403;border-radius: 10px; 
     width:85%; height:360px; margin-left:9%;margin-top:10px;background-color:white">
      <!-- The outer box  -->

       <p style="text-align:center;color:yellow;font-weight:bold">ALL BOOKS</p>
   <div class="main">
    <!-- The inner box with scroll bars -->
      
       <table>
         <!-- table to display all the books present in the online library -->
                <tr>
                    <!-- Book_id attribute of table  -->
                    <th>Book ID</th>
                    <!-- Book_Name attribute of table  -->
                    <th>Book Name</th>
                    <!-- Author attribute of table  -->
                    <th>Author</th>
                    <!-- Department attribute of table  -->
                    <th>Depertment</th>
                    <!-- Ebook_Name attribute of table  -->
                    <th>Ebook Name</th>
                </tr>
                
                       
            <?php 
           // Sql qurey 
           $data=mysqli_query($conn,"SELECT * FROM `book`");
               // retrieving the result each row at a time using while loop 
	              while($row = mysqli_fetch_array($data))
	               {   
                        echo "<tr>"; // table row 
                        echo "<td>" ;echo $row["b_id"]; echo "</td>"; // puts book_id in table
                        echo "<td>";echo $row["booksname"]; echo "</td>"; // puts Book's_Name in table
                        echo "<td>"; echo $row["authorname"]; echo "</td>"; // puts Author_Name in table
                        echo "<td>"; echo $row["dept"]; echo "</td>"; // puts Department in table
                        echo "<td>"; echo $row["file_name"]; echo "</td>"; // puts Efile_name in table
                        echo "</tr>";
                    }

	            ?>
                </table>
      
      </div>   
   

  </div>
      
        <div  style="background-color:orange; border:solid 2px orange;border-radius: 10px; 
           width:84%; height:40px; margin-left:9%; margin-top:15px" >
          <marquee behavior="alternate" direction="right" loop="1" style="margin-right:38%" align="center">
          <h6 style="line-height:1px;">Thank You.</h6></marquee>
          <!-- Thank You box -->
        </div>
   
    </body>
  
</html>
