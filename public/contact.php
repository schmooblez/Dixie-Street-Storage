<?php
/////////Note: this function is for code validation (from W3 schools)///////////////////////
function spamcheck($field) //Define the spamcheck function//
  {
  $field=filter_var($field, FILTER_SANITIZE_EMAIL);   // Sanitize e-mail address//
    if(filter_var($field, FILTER_VALIDATE_EMAIL))   // Validate e-mail address//
      {
      return TRUE;
      }
    else
      {
      return FALSE;
      }
    }
/////////////////////////End W3 schools code //////////////////////
?>
<?php require "_head.php"; ?>
<body>
<!--Top logo-->
<?php require "_navigation.php" ?>
   <h2 id="pagename">Contact Us&#58;</h2>
    <div class="container">
      <p id="locdesc">We are located less than half a mile from the intersection of 290 and 36.</p><hr>
  <!--All contact info-->
      <table class="cinfo">
        <tr>
          <td class ="bold">Mailing Address&#58;</td>
          <td class ="bold">Physical Address&#58;</td>
          <td class ="bold">Phone&#58;</td>
        </tr>
        <tr>
          <td>P.O. Box 1215<br> Brenham TX 77834</td>
          <td>405 N. Dixie Street <br> Brenham TX 77833</td>
          <td>979-836-5083</td>
        </tr>
      </table>
<!--*********************Now we get to the good stuff below: ************************ -->
<!--Contact Form-->
  <?php
  // display form if user has not clicked submit
  if (!isset($_POST["submit"]))
    {
    ?>
  <!--Contact Form-->
  <?php
   if (isset($message)){//should show a message depending on if there are errors. I may need to put my validation code above this.
    echo '<p style="color:red;">'.$message.'</p>';
  }
  ?>
     <form action="email2.php?do=send" method="POST">
        <fieldset>
          <legend>Contact us&#58;</legend>
          <div class="dss">
          <img id="dssunits" src="dixie_street_storage.jpg" alt="Dixie Street Storage Units">
          </div>
          <p id="firstname">
            <label for="firstname">First Name&#58;</label><br>
            <input type="text" name="fname" class="formfield" id="firstname" value="<?php echo @$fname ?>" required>
          </p>
          <p>
            <label for="lastname">Last Name&#58;</label><br>
            <input type="text" name="lname" class="formfield" value="<?php echo @$lname ?>">
          </p>
          <p>
            <label for="email">&#42;E&#150;mail&#58;</label><br>
            <input type="email" name="femail" class="formfield" value="<?php echo @$femail ?>" required>
          </p>
          <p>
            <label for="email">&#42;Retype E&#150;mail&#58;</label><br>
            <input type="email" name="f2email" class="formfield" value="<?php echo @$femail ?>" required>
          </p>
          <p>
            <label for="phone">&#42;Phone Number&#58;</label><br>
            <input type="tel" name="fphone1" class="formfield" value="<?php echo @$fphone1 ?>">
          </p>
          <p id="message">
            <label for="message">Message&#58;</label><br>
            <textarea rows="5" cols="60" name="fsendmail" placeholder="Please enter a brief message here&hellip;" required></textarea>
          </p>
          <div id="submit">
            <input type="submit" value="Submit">
          </div>
          <p id="disclaimer">&#42;Dixie Street Storage does not sell or share your information with outside vendors and only uses your personal information for the purpose of contacting you regarding our services.</p>
        </fieldset>
      </form>
    </div>
  <?php
  }
  else // the user has submitted the form
    {
//Validate all fields//
    switch (@$_GET['do'])
     {
     case "send":
          $fname = strip_tags($_POST['fname']);
          $lname = strip_tags($_POST['lname']);
          $femail = strip_tags($_POST['femail']);
          $fphone1 = strip_tags($_POST['fphone1']);
          $fsendmail = strip_tags($_POST['fsendmail']);
          $secretinfo = strip_tags($_POST['info']);
        if (!preg_match("/\S+/",$fname))//Validate first name
        {
          unset($_GET['do']);
          $message = "First Name required. Please try again.";
          break;
        }
        if (!preg_match("/\S+/",$lname)) //Validate last name
        {
          unset($_GET['do']);
          $message = "Last Name required. Please try again.";
          break;
        }
        if (!preg_match("/^\S+@[A-Za-z0-9_.-]+\.[A-Za-z]{2,6}$/",$femail)) //Validate email
        {
          unset($_GET['do']);
          $message = "Primary Email Address is incorrect. Please try again.";
          break;
        }
        if (!preg_match("/^\S+@[A-Za-z0-9_.-]+\.[A-Za-z]{2,6}$/",$f2email)) //Validate email confirmation
          {
            unset($_GET['do']);
            $message = "Secondary Email Address is incorrect. Please try again.";
            break;
          }
    //verfiy that the e-mail's match
        if($email1 != $f2email){
            $message = "The emails you entered do not match!";
          }
        if (!preg_match("/^[0-9 #\-\*\.\(\)]+$/",$fphone1))
        {
          unset($_GET['do']);
          $message = "Phone Number 1 required. No letters, please.";
          break;
        }

   //Note: The code below I got from W3 schools and altered slightly:

       //If everything checks out, check for spam
        if ($secretinfo == "")
          {
            if (isset($_POST["femail"])) // Check if the "e-mail" input field is filled out
            {
              $mailcheck = spamcheck($_POST["femail"]);  // Check if "from" email address is valid
                if ($mailcheck==FALSE)
                  {
                  echo "Error: Invalid input! Please re-enter your e-mail.";
                  }
      //End W3 schools code.
                else
                  {
                     $myemail = "foreverb90@hotmail.com";
                     $emess = "First Name: ".htmlspecialchars($fname)."\n";
                     $emess.= "Last Name: ".htmlspecialchars($lname)."\n";
                     $emess.= "Email: ".htmlspecialchars($femail)."\n";
                     $emess.= "Phone number 1: ".htmlspecialchars($fphone1)."\n";
                     $emess.= "Comments: ".htmlspecialchars($fsendmail);
                     $ehead = "From: ".htmlspecialchars($femail)."\r\n";
                     $subj = "Inquiry from ".htmlspecialchars($fname)." ".htmlspecialchars($lname).".";
                     $emess = wordwrap($emess, 70);
                     $mailsend = mail("$myemail","$subj","$emess","$ehead");
                     echo "Your message has been sent to " .htmlspecialchars($femail). ".";
                  }
            }
          }
           unset($_GET['do']);
//         header("Location: thank_you.html"); Shoot them to a thank you page... - Not built yet. Do I really need this?  //
         break;
     default: break;
     }
    }
  ?>

<!--Contains basic standard footer info-->
  <div class="footer">
    <nav id ="footnav">
      <a href="index.html">Home</a>
      <a href="storagetips.html">Storage Tips</a>
      <a href="sizeguide.html">Size Guide</a>
      <a href="faq.html">FAQ</a>
      <a href="contactus.php">Contact</a>
    </nav>
    <p id="copy"> &copy; Copyright 2014 Dixie Street Storage. </p>
  </div>
</body>
</html>