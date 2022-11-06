<?php if (!empty($data['about'])): ?>
    <section id="about">
        <div class="container">
            <div class="row">

                <div class="col-6 video d-flex align-items-center justify-content-center">
                    <img src="<?= IMAGES_URI . '/' . $data['about']['video']['bg'] ?>" class="video-img" alt="">
                    <a href="<?= $data['about']['video']['link'] ?>" class="play">
                        <img src="assets/images/bg/play-icon.png"" alt="">
                    </a>
                </div>

                <div class="col-lg-6 video-right d-flex flex-column align-items-start justify-content-center">
                    <h6><?= $data['about']['about']['subtitle'] ?></h6>
                    <h1><?= $data['about']['about']['title'] ?></h1>
                    <p><span><?= $data['about']['about']['idea'] ?></span></p>
                    <p><?= $data['about']['about']['description'] ?></p>
                    <?php if(!empty($data['about']['about']['signature'])): ?>
                        <img class="img-fluid" src="<?= IMAGES_URI . '/' . $data['about']['about']['signature'] ?>" alt="">
                    <?php endif; ?>
                </div>


        </div>
    </section>
<?php endif; ?>

