<?php
$msg="";
include("conn.php");
session_start();

$name = $_SESSION["name"];
$email = $_SESSION["email"];
$id=$_GET['id'];


$query="select * from book where `book`.`b_id`= '$id'";
$query1=mysqli_query($conn,$query);
$ros=mysqli_fetch_array($query1);
$book_name=$ros['booksname'];
$auth_name=$ros['authorname'];


if(isset($_POST['sub'])){
    
$query="select * from book where `book`.`b_id`= '$id'";
$query1=mysqli_query($conn,$query);
$ros=mysqli_fetch_array($query1);
$path=$ros['path'];
header('content-Disposition: attachment;filename = '.$id.'');
header('content-type:application/pdf');
header('content-length='.filesize($path));
readfile($path);

}

?>

<html>
<head><title>View Book</title>
    
<style>
body{
	background: url(2.jpg);
}
#table1{
		width: 70%;
		text-align: center;
		height: 40px;
    margin-left: 15%;
    font-size: 20px;
   
	}
	#table2{
		color: white;
	
	}
	.td1{
		padding: 1px;
		background-color: purple;
		
	}
	.td1:hover{
		background: green;
	}
	.td2{
		padding: 5px;
	}
	a{
		text-decoration: none;
		color: white;
		
	}
  .box{
    width:74%;
    height:160px;
	border:solid 1px #CF0403;
    background-image: url("lib.jpeg");
    background-size: cover;
    margin-left: 13%;
    opacity: .9;
    border-radius:12px;
  }
  .boxtwo{
    background-image: url("lg3.jpg");
    background-size: cover;
    box-shadow:0px 0px 15px lightgreen;
    border-radius:12px;
  }

.five{
  padding:10px 0px 10px 10px;
	width: 500PX;
  margin-top: 20px;
  margin-left: 23%;
  height:300px;
  border-radius:12px;
  margin-right: 5%;
  box-shadow:0px 0px 15px lightgreen;
  font-size:22px;


}
   .five input[type="submit"]
          {

		    font-size:15px;
		    text-align:center;
			border:none;
			height:40px;
			margin-left:40% ;
			background:#660000;
			color:#FFFFFF;
			border-radius:18px;
			}
    
    .td3{
        font-size: 13px;
        font-family: cambria;
        color: bisque;
        font-weight: bold;
    }
</style>
</head>

<body>
  <div class="box">
   <table  style =" font-size:16pt"  align="center" width="100%" height="100%" >
      <tr>
        <td style="color:royalblue"><h1><marquee>
        Welcome To online Library System
            </marquee></h1></td>
      </tr>
      <tr>
        <td  align="center"><b><i>
        <mark style="background-color:maroon;color:white">VIEW BOOK PAGE</mark></i></b></td>
      </tr>
    </table>
  </div>
   
   <table id="table1">
	<tr>
		<td class="td1">
			<a href="home.php">HOME</a>
		</td>
		<td class="td1">
			<a href="helpus.php">Help Us</a>
		</td>
		<td class="td1">
			<a href="aboutus.php">ABOUT US</a>
		</td>
		<td class="td1">
			<a href="logout-user.php">LOG OUT</a>
		</td>
	</tr>
</table>
    <br>
    <br>

   <div  class="boxtwo" style="border:solid 1px #CF0403;border-radius: 10px; width:73.5%; height:360px; margin-left:13%;background-color:white">

        <fieldset style="background:rgba(0,0,0,0.38)" class="five">
            <form method="post">
		
<table  id="table2">
	<tr>
		<td  class="td2">
		BOOK NAME :
		</td>
		<td class="td3">
            <?php echo $book_name; ?>
			
		</td>
	</tr>
  <br/>
	<tr>
		<td class="td2">
	    AUTHOR NAME :
	    </td>
		<td class="td3">
            <?php echo $auth_name; ?>
			
		</td>
	</tr>
  <br/>
	<tr>
		<td class="td2">
		ID :
		</td>
		<td class="td3">
			<?php echo $id; ?>
		</td>
	</tr>
	
  <br/>

	<tr>
		<td class="td2">
		E-BOOK :
		</td>
		<td class="td2">
            
			<input type="submit" name="sub" value="DOWNLOAD"> 
		</td>
	</tr>
	
</table>
                </form>
      </fieldset>
      </div >

     <div class="boxthree" style="background-color:orange; border:solid 2px orange;border-radius: 10px; width:73.5%; height:40px; margin-left:13%; margin-top:15px" >
      <marquee behavior="alternate" direction="right" loop="1" style="margin-right:38%" align="center"><h5 style="line-height:1px;">For any query please <a href="aboutus.php">contact us</a> . Thank You.</h5></marquee>


    </div>

  </body>
</html>