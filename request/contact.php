<!doctype html>
<html lang="en">

<head>
  <title>Claire Pet Sits</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/main.css" type="text/css" />
</head>

<body>


  <div class="container">
    <div class="row">
      <div class="col-12">
        <a href="/" class="noshadow">
            <img class="shadowed img-fluid" src="/images/logo.png" alt="logo" height="209" width="1186" />
          </a>
      </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color:#087c90">
      <a class="navbar-brand noshadow">
      <img class="shadow" src="/images/paw3232white.png" alt="paw" height="32" width="32" />
    </a>
      <button class="navbar-toggler" type="button"   data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="/">Home</a>
          <a class="nav-item nav-link" href="/links">Links</a>
          <!--
          <a class="nav-item nav-link" href="/pictures">Pictures</a>
          -->
          <a class="nav-item nav-link" href="/FAQ">FAQ</a>
          <a class="nav-item nav-link active" href="/request">Request<span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="/contact">Contact</a>
        </div>
      </div>
    </nav>
    <div class="alert alert-success" role="alert">
    Thanks for reaching out to me, I'll get back to you as soon as possible!
    </div>


  <?php
  /*
   *  CONFIGURE EVERYTHING HERE
   */

  // an email address that will be in the From field of the email.
  $from = 'clairegodfrey@clairepetsits.com';

  // an email address that will receive the email with the output of the form
  $sendTo = 'godfreyclaire13@gmail.com';

  // subject of the email
  $subject = 'New message from contact form';

  // form field names and their translations.
  // array variable name => Text to appear   in the email
  $fields = array('name' => 'Name', 'surname' => 'Surname', 'days' => 'Days', 'email' => 'Email', 'dogs' => 'Dogs', 'cats' => 'Cats', 'others' => 'Others', 'startdate' => 'startdate', 'enddate' => 'enddate', 'message' => 'Message');

  // message that will be displayed when everything is OK :)
  $okMessage = '';

  // If something goes wrong, we will display this message.
  $errorMessage = '';

  /*
   *  LET'S DO THE SENDING
   */

  // if you are not debugging and don't need error reporting, turn this off by error_reporting(0);
  error_reporting(0);

  try
  {

      if(count($_POST) == 0) throw new \Exception('Form is empty');

      $emailText = "You have a new message from your contact form\n=============================\n";

      foreach ($_POST as $key => $value) {
          // If the field exists in the $fields array, include it in the email
          if (isset($fields[$key])) {
              $emailText .= "$fields[$key]: $value\n";
          }
      }

      // All the neccessary headers for the email.
      $headers = array('Content-Type: text/plain; charset="UTF-8";',
          'From: ' . $from,
          'Reply-To: ' . $from,
          'Return-Path: ' . $from,
      );

      // Send email
      mail($sendTo, $subject, $emailText, implode("\n", $headers));

      $responseArray = array('type' => 'success', 'message' => $okMessage);
  }
  catch (\Exception $e)
  {
      $responseArray = array('type' => 'danger', 'message' => $errorMessage);
  }


  // if requested by AJAX request return JSON response
  if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
      $encoded = json_encode($responseArray);

      header('Content-Type: application/json');

      echo $encoded;
  }
  // else just display the message
  else {
      echo $responseArray['message'];
  }
?>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  <script src="/wdv205/portfolio/js/shards.min.js"></script>

</body>
</html>
