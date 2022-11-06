<?php $gallery = $data['gallery']['gallery']; ?>

<section id="gallery" class="section-gap">
    <div class="container">
        <div class="row title-row section-gap">
            <?php if (!empty($data['gallery']['title'])): ?>
                <h1 class="mb-10"><?= $data['gallery']['title'] ?></h1>
            <?php endif; ?>
            <?php if (!empty($data['gallery']['description'])): ?>
                <p><?= $data['gallery']['description'] ?></p>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?php foreach ($gallery['left'] as $img): ?>
                    <img src="<?= IMAGES_URI . '/' . $img ?>" alt="" class="gallery-img"">
                <?php endforeach; ?>
            </div>
            <div class="col-md-8">
                <img src="<?= IMAGES_URI . '/' . $gallery['right'] ?>" alt="" class="gallery-img">
                <div class="row">
                    <?php foreach ($gallery['bottom'] as $img): ?>
                        <div class="col-6">
                    <img src="<?= IMAGES_URI . '/' . $img ?>" alt="" class="gallery-img">
                </div>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>


