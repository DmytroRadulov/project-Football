<?php $photo = $data['photo']; ?>


<section id="photo">
    <div class="container">
        <div class="row title-row section-gap">
            <?php if (!empty($photo['title'])): ?>
                <h1 class="mb-10"><?= $data['photo']['title'] ?></h1>
            <?php endif; ?>
            <?php if (!empty($photo['description'])): ?>
                <p><?= $photo['description'] ?></p>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <?php foreach ($photo['left'] as $key => $item): ?>
                    <img src="<?= IMAGES_PHOTO . '/' . $item ?>" alt="">
                <?php endforeach; ?>
                    <div class="title d-flex flex-row">
                        <div class="row">
                            <?php foreach ($photo['left']['link'] as $key1 => $value): ?>
                            <div class="col-4">
                                 <?php if (!empty($value['text'])): ?>
                                <h6 class="text"><?= $value['text'] ?></h6>
                                 <?php endif; ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                     <?php if (!empty($photo['left']['title'])): ?>
                    <h5><?= $photo['left']['title'] ?></h5>
                     <?php endif; ?>
                     <?php if (!empty($photo['left']['text'])): ?>
                    <p><?= $photo['left']['text'] ?></p>
                    <?php endif; ?>

            </div>
            <div class="col-sm-6">
                <?php foreach ($photo['right'] as $key => $item): ?>
                            <img src="<?= IMAGES_PHOTO . '/' . $item ?>" alt="">
                <?php endforeach; ?>
                            <div class="title d-flex flex-row">
                                <div class="row">
                                    <?php foreach ($photo['right']['link'] as $key1 => $value): ?>
                                    <div class="col-4">
                                        <?php if (!empty($value['text'])): ?>
                                        <h6 class="text"><?= $value['text'] ?></h6>
                                        <?php endif; ?>
                                    </div>
                                    <?php endforeach; ?>

                                </div>


                            </div>
                <?php if (!empty($photo['right']['title'])): ?>
                            <h5><?= $photo['right']['title'] ?></h5>
                    <?php endif; ?>
                                <?php if (!empty($photo['right']['text'])): ?>
                            <p><?= $photo['right']['text'] ?></p>
                                 <?php endif; ?>

                        </div>

        </div>

    </div>

</section>

