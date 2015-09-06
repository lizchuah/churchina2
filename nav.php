    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">
                    <img src="assets/img/imgs/churchina22-white.png" alt="the church in Ann Arbor" />
                </a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php"
                        <?php
                        if ($fileName == "index.php"){
                            echo "class= \"current\"";
                        }
                        ?>
                        >HOME</a></li>
                    <li><a href="beliefs.php"
                        <?php
                        if ($fileName == "beliefs.php"){
                            echo "class= \"current\"";
                        }
                        ?>
                        >OUR BELIEFS</a></li>
                    <li><a href="meetings.php"
                        <?php
                        if ($fileName == "meetings.php"){
                            echo "class= \"current\"";
                        }
                        ?>
                        >MEETINGS & EVENTS</a></li>
                    <li><a href="testimonies.php" class="not-active"
                        <?php
                        if ($fileName == "testimonies.php"){
                            echo "class= \"current\"";
                        }
                        ?>
                        >TESTIMONIES</a></li>
                    <li><a href="contact.php"
                        <?php
                        if ($fileName == "contact.php"){
                            echo "class= \"current\"";
                        }
                        ?>
                        >CONTACT</a></li>
                </ul>
            </div>
        </div>
    </div>