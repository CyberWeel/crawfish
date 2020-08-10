            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <div class="footer__content">
                <div class="site-author">
                    <div>Основано на Crawfish</div>
                    <a href="https://github.com/CyberWeel/crawfish">Ссылка на репозиторий</a>
                </div>
            </div>
        </div>
    </footer>
    <?php if (!isset($_COOKIE['agreedWithCookie'])) {
        require_once TEMPLATES.'/cookie.php';
    } ?>
    <script src="<?=JS.'/main-dist.js'?>"></script>
</body>
</html>
