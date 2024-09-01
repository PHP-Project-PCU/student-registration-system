<?php

namespace controllers;

use core\helpers\Constants;

// Load Composer's autoloader
require_once(Constants::$BASE_PATH . '\vendor\autoload.php');


/*
  We have to put the PHPMailer namespaces at the top of the page.
*/

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

/*
   We have to require the config.php file to use our 
   Gmail account login details.
*/

use core\mail\MailConfig;

/*
 * The function uses the PHPMailer object to send an email 
 * to the address we specify.
 * @param  [string] $email, [Where our email goes]
 * @param  [string] $subject, [The email's subject]
 * @param  [string] $message, [The message]
 * @return [string]          [Error message, or success]
 */

class MailController
{
   private $data;

   public function __construct($data)
   {
      $this->data = $data;
   }

   function sendMail($data)
   {
      // Creating a new PHPMailer object.
      $mail = new PHPMailer(true);

      // If you want to see the email process uncomment the 
      // SMTPDebug property.  
      // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

      // Using the SMTP protocol to send the email.
      $mail->isSMTP();

      /* 
         Setting the SMTPAuth property to true, so we can use 
         our Gmail login details to send the mail.
      */
      $mail->SMTPAuth = true;

      /*  
         Setting the Host property to the MAILHOST value 
         that we define in the config file.
      */
      $mail->Host = MailConfig::$MAILHOST;

      /*  Setting the Username property to the USERNAME value 
         that we define in the config file.
      */
      $mail->Username = MailConfig::$USERNAME;

      /*
         Setting the Password property to the PASSWORD value 
         that we define in the config file.
      */
      $mail->Password = MailConfig::$PASSWORD;

      /*
         By setting SMTPSecure to PHPMailer::ENCRYPTION_STARTTLS, 
         we are telling PHPMailer to use the STARTTLS encryption 
         method when connecting to the SMTP server. 
         This helps ensure that the communication between your 
         PHP application and the SMTP server is encrypted, adding a 
         layer of security to your email sending process.
      */
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

      // TCP port to connect with the Gmail SMTP server.
      $mail->Port = 587;

      /*
         Who is sending the email. Again we use the constants 
         that we define in the config file.
       */
      $mail->setFrom(MailConfig::$SEND_FROM, MailConfig::$SEND_FROM_NAME);

      /*
         Where the mail goes. We use the $email function's 
         parameter that holds the email address that we type 
         in the email input field. 
       */
      $mail->addAddress($this->data['email']);

      /*
         The 'addReplyTo' property specifies where the 
         recipient can reply to.
         Again we use the constants from the config file.
       */
      $mail->addReplyTo(MailConfig::$REPLY_TO);

      /*
         By setting $mail->IsHTML(true), we inform PHPMailer that 
         the email message we're constructing will include 
         HTML markup. 
         This is important when we want to send emails with 
         HTML formatting, which allow us to include things like 
         hyperlinks, images, formatting, 
         and other HTML elements in our email content.
       */
      $mail->IsHTML(true);

      /*
         Assigning the incoming subject to the 
         $mail->subject property. 	
       */
      $mail->Subject = "UCSPyay Student Admission Confirmation";

      /*
         Assigning the incoming message to the $mail->body property.
       */
      if ($data['year'] == 1) {
         $mail->Body = "
      <div style='color:#000;'>
          <h2 style='color: #4CAF50;'>Congratulations!</h2>
          <p>
              <strong>{$data['name']}</strong>၏ ကျောင်းဝင်ခ္ငင့်လျှောက်လွှာအား ကွန်ပျူတာတက္ကသိုလ်(ပြည်) ၊ ကျောင်းသားရေးရာမှ လက်ခံရရှိ၍ အတည်ပြုပြီးဖြစ်ပါသည်။<br>
              အောက်ဖော်ပြပါ <strong>Edu mail</strong> နှင့် <strong>Password</strong> အားအသုံးပြု၍ UCSPyay Student Portal သို့ဝင်ရောက်အသုံးပြုနိုင်ပါသည်။
          </p>
          <ul style='list-style-type: none; padding: 0;'>
              <li style='margin-bottom: 10px;'>
                  <strong>Edu mail:</strong> <span style='background-color: #f1f1f1; padding: 5px 10px; border-radius: 4px;'>{$data['edu_mail']}</span>
              </li>
              <li>
                  <strong>Password:</strong> <span style='background-color: #f1f1f1; padding: 5px 10px; border-radius: 4px;'>{$data['password']}</span>
              </li>
          </ul>
          <div style='margin-top: 20px;'>
              <a href='http://student.ucspyay.edu' 
                 style='display: inline-block; padding: 10px 20px; background-color: #4CAF50; color: #fff; text-decoration: none; border-radius: 4px;'>
                 Login Here
              </a>
          </div>
           <p>
            ပထမဆုံးအကြိမ် Login ဝင်ရောက်ပြီး Password အသစ်အား ပြောင်းလဲအသုံးပြုရန်အကြံပြုအပ်ပါသည်။
        </p>
        <p>
            မေးခွန်းများ ရှိပါက သို့မဟုတ် အကူအညီလိုအပ်ပါက admin@ucspyay.edu.mm သို့မဟုတ် 053-28639 သို့ဆက်သွယ်နိုင်ပါသည်။
        </p>
        <p>
            Best regards,<br>
            Admin Team,<br>
            Student Affairs,<br>
            University of Computer Studies, Pyay<br>
            http://ucspyay.edu
      </p>
      </div>";
      } else {
         $yearName = "";
         switch ($data['year']) {
            case 2:
               $yearName = "ဒုတိယနှစ်";
               break;
            case 3:
               $yearName = "တတိယနှစ်";
               break;
            case 4:
               $yearName = "စတုတ္ထနှစ်";
               break;
            case 5:
               $yearName = "ပဥ္စမနှစ်";
               break;
            default:
               $yearName = "";
               break;
         }

         $mail->Body = "
      <div style='color:#000;'>
         <p>
            <strong>{$data['name']}</strong>၏ {$yearName} ကျောင်းဝင်ခ္ငင့်လျှောက်လွှာအား ကွန်ပျူတာတက္ကသိုလ်(ပြည်) ၊ ကျောင်းသားရေးရာမှ လက်ခံရရှိ၍ အတည်ပြုပြီးဖြစ်ပါသည်။<br>
         </p>
         <div style='margin-top: 20px;'>
            <a href='http://student.ucspyay.edu' 
               style='display: inline-block; padding: 10px 20px; background-color: #4CAF50; color: #fff; text-decoration: none; border-radius: 4px;'>
               Login Here
            </a>
         </div>
      <p>
         မေးခွန်းများ ရှိပါက သို့မဟုတ် အကူအညီလိုအပ်ပါက admin@ucspyay.edu.mm သို့မဟုတ် 053-28639 သို့ဆက်သွယ်နိုင်ပါသည်။
      </p>
      <p>
            Best regards,<br>
            Admin Team,<br>
            Student Affairs,<br>
            University of Computer Studies, Pyay<br>
            http://ucspyay.edu
      </p>
      </div>";
      }

      /*
         When we set $mail->AltBody, we are providing 
         a plain text alternative to the HTML version of our email. 
         This is important for compatibility with email clients 
         that may not support or display HTML content. 
         In such cases, the email client will display 
         the plain text content instead of the HTML content.
       */
      // $mail->AltBody = "<button><a href='admin.ucsp.edu'>Go to dashboard</a></button>";

      /*
         And last we send the email.
         If something goes wrong the function will return an error,
         else the function returns the string success.
         We are going to catch the returned value in the index file,
         and display it in the HTML form.
       */
      if (!$mail->send()) {
         return "Email not sent. Please try again";
      } else {
         return "success";
      }
   }
}
