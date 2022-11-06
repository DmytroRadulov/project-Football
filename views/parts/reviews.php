<?php $reviews =  $data['reviews']['reviews'];?>

<section id="reviews">
    <div class="container">
        <div class="row title-row section-gap">
            <?php if (!empty($data['reviews']['title'])): ?>
            <h1 class="mb-10"><?= $data['reviews']['title'] ?></h1>
            <?php endif; ?>
            <?php if (!empty($data['reviews']['description'])): ?>
            <p><?= $data['reviews']['title'] ?>
                <img src="<?= IMAGES_URI . '/' . $data['reviews']['logo'] ?>" alt=""></p>
            <?php endif; ?>
        </div>
        <div class="row">
            <?php foreach ($reviews as $key => $item ): ?>
                <div class="col-lg-6 col-md-6 single-review">
                    <img src="<?= IMAGES_URI . '/' . $item['logo'] ?>" alt="">
                    <div class="title d-flex flex-row">
                        <?php if (!empty($item['company'])): ?>
                            <h4><?= $item['company'] ?></h4>
                        <?php endif; ?>
                        <div class="star">
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                    </div>
                    <?php if (!empty($item['text'])): ?>
                        <p><?= $item['text'] ?></p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

