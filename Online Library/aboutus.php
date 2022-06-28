<!-- Html document starts here  -->
<html>
<head>
<title>About Us</title>

<style>
/* Styling for Web-Page  */
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
  margin-left: 60%;
  margin-top: 5px;
  box-shadow:0px 0px 15px green;
}
    td{
        text-align: center;
    }

</style>
</head>

<!-- Body starts here  -->
<body>

  
    <div class="box"> 
    <!-- Title Box  -->
     <table  style =" font-size:16pt"  align="center" width="100%" height="100%">
        <tr>
          <td style="color:white"><h1 align="center"><marquee><i>Welcome To online Library System</i>  </marquee></h1></td>
        </tr>
        <tr>
          <td align="center"><b><i><mark style="color:white;background-color:maroon";>ABOUT US</mark></i></b></td>
        </tr>
      </table>
    </div>



      <div class="nav">
      <!-- Menu Bar  -->
        <ul>
          <li><a href="home.php">HOME</a></li>
          <li><a href="helpus.php">HELP US</a></li>
          <li><a style="background-color: green" href="aboutus.php">ABOUT US</a>
          </li>
          <li><a href="logout-user.php">LOGOUT</a></li>
        </ul>
    <br><br>
    </div>
          
          
  <div class="boxtwo" style="border:solid 1px #CF0403;border-radius: 10px; width:84%; height:850px;
   margin-left:10%;margin-top:10px;background-color:white">
   <!-- Heading  -->
      
      <h1 style="color:yellow;text-align:center;background:rgba(255, 255, 255, 0.24)">
      ABOUT OUR ONLINE LIBRARY MANAGEMENT SYSTEM PROJECT </h1>

    <!-- what the online library offers  -->
      <P style="color:white;text-align:center;width:60%;font-weight:bold;margin-left
:20%;background:rgba(0, 0, 0, 0.5);box-shadow:0px 0px 20px white;border-radius:10px;
padding:3%;font-size:15px">This project is the prototype of a Simple Online Library  System. 
Adminstrator has a provision to Add Book details like ID number, book title, author name, 
through the web page. Admin can also edit the books and delete books from the database.
Students can search for books according to their department.  
Student can easily download this book's E-Book which is PDF file.</P>
      
<!-- ACKNOWLEDGEMENT -->
       <h2 style="color:#1602b2;text-align:center;background:rgba(255, 255, 255, 0.82);"> 
       ACKNOWLEDGEMENT </h2>
      <P style="color:white;text-align:center;width:60%;font-weight:bold;margin-left
                :20%;background:rgba(0, 0, 0, 0.5);box-shadow:0px 0px 20px red;
                border-radius:10px;padding:3%;font-size:15px">
                We would like to express our special thanks of gratitude to our mentor 
                <i>Srikanth Sir</i> 
                who gave us the goldenopportunity to do this wonderful project 
                on the topic : ONLINE LIBRARY SYSTEM using  PHP, 
                which also helped us indoing a lot of Research and 
                we came to know about so many new things we are really thankful to him.

    <!-- group members information  -->
       <h2 style="color:#000000;text-align:center;background:rgba(255, 255, 255, 0.82)"> Group Members </h2>
       <br/>
       
      <div style="color:white;text-align:center;width:30%;font-weight:bold;margin-left
:30%;background:rgba(0, 0, 0, 0.5);box-shadow:0px 0px 20px #fc7af7;border-radius:10px;padding:3%;font-size:15px;height:220px;"><marquee direction="up" scrolldelay="100" height=100%>
          
         <tr><td><br/></td><td> B Anuraag  </td><td><br/></td><td> Role = ( Backend Developer )
         <br>Mail-ID : anuraag.cbit@gmail.com</td><td><br/></td></tr>
            <br/>
            <hr>
          
         <tr><td><br/></td><td> D V Dheeraj </td><td><br/></td><td>Role  = ( Full Stack Developer )<br>Mail-ID : dheeraj.cbit@gmail.com</td><td><br/></td></tr>
            <br/>
            <hr>
          
          </marquee></div>
  </div>


      <!-- Thank You Box  -->
        <div  style="background-color:orange; border:solid 2px orange;border-radius: 10px; 
        width:84%; height:40px; margin-left:10%; margin-top:15px" >
          <marquee behavior="alternate" direction="right" loop="1" style="margin-right:38%" 
          align="center"><h6 style="line-height:1px;">Thank You For Using This System.
        </h6></marquee>

        </div>

</body>
</html>
