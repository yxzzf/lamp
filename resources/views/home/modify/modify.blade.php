<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <title>Alissa - Responsive Coming Soon Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster">
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Lato:400,700'>
        <link rel="stylesheet" href="/weihu/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/weihu/assets/css/style.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="/weihu/assets/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/weihu/assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/weihu/assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/weihu/assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="/weihu/assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Header -->
        <div class="container">
            <div class="header row">
                <div class="logo span4">
                    <h1><a href="">男神</a> <span>.</span></h1>
                </div>
                <div class="call-us span8">
                    <p>电话: <span>152 6125 6948</span> | 邮箱: <span>xiaomanyao@163.com</span></p>
                </div>
            </div>
        </div>

        <!-- Coming Soon -->
        <div class="coming-soon">
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            <h2>我们很快就要来了</h2>
                            <p>我们正在努力开发新版本的网站。它将带来许多新功能。敬请关注！</p>
                            <div class="timer">
                                <div class="days-wrapper">
                                    <span class="days"></span> <br>天
                                </div>
                                <div class="hours-wrapper">
                                    <span class="hours"></span> <br>小时
                                </div>
                                <div class="minutes-wrapper">
                                    <span class="minutes"></span> <br>分钟
                                </div>
                                <div class="seconds-wrapper">
                                    <span class="seconds"></span> <br>秒
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="container">
            <div class="row">
                <div class="span12 subscribe">
                    <h3>留下您的邮箱</h3>
                    <p> 您将成为第一个知道该网站何时准备就绪的人之一 </p>
                    <form class="form-inline" action="assets/sendmail.php" method="post">
                        <input type="text" name="email" placeholder="您的邮箱...">
                        <button type="submit" class="btn">确定</button>
                    </form>
                    <div class="success-message"></div>
                    <div class="error-message"></div>
                </div>
            </div>
            <div class="row">
                <div class="span12 social">
                    <a href="" class="facebook" rel="tooltip" data-placement="top" data-original-title="Facebook"></a>
                    <a href="" class="twitter" rel="tooltip" data-placement="top" data-original-title="Twitter"></a>
                    <a href="" class="dribbble" rel="tooltip" data-placement="top" data-original-title="Dribbble"></a>
                    <a href="" class="googleplus" rel="tooltip" data-placement="top" data-original-title="Google Plus"></a>
                    <a href="" class="pinterest" rel="tooltip" data-placement="top" data-original-title="Pinterest"></a>
                    <a href="" class="flickr" rel="tooltip" data-placement="top" data-original-title="Flickr"></a>
                </div>
            </div>
        </div>
        <!-- Javascript -->
        <script src="/weihu/assets/js/jquery-1.8.2.min.js"></script>
        <script src="/weihu/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="/weihu/assets/js/jquery.backstretch.min.js"></script>
        <script src="/weihu/assets/js/jquery.countdown.js"></script>
        <script src="/weihu/assets/js/scripts.js"></script>
		<script type="text/javascript">
			
jQuery(document).ready(function() {

    /*
        Background slideshow
    */
    $('.coming-soon').backstretch([
      "/weihu/assets/img/backgrounds/1.jpg"
    , "/weihu/assets/img/backgrounds/2.jpg"
    , "/weihu/assets/img/backgrounds/3.jpg"
    ], {duration: 3000, fade: 750});

    /*
        Countdown initializer
    */
    var now = new Date();
    var countTo = 25 * 0.02 * 60 * 60 * 1000 + now.valueOf();
    $('.timer').countdown(countTo, function(event) {
        var $this = $(this);
        switch(event.type) {
            case "seconds":
            case "minutes":
            case "hours":
            case "days":
            case "weeks":
            case "daysLeft":
                $this.find('span.'+event.type).html(event.value);
                break;
            case "finished":
                $this.hide();
                break;
        }
    });

    /*
        Tooltips
    */
    $('.social a.facebook').tooltip();
    $('.social a.twitter').tooltip();
    $('.social a.dribbble').tooltip();
    $('.social a.googleplus').tooltip();
    $('.social a.pinterest').tooltip();
    $('.social a.flickr').tooltip();

    /*
        Subscription form
    */
    $('.success-message').hide();
    $('.error-message').hide();

    $('.subscribe form').submit(function() {
        var postdata = $('.subscribe form').serialize();
        $.ajax({
            type: 'POST',
            url: 'assets/sendmail.php',
            data: postdata,
            dataType: 'json',
            success: function(json) {
                if(json.valid == 0) {
                    $('.success-message').hide();
                    $('.error-message').hide();
                    $('.error-message').html(json.message);
                    $('.error-message').fadeIn();
                }
                else {
                    $('.error-message').hide();
                    $('.success-message').hide();
                    $('.subscribe form').hide();
                    $('.success-message').html(json.message);
                    $('.success-message').fadeIn();
                }
            }
        });
        return false;
    });

});



		</script>
    </body>

</html>

