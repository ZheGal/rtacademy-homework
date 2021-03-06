
    </main>
    <footer>
        <div class="top">
            <div>
                <div class="title">Теги</div>
                <ul>
                    <li><a href="#">Освіта</a></li>
                    <li><a href="#">Натхнення</a></li>
                    <li><a href="#">Спосіб життя</a></li>
                    <li><a href="#">Природа</a></li>
                    <li><a href="#">Подорожі</a></li>
                    <li><a href="#">Робота</a></li>
                </ul>
            </div>
            <div>
                <div class="title">Навігація</div>
                <ul>
                    <?php foreach( $websiteMenuItems as $menu) :?>
                    <li><a href="<?=$menu->getHref();?>"><?=$menu->getTitle();?></a></li>
                    <?php endforeach;?>
                </ul></div>
            <div>
                <div class="title">Підписатися</div>
                <div class="subscribe">
                    <form action="/" method="post">
                        <input type="email" name="email" placeholder="Ваша email-адреса">
                        <button type="submit">Підписатися</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="bottom">
            <p>© 2021 ZHEGAL</p>
            <ul class="socials">
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                <li><a href="#"><i class="fas fa-rss"></i></a></li>
            </ul>
        </div>
    </footer>

    <script src="./web/scripts/posts.js"></script>
</body>
</html>