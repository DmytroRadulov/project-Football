<?php
$data = dbSelect(Tables::Content, conditions: 'name NOT IN ("navigation", "footer")');
$data = convertContentToAssoc($data);

require_once PARTS_DIR . '/banner.php';
require_once PARTS_DIR . '/about.php';
require_once PARTS_DIR . '/products.php';
require_once PARTS_DIR . '/gallery.php';
require_once PARTS_DIR . '/reviews.php';
require_once PARTS_DIR . '/photo.php';
require_once PARTS_DIR . '/footer.php';