<?php

use LasseRafn\InitialAvatarGenerator\InitialAvatar;

/** @var InitialAvatar $prototype */
$prototype = require __DIR__ . '/prototype.php';

// settings

$variations = [
	[
		fn (InitialAvatar $prototype) => $prototype,
		fn (string $name): string => $name,
	],
	[
		fn (InitialAvatar $prototype) => $prototype->size(300),
		fn (string $name): string => $name . '-lg',
	],
	[
		fn (InitialAvatar $prototype) => $prototype->background('#fff')->color('#000'),
		fn (string $name): string => $name . '-light',
	],
	[
		fn (InitialAvatar $prototype) => $prototype->background('#fff')->color('#000')->size(300),
		fn (string $name): string => $name . '-light-lg',
	],
];

// end

@mkdir(__DIR__ . '/output');

$letters = getLetters('ZZ');
$letters[] = ['?', '_'];

foreach ($variations as [$prototypeClosure, $outputClosure]) {
	$avatar = $prototypeClosure(clone $prototype);

	foreach ($letters as $letter) {
		if (is_array($letter)) {
			[$letter, $output] = $letter;
		} else {
			$output = $letter;
		}

		$image = $avatar->generate($letter);

		$image->save(__DIR__ . '/output/' . $outputClosure($output) . '.jpg', 100);
	}
}
