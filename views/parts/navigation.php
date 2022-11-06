<?php
$navDate = dbSelect(Tables::Content, conditions: 'name = "navigation"');
$navDate = convertContentToAssoc($navDate)['navigation'];
?>
<header id="navigation">
    <div class="container">
        <div class="row align-items-center justify-content-between d-flex">
            <?php if (!empty($navDate['logo'])): ?>
                <div id="logo">
                    <a href="/">
                        <img src="<?= IMAGES_URI . '/' . $navDate['logo'] ?>" alt=""/>
                    </a>
                </div>
            <?php endif; ?>
            <?php if (!empty($navDate['link'])): ?>
                <div>
                    <nav class="nav">
                        <?php foreach ($navDate['link'] as $link): ?>
                            <?php $href = DOMAIN . '/' . $link['href']; ?>
                            <a class="nav-link" href="<?= $href ?>"><?= $link['text'] ?></a>
                        <?php endforeach; ?>
                        <?php if (isLoggedIn()): ?>
                            <a class="nav-link disabled" href="#">|</a>
                            <a class="nav-link" href="<?= DOMAIN . '/cart' ?>">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <?php if (!empty($_SESSION['cart'])) : ?>
                                    <span class="cart-quantity"><?= count($_SESSION['cart']) ?></span>
                                <?php endif; ?>
                            </a>
                            <a class="nav-link" href="<?= DOMAIN . '/account' ?>"><i class="fa-solid fa-user"></i></a>
                            <a class="nav-link" href="<?= DOMAIN . '/logout' ?>"><i class="fa-solid  fa-door-open"></i></a>
                        <?php else: ?>
                            <a class="nav-link" href="<?= DOMAIN . '/login' ?>">Login</a>
                        <?php endif; ?>

                    </nav>
                </div>
            <?php endif; ?>
        </div>
    </div>
</header>
