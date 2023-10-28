<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 ?>
<?php 
 $pkgname=@$_GET['pkgname'];
session_start();
error_reporting(0);
if(!isset($_SESSION['logindone'])||($_SESSION['logindone'])!=true)
{
    echo ("<script>alert('Please Login First Your Session Is Not Started Yet ')</script>");
    header('refresh:0; url=index.php');
} 
else
{
?>
<?php
    
    $link = mysqli_connect("localhost","root","","pyb");    
   if(isset($_POST['submit']))
    {
       
        $uname = $_POST['uname'];
        $unumber = $_POST['unumber'];
        $email = $_POST['email'];
        $pickdate = $_POST['pickdate'];
        $dropdate = $_POST['dropdate'];
        $noofseat = $_POST['noofseat'];
        $adult = $_POST['adult'];
        $child = $_POST['child'];
        $pickloc = $_POST['pickloc'];
        $droploc = $_POST['droploc'];
        $date1 = date('y.m.d');

        if (!preg_match("/^([a-zA-Z' ]+)$/",$uname) )
        {  
            echo ("<script>alert('Only alphabets and whitespace are allowed.')</script>");
            header("refresh:0; url=booking.php?pkgname=".$_GET['pkgname']);
        }
        else
        {
            if(!preg_match('/^[0-9]{10}+$/', $unumber))
            {
                echo ("<script>alert('Please Enter Valid Phone Number.')</script>");
                header("refresh:0; url=booking.php?pkgname=".$_GET['pkgname']);
            }
            else
            {

                if (!filter_var($email,FILTER_VALIDATE_EMAIL))
                {
                    echo ("<script>alert('Please Enter Valid Email Address.')</script>");
                    header("refresh:0; url=booking.php?pkgname=".$_GET['pkgname']);
                }
                else
                {

                    if (!is_numeric($noofseat))
                    {
                        echo ("<script>alert('Please Enter Number Only For NO Of Seat.')</script>");
                        header("refresh:0; url=booking.php?pkgname=".$_GET['pkgname']);
                    }
                    else
                    {
                        if (!is_numeric($adult))
                        {
                            echo ("<script>alert('Please Enter Number Only For Adult.')</script>");
                            header("refresh:0; url=booking.php?pkgname=".$_GET['pkgname']);
                        }
                        else
                        {
                            if (!is_numeric($child))
                            {
                                echo ("<script>alert('Please Enter Number Only For Child.')</script>");
                                header("refresh:0; url=booking.php?pkgname=".$_GET['pkgname']);
                            }
                            else
                            {
                                if(!ctype_alpha($pickloc))
                                {
                                    echo ("<script>alert('Please Enter Proper City For PickUp')</script>");
                                    header("refresh:0; url=booking.php?pkgname=".$_GET['pkgname']);
                                }
                                else
                                { 
                                    if(!ctype_alpha($droploc))
                                    {
                                        echo ("<script>alert('Please Enter Proper City For Drop')</script>");
                                        header("refresh:0; url=booking.php?pkgname=".$_GET['pkgname']);
                                    }
                                    else
                                    {   
                                        $query = "insert into book(uname,unumber,email,pkgname,pickdate, dropdate, noofseat, adults, child, pickloc, droploc, date1) VALUES ('$uname','$unumber','$email','$pkgname','$pickdate','$dropdate','$noofseat','$adult','$child','$pickloc','$droploc','$date1')";
                                        

                                        if(mysqli_query($link,$query))
                                        {
                                            
                                            
                                            require 'C:/xampp/sendmail/phpmailer/src/Exception.php';
                                            require 'C:/xampp/sendmail/phpmailer/src/PHPMailer.php';
                                            require 'C:/xampp/sendmail/phpmailer/src/SMTP.php';

                                            $mail = new PHPMailer(true);

                                            $mail->isSMTP();
                                            $mail->Host = 'smtp.gmail.com';
                                            $mail->SMTPAuth = true;
                                            $mail->Username = 'packyourbags73@gmail.com';
                                            $mail->Password = 'zfqnkyysdxxfjpka';
                                            $mail->SMTPSecure = 'ssl';
                                            $mail->Port = 465;

                                            $mail->setFrom('packyourbags73@gmail.com');

                                            $mail->addAddress($_POST["email"]);
                                            
                                            $mail->isHTML(true);

                                            $mail->Subject = "Confirmation From Pack Your Bag's";
                                            $mail->Body = "Dear<h1>". $uname."</h1> <br>

                                            <p><h5>I am writing to confirm our recent booking with you. The details of the booking are as follows:</h5></p> <br>

                                                <table>
                                                    <tbody >
                                                        <tr>
                                                            <td><p>Contact Number:<b>[".$unumber."]</b></p></td>
                                                        </tr>
                                                        <tr>
                                                            <td><p>Check-in date: <b>[".$pickdate."]</b></p></td>
                                                        </tr>
                                                         <tr>
                                                            <td><p>Check-out date: <b>[".$dropdate."]</b></p></td>
                                                        </tr>
                                                         <tr>
                                                            <td> <p>Number of seats: <b>[".$noofseat."]</b></p></td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                <p>We are looking forward to our ".$pkgname." tour and are excited to experience all that [City/Location] has to offer.</p><br>

                            <p> Please let us know if there is any additional information we need to provide or if there is anything else you require from us
                                        please contact us on [packyourbags73@gmail.com].<p><br>

                                        <p>Thank you for your assistance in making this booking. We look forward to hearing from you soon.</p><br>

                                        <p>Sincerely,</p><b>

                                       <p> [PackYourBag's]<p>";

                                            $mail->send();
                                            header('refresh:0; url=explore.php');
                                             // echo ("<h1>DATA SUBMIT</h1>");
                                            // echo ("<script>alert('Registration Sucessfull')</script>");

                                        }
                                    }
                                }
                            }
                        }
                    }

                }              
            }
        }

    }

 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">

    <script>
        if(window.history.replaceState)
        {
            window.history.replaceState(null,null,window.location.href);
        }
    </script>
    <style>
    	body{
    		width: 100%;
			background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url("images/bgimg.jpg");
			background-position: center;
			background-size: cover;
			box-sizing: border-box;
			background-repeat: no-repeat;
    	}
    	.form{
    		opacity: 0.6;
    	}
    </style>
<!-- <h1 style="color: yellow;">B</h1><h2 style="color: white;">ook</h2> -->
<body >
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                  <a class="navbar-brand" href="#">🅿🅰🅲🅺 🆈🅾🆄🆁 🅱🅰🅶'🆂</a>
                  <h6 style="color: black;">WELCOME <?php echo $_SESSION['username']; ?></h6>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                      <li class="nav-item">
                        <a href="logout.php" style="text-decoration: none;" class="text-dark">𝐥𝐨𝐠𝐨𝐮𝐭</a>
                      </li>
                    </ul>
                  </div>
                </nav>
   <div class="container mt-3" style="max-width: 50%; height: auto;">
       <div class="row  mt-3">
           <div class="col-sm-4 ">
               <div class="row" style="color: white;">
                   <div class="col-sm-2"><h1 style="color: yellow;">𝓑</h1></div>
                   <div class="col-sm-2"><h2>𝒐</h2></div>
                   <div class="col-sm-2"><h2>𝒐</h2></div>
                   <div class="col-sm-2"><h2>𝒌</h2></div>
               </div>
           </div>
           <div class="col-sm-4 ">
               <div class="row" style="color: white;">
                   <div class="col-sm-2"><h1 style="color: yellow;">𝒀</h1></div>
                   <div class="col-sm-2"><h2>𝒐</h2></div>
                   <div class="col-sm-2"><h2>𝒖</h2></div>
                   <div class="col-sm-2"><h2>𝒓</h2></div>
               </div>
           </div>
           <div class="col-sm-4 ">
               <div class="row" style="color: white;">
                   <div class="col-sm-2"><h1 style="color: yellow;">𝑻</h1></div>
                   <div class="col-sm-2"><h2>𝒐</h2></div>
                   <div class="col-sm-2"><h2>𝒖</h2></div>
                   <div class="col-sm-2"><h2>𝒓</h2></div>
               </div>
           </div>
       </div>
 <form action="#" method="post" enctype="multipart/form-data">
        <div class="container shadow" style="height: auto;  background: transparent;">
           
            <div class="row mt-2 text-center text-white"> 
                <div class="col-sm-12 text-center text-white"><h3> 𝐏𝐞𝐫𝐬𝐨𝐧𝐚𝐥 𝐃𝐞𝐭𝐚𝐢𝐥</h3> </div>           
            </div>

            <div class="row mt-3" >
                <div class="col-sm-6" style="background: transparent;">
                    <p style="color: white;">𝐄𝐧𝐭𝐞𝐫 𝐘𝐨𝐮𝐫 𝐍𝐚𝐦𝐞</p>
                    <input type="text" class="form-control" style="border-radius: 20px; color: white; background: transparent;" placeholder="Enter Your Name" name="uname" />
                </div>

                <div class="col-sm-6" style="background: transparent;">
                    <p style="color: white;">𝐏𝐡𝐨𝐧𝐞 𝐍𝐮𝐦𝐛𝐞𝐫</p>
                    <input type="text" class="form-control" style="border-radius: 20px; color: white; background: transparent;" placeholder="Enter Your Phone Number" name="unumber" />
                </div>
            </div>

            <div class="row" style="background: transparent;">
                <p style="color: white;" class="ml-3">𝐄𝐦𝐚𝐢𝐥</p>
                <input type="text" class="form-control ml-3 mr-3" style="border-radius: 20px; color: white; background: transparent; width: 100%;" placeholder="Enter Your Email" name="email" />
            </div>

            <div class="row mt-2 text-center text-white mt-3"> 
                <div class="col-sm-12 text-center text-white"><h3> 𝐁𝐨𝐨𝐤𝐢𝐧𝐠 𝐃𝐞𝐭𝐚𝐢𝐥</h3> </div>  
            </div>

            <div class="row mt-3" >

                <div class="col-sm-12" style="background: transparent;">
                    <p style="color: white;">𝐏𝐚𝐜𝐤𝐚𝐠𝐞 𝐍𝐚𝐦𝐞</p>
                    <input type="text" class="form-control" style="border-radius: 20px; color: white; background: transparent;" placeholder="Package Name" name="pkgname" value="<?php echo $_GET['pkgname'] ?>" readonly />
                </div>
                
                <?php 

                $query = "SELECT * FROM pkgdetail where pkgname='$pkgname'";
                $result = mysqli_query($link,$query);
                while($row=mysqli_fetch_assoc($result))
                {
                 ?> 
                <div class="col-sm-6" style="background: transparent;">
                    <p style="color: white;">𝐏𝐢𝐜𝐤 𝐔𝐩 𝐃𝐚𝐭𝐞</p>
                    <input type="date" class="form-control" style="border-radius: 20px; color: white; background: transparent;" placeholder="Pick Up Date" name="pickdate" value="<?php echo $row['startdate'] ?>" readonly/>
                </div>
                <div class="col-sm-6" style="background: transparent;">
                    <p style="color: white;">𝐋𝐚𝐲 𝐎𝐟 𝐃𝐚𝐭𝐞</p>
                    <input type="date" class="form-control" style="border-radius: 20px; color: white; background: transparent;" placeholder="Drop   Date" name="dropdate" value="<?php echo $row['enddate'] ?>" readonly/>
                </div>
                <?php 
                }
                 ?>
            </div>

            <div class="row mt-3" >
                <div class="col-sm-4" style="background: transparent;">
                    <p style="color: white;">𝐍𝐮𝐦𝐛𝐞𝐫 𝐎𝐟 𝐏𝐚𝐬𝐬𝐞𝐧𝐠𝐞𝐫𝐬</p>
                    <input type="text" class="form-control" style="border-radius: 20px; color: white; background: transparent;" placeholder="Nmuber Of Passenger" name="noofseat" />
                </div>
                <div class="col-sm-4" style="background: transparent;">
                    <p style="color: white;">𝐀𝐝𝐮𝐥𝐭𝐬(𝟏𝟔+)</p>
                    <input type="text" class="form-control" style="border-radius: 20px; color: white; background: transparent;" placeholder="Number Of Adults" name="adult" />
                </div>
                <div class="col-sm-4" style="background: transparent;">
                    <p style="color: white;">𝐂𝐡𝐢𝐥𝐝𝐫𝐞𝐧𝐬</p>
                    <input type="text" class="form-control" style="border-radius: 20px; color: white; background: transparent;" placeholder="Number Of Children" name="child" />
                </div>
            </div>

            <div class="row mt-3" >
                <div class="col-sm-6" style="background: transparent;">
                    <p style="color: white;">𝐏𝐢𝐜𝐤 𝐔𝐩 𝐋𝐨𝐜𝐚𝐭𝐢𝐨𝐧</p>
                    <input type="text" class="form-control" style="border-radius: 20px; color: white; background: transparent;" placeholder="Enter Your PickUp Location" name="pickloc" />
                </div>
                <div class="col-sm-6" style="background: transparent;">
                    <p style="color: white;">𝐃𝐫𝐨𝐩 𝐋𝐨𝐜𝐚𝐭𝐢𝐨𝐧</p>
                    <input type="text" class="form-control" style="border-radius: 20px; color: white; background: transparent;" placeholder="Enter Your Drop Location" name="droploc" />
                </div>
            </div>

            <div class="row mt-2 text-center text-white mt-3"> 
                <div class="col-sm-12 text-center text-warning"><p>𝐇𝐚𝐯𝐞 𝐚 𝐌𝐞𝐦𝐨𝐫𝐚𝐛𝐥𝐞 𝐌𝐨𝐦𝐞𝐧𝐭 </p> </div>  
            </div>

           

            <div class="row mt-2 p-2">
                <div class="col-sm-6">
                    <input type="submit" name="submit" value="submit" class="btn btn-warning btn-block">
                </div>
                <div class="col-sm-6">
                    <button type="button" class="btn btn-warning btn-block">Reset</button>
                </div>
            </div>

        </div>
</form>

    <!-- <div class="col-md-12  text-center mt-5"><h1 class="text-white">BOOK YOUR TOUR HERE</h1></div>
    <div class="container " style="height: auto; width: 40%; background: transparent;">

        <form class="mt-5" >
        			 <div class="form-outline mb-4 form">
                        <p>Enter your name<p>
                        <input type="tel" id="contactBlockPhone3" class="form-control" style="border-radius: 20px;" placeholder="Enter Your City" />
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6 form">
                            <div class="form-outline mb-4 " style="background-color: transparent;">
                               <input class="form-control" type="date" name="date" style="border-radius: 20px;" required>

                            </div>
                        </div>
                        <div class="col-md-6 form">
                            <div class="form-outline mb-4 " style="background-color: transparent;">
                               <input class="form-control" type="date" name="date" style="border-radius: 20px;" required>

                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-dark btn-block" style="width: 50%; margin-left: 25%;">Send message</button>
                </form>
    </div> -->
    <footer class="bg-dark mt-5 ">
      
       <div class="container">
          <div class="row text-white p-5">
            <div class="col">
              <h5 ><img src="logo/phone.svg ">Mobile Number</h5>
            <p>0240-666333 </p>
            <p>+911234567890 </p>
            </div>
            <div class="col">
              <h5 ><img src="logo/mail.svg ">Email</h5>
              <p>abc@gmail.com</p>
                <p>xyz@gmail.com </p>
            </div>
            <div class="col">
              <h5>Social Links</h5>
              <p><img src="logo/instagram.svg">Pack_You'r_Bag's_123</p>
              <p><img src="logo/facebook.svg">Pack You'r Bag's</p>
            </div>
          </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
<?php 
}
 ?>