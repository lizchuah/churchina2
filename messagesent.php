<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<!-- HEAD SECTION -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Contact Us - The Church in Ann Arbor</title>
    <!--GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!--BOOTSTRAP MAIN STYLES -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!--FONTAWESOME MAIN STYLE -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!--CUSTOM STYLE -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<!--END HEAD SECTION -->

<body>
    <!-- NAV SECTION -->
    <?php
        require_once __DIR__ . '/Email.php';
        $fileName = basename (__FILE__);
        include('nav.php');
    ?>
    <!--END NAV SECTION -->
    <!-- CONTACT SECTION -->
    <div class="section">
        <div class="container">


            <div class="row main-low-margin">
                <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
                    <?php
                    //save csv as backup to server
                    $filename = "SaveInfo.csv";
                    $isItExisting = (file_exists($filename));

                    $handle = fopen($filename, 'a');
                    $msg = "<p>Thank you for your message, " . $_POST['name'] . "!</p><span>Here is a copy of your submission:<br><ul style='list-style-type: none; padding-left: 0; margin-left: 2em;'>";
                    $stringToAdd="";
                    echo "<h1>Thank you! We will get back to you soon!</h1>";

                    if (!$isItExisting){
                        foreach($_POST as $name => $value) {
                            $stringToAdd .="$name,";
                        }
                        $stringToAdd .="timestamp,\n";
                        fwrite($handle, $stringToAdd);
                    }

                    $stringToAdd="";
                    
                    foreach($_POST as $name => $value) {
                        $capitalName = ucfirst($name);
                        print "$capitalName: $value<br>";
                        $msg .="<li>$capitalName: $value</li>";
                        $stringToAdd .="$value,";
                    }
                    date_default_timezone_set('America/New_York');
                    $dateString = date("Y-m-d H:i:s", time());
                    $stringToAdd .="$dateString,\n";

                    $msg .='</ul></span>';

                    fwrite($handle, $stringToAdd);
                    fclose($handle);
                    
                    //admins at Church in Ann Arbor who will receive email
                    $admins = array(
                        array('email'=>'thechurchinannarbor@gmail.com'),
                        array('email'=>'floydmcnutt@yahoo.com'),
                        array('email'=>'chingshihy@gmail.com'),
                        array('email'=>'calvinps@umich.edu'),
                        array('email'=>'lizchuah2@gmail.com'),
                    );
                    $senderName = $_POST['name'];
                    $senderEmail = $_POST['email'];
                    
                    $subject = "Message submission from " . $senderName;
                    $body = $senderName . " sent a message through www.churchinannarbor.org and received a copy of the email below.<br><br>"
                         . $msg;
//                    send($html,$subject,$fromEmail,$fromName,$toArray)
                    //Send email to Church in Ann Arbor admin
                    Email::send($body,$subject,$senderEmail,$senderName,$admins);
                    
                    //Send confirmation email to sender
                    $confirmationSubject = 'Thank you for your message';
                    Email::send($msg,$confirmationSubject,'thechurchinannarbor@gmail.com','The Local Church in Ann Arbor',array(array('email'=>$senderEmail)));
                ?>
                </div>
            </div>


        </div>
    </div>

    <div class="space-bottom"></div>
    <!--END CONTACT SECTION -->

    <!--FOOTER SECTION -->
    <?php
        include('footer.php');
    ?>
    <!--END FOOTER SECTION -->

</body>
</html>