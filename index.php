<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en" ng-app="App">
<!--<![endif]-->
<!-- HEAD SECTION -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="We are believers in the Lord Jesus Christ who have personally received Him as our Savior. He is the most excellent and enjoyable Person. We love Him and endeavor to give Him the first place in all things. We rejoice to be cleansed by the blood of Jesus, God’s Son, born again of the Father’s divine life, and filled with the Holy Spirit. We highly treasure the Holy Bible as God’s revelation of Himself and of His eternal purpose. We hold the common faith which is revealed in the Bible and is common to all genuine believers. As is true of all believers in Christ, we are members of His one Body, the church. In order to practice the oneness of the Body with all the Christians in Ann Arbor, we meet as the church in Ann Arbor. We are in fellowship with over 2,000 local churches worldwide to express the one Body of Christ.">
    <meta name="author" content="">
    <meta name="keywords" content="Church,Ann Arbor,Christian,Bible,Michigan,Jesus,Christ,God">
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>The Church in Ann Arbor</title>
    <!--GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!--BOOTSTRAP MAIN STYLES -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!--FONTAWESOME MAIN STYLE -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!--SLIDER CSS CLASES -->
    <link href="assets/Slides-SlidesJS-3/examples/playing/css/slider.css" rel="stylesheet" />
    <!--CUSTOM STYLE -->
    <link href="assets/css/style.css" rel="stylesheet" />
    
    <!--    include js files-->
    <script src="assets/js/parseDev.js"></script>
    <script src="bower_components/angular/angular.min.js"></script>
<!--    <script src="bower_components/angular-parse-wrapper/dist/angular-parse-wrapper.min.js"></script>-->
    <script src="bower_components/angular-parse-wrapper/src/parse-wrapper.js"></script>
    <script src="bower_components/lodash/dist/lodash.js"></script>
    <script src="bower_components/momentjs/moment.js"></script>
    <script src="app.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<!--END HEAD SECTION -->
<body ng-controller="AppController as app">
    <!-- NAV SECTION -->
    <?php
        $fileName = basename (__FILE__);
        include('nav.php');
    ?>
    <!--END NAV SECTION -->
    <!-- HOME SECTION -->

    <!-- SLIDER SECTION -->
    <div id="slides">
        <img src="assets/img/imgs/carousel/photo1.png" alt="" />
        <img src="assets/img/imgs/carousel/photo2.png" alt="" />
        <img src="assets/img/imgs/carousel/photo3.png" alt="" />
        <img src="assets/img/imgs/carousel/photo4.png" alt="" />
        <img src="assets/img/imgs/carousel/photo5.png" alt="" />
        <img src="assets/img/imgs/carousel/photo6.png" alt="" />

    </div>
    <!-- END SLIDER SECTION -->

    <div class="container">
        <div class="row main-low-margin text-justify">
            <div class="col-md-4 col-sm-4">
<!--                 <div class="circle-body"><i class="fa fa-camera fa-5x  icon-set"></i></div> -->
                <h3 ng-if="app.HWMR.current" class="text-center">THIS WEEK'S READING</h3>
                <p ng-if="app.HWMR.current" class="italic">
                    The Holy Word for Morning Revival:<br>
                    {{app.HWMR.current.bookTitle}} <strong>Week {{app.HWMR.current.week}}</strong><br>
                    "{{app.HWMR.current.messageTitle}}"
                </p>

                <h3 ng-if="app.events.all.length > 0" class="text-center">EVENTS & CONFERENCES</h3>
                <p ng-if="app.events.all.length > 0">
                    <ul class="no-bullets" style="overflow:auto;max-height:350px">
                        <li ng-repeat="event in app.events.all" style="padding-bottom:15px">
                            <a href="https://docs.google.com/forms/d/1lOyOEyc1NDcpC7Zg8T2uIAs4uqwuhbL5Nvs4RKqqtaE/viewform?usp=send_form" 
                            target="_blank"class="large-links">{{event.title}}</a>
                            <br>{{event.dates}}
                            <br ng-if="event.address">{{event.address}}
                            <br ng-if="event.city">{{event.city}}
                           <br ng-if="event.note">{{event.note ? event.note : ''}}
                        </li>
                    </ul>
                    <a href="meetings.php"><button type="submit" class="btn btn-primary">See more</button></a>
                </p>


            </div>
            <div class="col-md-4 col-sm-4">
<!--                 <div class="circle-body"><i class="fa fa-dollar fa-5x  icon-set"></i></div> -->
                <h3 class="text-center">WHO WE ARE</h3>
                <p>
                    We are believers in the Lord Jesus Christ who have personally received Him as our Savior. 
                    He is the most excellent and enjoyable Person. We love Him and endeavor to give Him the 
                    first place in all things. We rejoice to be cleansed by the blood of Jesus, God’s Son, 
                    born again of the Father’s divine life, and filled with the Holy Spirit.
                </p>
                <p>
                    We highly treasure the Holy Bible as God’s revelation of Himself and of His eternal purpose. 
                    We hold the common faith which is revealed in the Bible and is common to all genuine believers.
                </p>
                <p>
                    As is true of all believers in Christ, we are members of His one Body, the church. 
                    In order to practice the oneness of the Body with all the Christians in Ann Arbor, 
                    we meet as the church in Ann Arbor. We are in fellowship with over 2,000 local churches 
                    worldwide to express the one Body of Christ. 
                </p>
            </div>
            <div class="col-md-4 col-sm-4">
<!--                 <div class="circle-body"><i class="fa fa-envelope fa-5x  icon-set"></i></div> -->
                <h3 class="text-center">WHAT WE BELIEVE</h3>
                <p>
                    We hold the faith which is common to all believers (Titus 1:4; Jude 3).
                    Our faith is composed of the following beliefs concerning the Bible, God, Christ, 
                    the work of Christ, salvation, and the church...
                </p>
                <a href="beliefs.php"><button type="submit" class="btn btn-primary">Read more</button></a>

                <h3 class="text-center">LINKS & RESOURCES</h3>
                <p>
                    <ul class="no-bullets">
                        <li><a class="large-links" href="www.biblesforamerica.org">Bibles for America (BfA)</a>
                                <br>Free New Testament Bible and Christian Books</li>
                                <br>
                        <li><a class="large-links" href="www.readhisword.com">ReadHisWord.com</a>
                                <br>A Bible Reading Scheduler</li>
                                <br>
                        <li><a class="large-links" href="www.ministrybooks.org">MinistryBooks.org</a>
                                <br>Online Publications from Living Stream Ministry</li>
                                <br>
                        <li><a class="large-links" href="www.hymnsradio.com">Hymns Radio</a>
                                <br>Online radio station streaming high quality Christian hymns</li>
                                <br>
                        <li><a class="large-links" href="www.hymnal.net">Hymnal.net</a>
                                <br>Online collection of over 2000 hymns with lyrics, music sheets, and mp3 tunes for learning.</li>
                    </ul>
                </p>
            </div>

        </div>

    </div>
    <div class="space-bottom"></div>
    <!--END HOME SECTION -->

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
    <!-- SLIDER SCRIPTS LIBRARY -->
    <script src="assets/Slides-SlidesJS-3/examples/playing/js/jquery.slides.min.js"></script>
    <!-- CUSTOM SCRIPT-->
    <script>
        $(document).ready(function () {
            $('#slides').slidesjs({
                width: 940,
                height: 528,
                play: {
                    active: true,
                    auto: true,
                    interval: 4000,
                    swap: true
                }
            });
        });

    </script>

</body>
</html>
