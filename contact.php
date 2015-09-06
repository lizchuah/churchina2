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
                    <h1>Contact Us</h1>
                    <h5>We warmly welcome you to the church in Ann Arbor. We are believers in 
                        Jesus Christ from all backgrounds who gather locally to be the Lord's testimony 
                        in Ann Arbor. Listed below are some frequently asked questions. Feel free to 
                        contact us if your question was not answered or for more information.
                    </h5>
                </div>
            </div>


        </div>
    </div>

    <div class="container">
        <div class="row main-low-margin text-center">
            <div class="col-md-5 col-sm-5">
                <div class="circle-body"><i class="fa fa-commenting-o fa-5x icon-set"></i></div>
                <h3>CONTACT DETAILS</h3>
                    <p>
                        thechurchinannarbor@gmail.com<br>
                        Floyd McNutt (734) 276-6774<br>
                    </p>
            </div>

            <div class="col-md-7 col-sm-7">
                <h3>ASK A QUESTION</h3>
                <hr>
                <form role="form" action="messagesent.php" method="POST">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <fieldset>
                            <legend class="invisible">Send us a message:</legend>
                            <div class="form-group">
                                <label for="name" class="invisible">Name</label>
                                <input type="text" class="form-control"  id="name" name="name" placeholder="Full name*" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label for="email" class="invisible">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email address*" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="message" class="invisible">Message</label>
                                <textarea class="form-control" rows="7" id="message" name="message" placeholder="Message*" required></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Send Message</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h3>Frequently Asked Questions</h3>
                <hr>
                <div class="col-md-6 col-sm-6 text-justify">
                    <h4>I'm looking for fellowship, but I'm not ready to attend a Sunday meeting yet. 
                        Can someone visit or call me?
                    </h4>
                    <p>
                        Definitely! Attending a Sunday meeting is not the only way to have fellowship with us. 
                        If you leave us a message with your contact details, we will be sure to get in touch with you 
                        however you are most comfortable.
                    </p>

                    <h4>Are there facilities for nursery, children, and teenagers?
                    </h4>
                    <p>
                        Yes. Ministering to families, including nursery, children, and teenagers, is an 
                        important part of our responsibility and stewardship. We typically have age-appropriate 
                        classes every Sunday.
                    </p>

                    <h4>What should I expect when I come to a meeting?
                    </h4>
                    <p>
                        You should expect a warm welcome and to meet some joyful Christians. We love to sing 
                        with our heart to the Lord and to speak to one another in psalms and hymns (Eph. 5:19). 
                        Our gathering are characterized by mutuality, encouraging praise, prayer, and speaking 
                        from one another (1 Cor. 14:26). Our meetings are frequently punctuated by "Hallelujah!", 
                        "Amen!", "Oh Lord Jesus!", and other joyful noises to the Lord (Psa. 100:1; 1 Thes. 5:16; Phil. 2:11).
                    </p>
                    <p>
                        If the worship you are familiar with is more meditative, you will also feel comfortable 
                        meeting with us. We are not for any particular outward form, practice, or liturgy. Our only goal 
                        is to worship the Lord in spirit and truthfulness (John 4:24).
                    </p>

                    <h4>Who is your pastor?
                    </h4>
                    <p>
                        God's intention is that all His believers would serve Him as priests (1 Pet. 2:5). 
                        All Christians have the innate capacity to contact God, worship God, be filled with God, 
                        pray to God, speak for God, and represent God (Acts 1:8; 1 Cor. 14:31; 1 Pet. 2:9; Rom. 1:9).
                    </p>
                    <p>
                        Of course, the ascended Christ has given gifts, including apostles, prophets, evangelists, and 
                        shepherds and teachers (Eph. 4:11) to the Body, which we treasure. There are many who serve as 
                        shepherds and teachers among us, including the elders of the church, along with other who have 
                        spiritual gifts of shepherding and teaching (1 Pet. 5:1-3; Acts 20:28).
                    </p>

                    <h4>What kind of Bible do you use?
                    </h4>
                    <p>
                        Probably the personal Bible collections of our church members are as diverse and expansive as 
                        any other congregation. But when we gather together for larger meetings we frequently find it 
                        useful to use the same text: the Recovery Version. The Recovery Version of The New Testament is 
                        based on the Nestle-Aland Greek text as found in Novum Testamentum Graece (26th edition) and is 
                        part of the great heritage of Bible translations through church history (including but not limited 
                        to KJV, ASV, NASB, and many other translations). To receive a free copy of the Recovery Version of 
                        The New Testament, or to learn more about it, please visit <a href="http://biblesforamerica.org/">Bibles for America</a>.
                    </p>
                </div>

                <div class="col-md-6 col-sm-6 text-justify">
                    <h4>What denomination are you?
                    </h4>
                    <p>
                        We are not part of any denomination. We follow the New Testament pattern which shows Christ’s 
                        believers who congregate only on the basis of the locality in which they live (Acts 8:1; 
                        13:1; Rom. 16:1; 1 Cor. 1:2). Because we live in Ann Arbor, we meet simply as the church in 
                        Ann Arbor. As the church in Ann Arbor, we receive all of the believers in Ann Arbor as Christ 
                        has also received us (Rom. 15:7).
                    </p>

                    <h4>What is your relationship with other local churches?
                    </h4>
                    <p>
                        We have a rich fellowship with thousands of other local churches throughout the world to 
                        express the one Body of Christ. Members in the church frequently travel to visit other 
                        churches both locally and internationally. There are frequent regional, national, and 
                        international conferences and trainings throughout the year where we see more of the “breadth, 
                        length, height, and depth” of the Body of Christ (Eph. 3:18). To find out if there is a locality 
                        in the city you are visiting, please visit <a href="http://www.localchurches.org/">localchurches.org</a>.
                    </p>

                    <h4>What is your relationship with Witness Lee and Watchman Nee?
                    </h4>
                    <p>
                        Witness Lee and Watchman Nee are two of the most influential Christian ministers of the 
                        20th century and the church in Ann Arbor has been a beneficiary of their ministry since our 
                        inception in 1989. They both stress the same general theme of the Christian’s experience of Christ 
                        as life for the building up of the Body of Christ in many practical ways.
                    </p>
                    <p>
                        Watchman Nee’s (1903-1972) writings have been appreciated by Christians around the world and 
                        translated into many languages. His book The Normal Christian Life has been widely hailed as 
                        a Christian classic. He has been included along with such influential Christians as John Wycliffe, 
                        William Tyndale, Martin Luther, John Bunyan, John Wesley, George Whitefield, Charles Spurgeon, D.L. Moody, 
                        and Hudson Taylor in collections such as Barbour Publishing’s <a href="http://www.christianbook.com/heroes-of-faith-37-volumes/pd/4744">
                        Heroes of the Faith series</a>. In 2009, Watchman Nee’s contribution to the church in China and his 
                        influence on Christians in the West was recognized in <a href="http://www.contendingforthefaith.org/miscdocs/Watchman%20Nee-Congressional%20Record.pdf">
                        a Congressional statement</a> on the floor of the United States House of Representatives.
                    </p>
                    <p>
                        Witness Lee (1905-1997) was a prolific speaker and writer whose ministry produced and served over three 
                        thousand local churches worldwide. His monumental work, the Life-study of the Bible, comprises over 
                        25,000 pages of commentary on every book of the Bible from the perspective of the believers’ enjoyment 
                        and experience of God’s divine life. These messages continue to be <a href="http://www.lsmradio.com/index.html">
                        broadcast</a> in multiple languages worldwide across the radio and Internet.
                    </p>
                    <p>
                        <a href="http://www.lsm.org/">Living Stream Ministry</a> publishes the collected works of these two servants 
                        of the Lord Jesus Christ and makes the complete texts of many of their publications freely available 
                        <a href="http://www.ministrybooks.org/index.cfm">here</a>.
                    </p>
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

    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY LIBRARY -->
    <script src="assets/js/jquery.js"></script>
    <!-- CORE BOOTSTRAP LIBRARY -->
    <script src="assets/js/bootstrap.min.js"></script>

</body>
</html>
