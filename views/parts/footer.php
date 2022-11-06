<?php
$footer = dbSelect(Tables::Content, conditions: 'name = "footer"');
$footer = convertContentToAssoc($footer)['footer'];
?>
<footer class="footer-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <?php if (!empty($footer['title'])):?>
                    <h6><?= $footer['title'] ?></h6>
                    <?php endif; ?>
                    <?php if (!empty($footer['description'])):?>
                    <p>
                        <?= $footer['description'] ?>
                    </p>
                    <?php endif; ?>
                    <?php if (!empty($footer['copyright'])):?>
                    <p class="footer-text">
                        <?= $footer['copyright'] ?>


                    </p>
  <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Новостная рассылка</h6>
                    <p>Будьте в курсе наших последних новостей</p>
                    <form action="/">
                        <div class="form-group">
                            <!--                            <label for="email">Ведите ваш Email:</label>-->
                            <input type="text" id="email" placeholder="Ваш email...">
                            <input type="submit" value="Подписаться" class="btn">
                        </div>

                    </form>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6 social-widget">
                <div class="single-footer-widget">
                    <h6>Подписывайтесь на нас</h6>
                    <p>Давайте будем общительны</p>
                    <div class="footer-social d-flex align-items-center">
                        <?= showSocials($footer['socials']) ?>

                    </div>
                </div>

            </div>
        </div>

    </div>

</footer>
<?php require_once PARTS_DIR . '/modals/product.php'?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="<?= ASSETS_URI ?>/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= ASSETS_URI ?>/js/main.js"></script>
</body>
</html>
<?php //dd($footer); ?>
