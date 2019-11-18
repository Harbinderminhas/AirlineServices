<!--footer of layouts -->
<footer>
    <div class="container">
        <div class="col-md-6 col-sm-7 header-side">
            <div class="header-side">
                <div class="buttom-social-grids">
                    <ul>
                        <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                        <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fa fa-rss"></span></a></li>
                        <li><a href="#"><span class="fa fa-vk"></span></a></li>
                    </ul>
                </div>
            </div>
            <p>©2019 Convey. All Rights Reserved | Design by <a href="https://github.com/Harbinderminhas" target="_blank">HARBINDER MINHAS</a></p>
        </div>
        <div class="col-md-6 col-sm-5 header-right">
            <h2><a href="index.php">AIRLINE SERVICES</a></h2>
        </div>
    </div>
</footer>
<!--//footer -->
<!--js working-->

<!-- //js  working-->
<!-- banner-->
<script src="js/responsiveslides.min.js"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
        // Slideshow 4
        $("#slider4").responsiveSlides({
            auto: true,
            pager: false,
            nav: true,
            speed: 900,
            namespace: "callbacks",
            before: function () {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function () {
                $('.events').append("<li>after event fired.</li>");
            }
        });

    });
</script>
<!--// banner-->
<!--partner-->
<script src="js/jquery.flexslider.js"></script>
<!--Start-slider-script-->
<script>
    $(window).load(function(){
        $('.flexslider').flexslider({
            animation: "slide",
            start: function(slider){
                $('body').removeClass('loading');
            }
        });
    });
</script>
<!--End-slider-script partner-->
<!-- start-smoth-scrolling -->
<script src="js/move-top.js"></script>
<script src="js/easing.js"></script>
<script>
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });
    });
</script>
<!-- start-smoth-scrolling -->
<!-- for-bottom-to-top smooth scrolling -->
<script>
    $(document).ready(function () {
        /*
            var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
            };
        */
        $().UItoTop({
            easingType: 'easeOutQuart'
        });
    });
</script>
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //for-bottom-to-top smooth scrolling -->
<!-- bootstrap-->

<!--// bootstrap-->