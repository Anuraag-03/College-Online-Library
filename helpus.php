<?php

//$name=$_SESSION["name"];
//$email=$_SESSION["email"];
//$gender=$_SESSION["sgender"];

?>

<html>
<head>
<title>helpUs</title>
    <style>
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
 border:solid 1px #CF0403;
  border-radius: 12px;

}
.boxtwo{
  background-image: url("3.png");
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
.three{
  margin-left: 15%;
  margin-top: 5px;
  box-shadow:0px 0px 15px green;
}
        table,tr,td{
            text-align: center;
        }
</style>


</head>
<body>

  <head><title>LOGIN_PAGE</title></head>
  <body>
    <div class="box">
     <table  style =" font-size:16pt"  align="center" width="100%" height="100%">
        <tr>
          <td style="color:white"><h1 align="center"><marquee><i>Welcome To online Library System</i>  </marquee></h1></td>
        </tr>
        <tr>
          <td align="center"><b><i><mark style="color:white;background-color:maroon";>CONTRIBUTE TO US</mark></i></b></td>
        </tr>
      </table>
    </div>



      <div class="nav">
        <ul>
          <li><a href="home.php">HOME</a></li>
          <li><a  style="background-color: green" href="helpus.php">HELP US</a></li>
          <li><a href="aboutus.php">ABOUT US</a>
          </li>
          <li><a href="logout-user.php">LOGOUT</a></li>
        </ul>
    <br><br>
          
          
  <div class="boxtwo" style="border:solid 1px #CF0403;border-radius: 10px; width:92%; height:360px; margin-left:0%;margin-top:10px;background-color:white">
      
      <p style="color:white"align="center"> 
      We are a team willing to make the progress of information transfer fast. <br/>
      We believe that everyone has the right to access information as the transfer<br/> of information plays 
      a pivotal role in the evolution of one's perspective of life.<br/> A simple project committed on these 
      values was build by us. <br/> To make the student life easier we came up with "Online library",<br/> 
      which is a free to access source. <br/>As to achieve our vision we need to add as many books as possible,
      <br/>so as to increase the reach of the project to as many students as possible. <br/>Vast varieties of bools 
      are required to <br/>cater the growing needs of the student community. <br/>
      So users are free to contribute to this project and hence can be a part of this amazing project.

      <br/>
      <br/>
      Users who are intrested to contribute eBooks to the project 
      are requested to add the eBook in the following drive !!<br/>

      <a href="https://drive.google.com/drive/folders/1K2Q5tAq4XgYWpctrPA4NViOmt-NpFFHq"target="_blank"><u style="color:white">eBooks Drive</u></a>



      </p>
      
    
  </div>



        <div  style="background-color:orange; border:solid 2px orange;border-radius: 10px; width:92%; height:40px; margin-left:0%; margin-top:15px" >
          <p ><h6 style="line-height:1px;"align="center">Thank You For Using This System.</h6></p>


        </div>


</body>
</html>
