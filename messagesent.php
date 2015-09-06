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
                    $filename = "SaveInfo.csv";
                    $isItExisting = (file_exists($filename));

                    $handle = fopen($filename, 'a');
                    $msg = "Thank you for your message, " . $_POST['name'] . "!\n\nHere is a copy of your submission:\n";
                    $stringToAdd="";
                    echo "<h1>Thank you! We will get back to you soon!</h1>";

                    if (!$isItExisting){
                        foreach($_POST as $name => $value) {
                            $stringToAdd.="$name,";
                        }
                        $stringToAdd.="\n";
                        fwrite($handle, $stringToAdd);
                    }

                    $stringToAdd="";
                    
                    foreach($_POST as $name => $value) {
                        print "$name: $value<br/>";
                        $msg .="$name: $value\n";
                        $stringToAdd.="$value,";
                    }
                    $stringToAdd.="\n";

                    fwrite($handle, $stringToAdd);

                    fclose($handle);
                    $to = 'lizchuah2@gmail.com';
                    $fromsender = $_POST['name'];
                    $fromemail = $_POST['email'];
                    $headers = "From: " . $fromsender . " <" . $fromemail . ">\r\n";
                    $headers2 = "From: The Church in Ann Arbor <lizchuah2@gmail.com>\r\n";
                    $subject = "Message submission from " . $fromsender;
                    

                    mail($to, $subject, $fromsender . " sent a message through your website and received a copy of the email below.\n\n"
                         . $msg, $headers);
                    mail($fromemail, 'Thank you for your message' . "\n", 
                        $msg, $headers2);
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