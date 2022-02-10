<div class="footer">
    <div class="wrapper">
        <div class="section group">
            <div class="col_1_of_4 span_1_of_4">
                <h4>Thông tin</h4>
                <ul>
                    <li><a href="#">Về Chúng Tôi</a></li>
                    <li><a href="#">Chăm Sóc Khách Hàng</a></li>
                    <li><a href="#"><span>Liên Hệ</span></a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>Chính Sách</h4>
                <ul>
                    <li><a href="faq.html">Đổi Trả</a></li>
                    <li><a href="#">Bảo Hành</a></li>
                    <li><a href="contact.html"><span>Bản Đồ</span></a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>Tài Khoản</h4>
                <ul>
                    <li><a href="contact.html">Đăng Nhập</a></li>
                    <li><a href="index.html">Giỏ Hàng</a></li>
                    <li><a href="#">Kiểm Tra Đơn Hàng</a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>Liên Hệ</h4>
                <ul>
                    <li><span>+88-01713458599</span></li>
                    <li><span>+88-01813458552</span></li>
                </ul>
                <div class="social-icons">
                    <h4>Theo Dõi</h4>
                    <ul>
                        <li class="facebook"><a href="#" target="_blank"> </a></li>
                        <li class="twitter"><a href="#" target="_blank"> </a></li>
                        <li class="googleplus"><a href="#" target="_blank"> </a></li>
                        <li class="contact"><a href="#" target="_blank"> </a></li>
                        <div class="clear"></div>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copy_right">
            <p>Training with live project &amp; All rights Reseverd </p>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        /*
        var defaults = {
              containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
         };
        */

        $().UItoTop({easingType: 'easeOutQuart'});

    });
</script>
<a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
<link href="css/flexslider.css" rel='stylesheet' type='text/css'/>
<script defer src="js/jquery.flexslider.js"></script>
<script type="text/javascript">
    $(function () {
        SyntaxHighlighter.all();
    });
    $(window).load(function () {
        $('.flexslider').flexslider({
            animation: "slide",
            start: function (slider) {
                $('body').removeClass('loading');
            }
        });
    });
</script>
</body>
</html>
