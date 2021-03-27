<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/pagesData.php';
?>
</main>
<div class="footer">
    <div class="top_footer">
        <div class="content">
            <div class="column left">
                <h3>Contact Us</h3>
                <div class="list">
                    <img src="/image/location.png" alt="#">
                    <p>55 Main St. Toronto, ON M1H 3A5</p>
                </div>
                <div class="list">
                    <img src="/image/iPhone_potrait.png" alt="#">
                    <p>(416) 555-5252</p>
                </div>
                <div class="list">
                    <img src="/image/email.png" alt="#">
                    <p>hello@treehouse.com</p>
                </div>
            </div>
            <div class="column middle">
                <h3>Latest Posts</h3>
                <? foreach($arPages["blog"]["content"] as $key => $article): ?>
                    <div class="list">
                        <img src="/image/<?= $article["type"]?>.png" alt="#">
                        <a href="<?= $arPages["blog"]["link"] ?>&article=<?= $key?>"><?= $article["name"]?></a>
                    </div>
                <? endforeach; ?>
            </div>
            <div class="column right">
                <h3>Title - Latest Tweets</h3>
                <div class="list">
                    <img src="/image/TwitterIcon.png" alt="#">
                    <p><a href="#">Confucius: Life is really simple, but we insist on making it complicated.</a> <br/>#famousquotes <br/><span class="small">8 mins ago</span></p>
                </div>
                <div class="list">
                    <img src="/image/TwitterIcon.png" alt="#">
                    <p><a class="green"href="#">Grab the Free Treehouse web template at FreebiesXpress!</a><br/>#freebies #templates <br/><span class="small">2 days ago</span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_footer content">
        <p>© Copyright 2014 FreebiesXpress.com</p>
        <div class="social">
            <div class="round tw"><a href="#"><img src="/image/Twitter.png" alt="#"></a></div>
            <div class="round fb"><a href="#"><img src="/image/Facebook.png" alt="#"></a></div>
            <div class="round pn"><a href="#"><img src="/image/Pinterest.png" alt="#"></a></div>
            <div class="round gg"><a href="#"><img src="/image/Google+.png" alt="#"></a></div>
        </div>
    </div>
</div>
</body>
</html>
<?php
