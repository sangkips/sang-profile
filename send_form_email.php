<?php
if (isset($_POST[email])) {
  email_to="sangkips19@gmail.com"
  email_subject="Your email subject"

  function died($error) {
    echo "please correct the errors that occured";
    die()
  }
  if (!isset($_POST['fullname']) ||
      !isset($_POST['email']) ||
      !isset($_POST['telephone']) ||
      isset($_POST['comments'])) {
        died("We are sorry please correct the errors occured");
      }

  $fullname = $_POST['fullname'];
  $email_from = $_POST['email'];
  $telephone = $_POST['telephone'];
  $comments = $_POST['comments'];

  $error_message = ""
  $error_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$fullname)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }


  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }

  if(strlen($error_message) > 0) {
    died($error_message);
  }

    $email_message = "Form details below.\n\n";


    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }



    $email_message .= "Full Name: ".clean_string($first_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";

// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
?>

Thank you for contacting us. We will be in touch with you very soon.

<?php
}

 ?>
