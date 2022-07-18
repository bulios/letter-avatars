<?php

use LasseRafn\InitialAvatarGenerator\InitialAvatar;

/** @var InitialAvatar $prototype */
$prototype = require __DIR__ . '/../prototype.php';

header('content-type: image/png');

if (($size = $_GET['size'] ?? $_GET['s'] ?? null)) {
	$prototype = $prototype->size((int) $size);
}

if (($size = $_GET['fs'] ?? null)) {
	$prototype = $prototype->fontSize((float) $size);
}

echo $prototype->generate($_GET['n'] ?? $_GET['name'] ?? 'a')->stream('png', 100);
