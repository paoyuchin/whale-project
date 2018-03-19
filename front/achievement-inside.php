<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- custom -->
    <link rel="stylesheet" href="css/achievement-inside.css">
    <link rel="stylesheet" type="text/css" href="../common/css/menu.css">
    <!-- reset -->
    <link rel="stylesheet" href="css/reset.css">    
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- plugin -->
    <link rel="stylesheet" href="css/grt-youtube-popup.css">
    <link rel="stylesheet" href="css/plugin/fontawesome-all.min.css">
    <script src="js/plugin/grt-youtube-popup.js"></script>
    <script type='text/javascript' src="js/plugin/snap.svg-min.js"></script>
        <script src="js/plugin/ScrollMagic.min.js"></script>
    <script src="js/plugin/debug.addIndicators.min.js"></script>

    <script src="../common/js/menu.js"></script>
    <title>成果內頁</title>
</head>

<body>

    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
    <?php  require_once "../common/menu.html" ?>


    <div class="achieve-inside-bg-section">
        <div class="spin-animation"></div>
        <p>護鯨成果內頁</p>
        <div class="wave01"></div>
        <div class="wave02"></div>
        <div class="wave03"></div>
    </div>
    <div class="achievement-container clearfix">
        <div class="achieve-inside-title clearfix">
            <?php 
                try{
                    require_once("connectback.php");
                    $activityNo = $_REQUEST['activityNo'];
                    $sql = "SELECT content , activityName , `startDate` , filename FROM achievementcontent aa ,activity 
                            WHERE aa.activityNo = activity.activityNo 
                            And aa.activityNo = $activityNo";
                     $editContents = $pdo -> prepare($sql);
                     $editContents->execute();
                        $editContent = $editContents -> fetchObject();
                        $content = $editContent->content;
                        $activityName = $editContent->activityName;
                        $endDay = $editContent->startDate;
                        $filename = $editContent->filename;?>
                    <h2><?php echo $activityName ?></h2>
                    <p class="title-content"><?php echo $content ?></p>
                    <p class="title-date"><?php echo $endDay ?></p>
                    
              
        </div>
        <div class="achieve-inside-progrebar clearfix">
            <div class="bar-1">
                <svg id="animated" viewbox="0 0 100 100">
                    <circle cx="50" cy="50" r="45" fill="#91a5c4" />
                    <path id="progress" stroke-linecap="round" stroke-dasharray="0,251.2" stroke-width="2" stroke="darkblue" fill="none" d="M50 10
                                   a 40 40 0 0 1 0 80
                                   a 40 40 0 0 1 0 -80">
                    </path>
                    <text id="count" x="50" y="50" text-anchor="middle" dy="7" font-size="9">0%</text>
                </svg>
            </div>
            <div class="bar-2">
                <svg id="animated1" viewbox="0 0 100 100">
                    <circle cx="50" cy="50" r="45" fill="#91a5c4" />
                    <path id="progress" stroke-linecap="round" stroke-dasharray="0,251.2" stroke-width="2" stroke="darkblue" fill="none" d="M50 10
                                       a 40 40 0 0 1 0 80
                                       a 40 40 0 0 1 0 -80">
                    </path>
                    <text id="count1" x="50" y="50" text-anchor="middle" dy="7" font-size="9">0%</text>
                </svg>
            </div>
            <div class="bar-3">
                <svg id="animated2" viewbox="0 0 100 100">
                    <circle cx="50" cy="50" r="45" fill="#91a5c4" />
                    <path id="progress" stroke-linecap="round" stroke-dasharray="0,251.2" stroke-width="2" stroke="darkblue" fill="none" d="M50 10
                                                               a 40 40 0 0 1 0 80
                                                               a 40 40 0 0 1 0 -80">
                    </path>
                    <text id="count2" x="50" y="50" text-anchor="middle" dy="7" font-size="9">0%</text>
                </svg>
            </div>
            <div class="progressbar-text-father">
                <div class="progressbar-text1">活動參觀人數活動參觀人數</div>
                <div class="progressbar-text2">活動參觀人數活動參觀人數</div>
                <div class="progressbar-text3">活動參觀人數活動參觀人數</div>
            </div>
        </div>
        <?php
        $editContent = $editContents -> fetchObject();
                        $content = $editContent->content;
                        $activityName = $editContent->activityName;
                        $endDay = $editContent->startDate;
                        $filename = $editContent->filename;
        ?>
        <div class="block1 clearfix">
            <div class="achieve-inside-right">
                <img src="images/achievement-inside-img/33333.jpg" id="imagesscroll" alt="world">
            </div>
            <div class="achieve-inside-left">
                <p>
            <?php echo $content?>    
            </p>
            </div>
        </div>
        
        <?php
        while ($editContent = $editContents -> fetchObject()) {
            $content = $editContent->content;
                        $activityName = $editContent->activityName;
                        $endDay = $editContent->startDate;
                        $filename = $editContent->filename;
        
        
                        
        ?>
        <div class="block2 clearfix">
            <p class="block2-1">
                <?php echo $content?></p>
            <div class="block2-2">
                <img src="images/achievement-inside-img/33333.jpg" alt="test">
            </div>
        </div>
        <?php
        }
        ?>
        
        <?php
                        
                    }catch(PDOExpection $e) {
								echo "錯誤原因: ", $e->getMessage(), "<br>";
								echo "錯誤行號: ", $e->getLine(), "<br>";
							}
                        ?>
        <div class="btnFather">
        <a class="btn" href="achievement.php">回前一頁</a>
    </div>
    </div>
    

    <script>
        // Demo video 2
        $(".youtube-link-dark").grtyoutube({
            autoPlay: false,
            theme: "light"
        });
    </script>


    <script>
        $(function () {
            $(window).scroll(function () {
                // console.log('got it');
                $('#imagesscroll').css('left', -($(window).scrollTop() / 5))
            }); //end of scroll
        }); //end of ready function
    </script>
    <!-- progress bar -->
    <script type='text/javascript'>
        function progrebar1 () {
            var count = $(('#count'));
            $({
                Counter: 0
            }).animate({
                Counter: 87
            }, {
                duration: 2000,
                easing: 'linear',
                step: function () {
                    count.text("恭喜妳得" + Math.ceil(this.Counter) + "%");
                }
            });

            var s = Snap('#animated');
            var progress = s.select('#progress');

            progress.attr({
                strokeDasharray: '0, 251.2' //圓的大小
            });
            Snap.animate(0, 218.544, function (value) {
                progress.attr({
                    'stroke-dasharray': value + ',251.2'
                });
            }, 2000);
        };
    </script>
    <!-- progressbar -->
    <script type='text/javascript'>
    function progrebar2 () {
            var count = $(('#count1'));
            $({
                Counter: 0
            }).animate({
                Counter: 371
            }, {
                duration: 2000,
                easing: 'linear',
                step: function () {
                    count.text("恭喜妳得" + Math.ceil(this.Counter) + "%");
                }
            });

            var s = Snap('#animated1');
            var progress = s.select('#progress');

            progress.attr({
                strokeDasharray: '0, 251.2' //圓的大小
            });
            Snap.animate(0, 218.544, function (value) {
                progress.attr({
                    'stroke-dasharray': value + ',251.2'
                });
            }, 2000);
        };
    </script>
    <!-- progress bar -->
    <script type='text/javascript'>
        function progrebar3 () {
            var count = $(('#count2'));
            $({
                Counter: 0
            }).animate({
                Counter: 33
                // Counter: count.text()
                
            }, {
                duration: 2000,
                easing: 'linear',
                step: function () {
                    count.text("恭喜妳得" + Math.ceil(this.Counter) + "%");
                }
            });

            var s = Snap('#animated2');
            var progress = s.select('#progress');

            progress.attr({
                strokeDasharray: '0, 251.2' //圓的大小
            });
            Snap.animate(0, 218.544, function (value) {
                progress.attr({
                    'stroke-dasharray': value + ',251.2'
                });
            }, 2000);
        };
   
         var controller = new ScrollMagic.Controller();
        var scene_01 = new ScrollMagic.Scene({
                triggerElement: '.achieve-inside-title',
                reverse: false
            })
            .addIndicators({
                name: 'scene 01'
            })
            .on('start', progrebar1)
            .addTo(controller);

              var scene_02 = new ScrollMagic.Scene({
                triggerElement: '.achieve-inside-title',
                reverse: false
            })
            .addIndicators({
                name: 'scene 02'
            })
            .on('start', progrebar2)
            .addTo(controller);

             var scene_03 = new ScrollMagic.Scene({
                triggerElement: '.achieve-inside-title',
                reverse: false
            })
            .addIndicators({
                name: 'scene 03'
            })
            .on('start', progrebar3)
            .addTo(controller);
        
    </script>

</body>

</html>