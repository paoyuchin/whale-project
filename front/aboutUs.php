<?php 
	session_start();
	ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- reset -->
    <link rel="stylesheet" href="css/reset.css">
    <!-- jquery -->
    <!-- custom -->
    <link rel="stylesheet" href="css/aboutUs.css">
    <!-- common -->
    <link rel="stylesheet" type="text/css" href="../common/css/menu.css">
    <!-- plugins -->
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css">
    <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
    <link rel="stylesheet" href="css/plugin/animate.min.css">
    <link rel="stylesheet" href="css/plugin/animate.min.css">



<script type='text/javascript' src="../common/js/jquery-3.3.1.min.js"></script>
<script src="js/plugin/wow.min.js"></script>
<script src="js/plugin/ScrollMagic.min.js"></script>
<script src="js/plugin/vivus.js"></script>
<script src="js/plugin/jquery.lazylinepainter-1.7.0.min.js"></script>
<script type='text/javascript'src="js/plugin/snap.svg-min.js"></script>
<script src="js/plugin/debug.addIndicators.min.js"></script>
    <title>關於我們</title>
</head>

<body>
    <?php  require_once "../common/menu.php" ?>

    <div class="wrapper">
        <div class="testvideo">
            <video src="images/aboutus-img/videoplayback.mp4" autoplay muted></video>
        </div>
        <div class="bg-img"></div>
        <div class="aboutus-opening">
            <div class="aboutus-video">
                <h3 class="aboutus-slogen">if Whale die, We die
                </h3>
                <h2 class="aboutus-name">關於鯨生鯨世</h2>

                <img class="aboutus-opening-diverimg-1" src="images/aboutus-img/diver-shape3.svg" alt="diver">

                <img class="aboutus-opening-diverimg-2" src="images/aboutus-img/diver-shape4.svg" alt="diver-1">
            </div>
        </div>
        <!-- about us -->
        <div class="aboutus clearfix">
            <div class="aboutus-container">
                <div class="aboutus-text-father">
                    <h2 class="aboutus-title">「守護鯨魚，擁抱海洋」</h2>
                    <p class="aboutus-content-2">鯨魚是深受人們喜愛的物種，也是大朋友小朋友最喜歡的海洋生物之一。不過大家可能還不知道的是，鯨魚正面對瀕臨絕種的危機</p>                    
                    <p class="aboutus-content-1 wow  bounceInLeft data-wow-delay="5s" ">2005年6月，由三位中央大學學生，
                        首先推動護鯨出海活動，成立護鯨小組，主要目的是集結社會上關心鯨魚的人士共同加強國內鯨魚的保育行動。在三年的努力當中，隨著支持者的增加與政府機關的贊助，
                        2008年7月，在中華民國自然生態保育協會與各大專院校海洋生態的教授支持下，正式成立鯨生鯨世護鯨組織</p>
                </div>
                <div class="aboutus-right-pic">
                    <img src="images/aboutus-img/savingwhale.jpg" alt="savepic">
                </div>
            </div>
        </div>
        <!-- our-method -->
        <div class="aboutus-method">
            <div class="aboutus-method-bg">
                <img src="images/aboutus-img/gola.jpg" alt="">
            </div>

            <div class="aboutus-method-contentFather">

                <h2 class="aboutus-method-title">我們的方法</h2>
                <p class="aboutus-method-content">鯨魚不會自己出聲，我們自己來!
                    為了替海洋的守護者-鯨魚出聲, 守護鯨魚的方法有兩種:出海護鯨與宣傳講座。
                    於每個月舉行一次的出海護鯨活動中，陪伴我們的有專業的相關教練，與2~3位的自然海洋科學教授與我們一同出海。
                    我們會去阻擋其他的漁船捕捉鯨魚，對要捕捉鯨魚的漁船發出聲波干擾等，讓鯨魚享受大海的自言。
                    宣傳一個月有兩次，我們宣傳的對象是學校，其目的是為了讓國高中的小朋友可以了解鯨魚對海洋的重要性，不可以在大海中亂丟垃圾以免讓鯨魚深受其害。
                </p>
            </div>
        </div>
        <!-- goal -->
        <div class="aboutus-container clearfix aboutus-goal-container">
            <div class="aboutus-goal-midlesection clearfix">
                <div class="aboutus-goal-circle-outside">
                    <svg id="animated" viewbox="0 0 100 100">
                        <circle cx="50" cy="50" r="45" fill="#91a5c4" />
                        <path id="progress" stroke-linecap="round" stroke-dasharray="0,251.2" stroke-width="2" stroke="darkblue" fill="none" d="M50 10
                               a 40 40 0 0 1 0 80
                               a 40 40 0 0 1 0 -80">
                        </path>
                        <text id="count" x="50" y="50" text-anchor="middle" dy="7" font-size="20">0%</text>
                    </svg>
                </div>
                <div class="aboutus-goal-txt clearfix">
                    <h2 class="aboutus-goal-title">我們的目標</h2>
                    <img class="goal-whale" src="images/aboutus-img/orca-23182_960_720.png" alt="whale">
                    <p>
                        2018年鯨生鯨世的目標!
                        目標是為了計畫、計畫是為了要不斷地執行之後這樣的目標才有執行的價值，鯨生鯨世在每一年設定了大目標。在每年年底發表年終成果。
                        今年我們自訂的目標包含:<br>
                        <h5><i class="far fa-check-circle"></i>推動全台40%海洋設立保育區</h5><br>
                        <h5><i class="far fa-check-circle"></i>宣傳講座可在今年完成度達87％！</h5><br>
                        <h5><i class="far fa-check-circle"></i>總活動參與人數可達20000人！</h5><br>
                        鯨魚是健康海洋生態系統中重要的一環，請你繼續與鯨生鯨世和平並肩，為鯨魚發聲！
                    </p>
                </div>
            </div>
        </div>
        <!-- milestone -->
        <div class="aboutus-milestone clearfix">
            <div class="aboutus-milestone-title">
                <a href="">
                    <h2>我們的成果
                        <i class="fas fa-angle-double-down"></i>
                    </h2>
                </a>
                <div class="aboutus-milestone-open">
                    <p>
                    自鯨生鯨世創建以來，這幾年來我們辦過100場以上的活動，總共有3500人以上參與，展現出來的是我們的精神與毅力，
                    為了追求心目中最純淨與和平的海洋，讓鯨魚以及其他海洋生物有個安全的海洋存活，
                    我們紀錄了每個活動的成果，鯨生鯨世邀請大家一同來見證我們的活動成果!
                    </p>
                    <a href="achievement.php">
                        <div class="aboutus-milestone-seemorebtn">
                            查看更多成果
                        </div>
                    </a>
                </div>
            </div>
            <div class="aboutus-milestone-map">
                <div>
                    <img src="images/aboutus-img/taiwan.svg" alt="taiwanmap">
                </div>
            </div>
        </div>
    </div> -->
    <script>
        new Vivus('svg', {
            // type: 'delayed',
            duration: 100
        });
    </script>


    <!-- scrollmagic -->
    <script>
        //test 
        var controller = new ScrollMagic.Controller();
        var scene_01 = new ScrollMagic.Scene({
                triggerElement: '.aboutus-method',
                reverse: false
            })
            .addIndicators({
                name: 'scene 02'
            })
            .on('start', function () {
                $('.aboutus-method-bg').css('animation', 'bb 3s linear forwards');
            })
            .addTo(controller);
    </script>

    <script>
        function fuck() {
            var count = $(('#count'));
            $({
                Counter: 0
            }).animate({
                Counter: 87 
            }, {
                duration: 1000,
                easing: 'linear',
                step: function () {
                    count.text(Math.ceil(this.Counter) + "%");
                }
            });

            var s = Snap('#animated');
            var progress = s.select('#progress');

            progress.attr({
                strokeDasharray: '0' //圓的大小
            });
            Snap.animate(0, 218.544, function (value) {
                progress.attr({
                    'stroke-dasharray': value + ',251.2'
                });
            }, 1000);
        };

        var controller = new ScrollMagic.Controller();
        var scene_01 = new ScrollMagic.Scene({
                triggerElement: '.aboutus-goal-container',
                reverse: false
            })
            .addIndicators({
                name: 'scene 01'
            })
            .on('start', fuck)
            .addTo(controller);
    </script>
	<script>
		new WOW().init();
    </script>
    



<script src="../common/js/menu.js"></script>    

</body>
</html>