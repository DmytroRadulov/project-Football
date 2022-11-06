<?php if (!empty($_SESSION['alert'])): ?>
<div class="alert notification alert-<?= $_SESSION['alert']['class'] ?>" role="alert"><?= $_SESSION['alert']['text'] ?></div>
<?php unset($_SESSION['alert']);?>
<?php endif;?>

