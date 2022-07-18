<?php

use LasseRafn\InitialAvatarGenerator\InitialAvatar;

require __DIR__ . '/vendor/autoload.php';

/**
 * @return string[]
 */
function getLetters(string $endsWith): array
{
	$endsWith++;

	$letters = [];
	$letter = 'A';

	while ($letter !== $endsWith) {
		$letters[] = $letter++;
	}

	return $letters;
}

return (new InitialAvatar())
	->fontSize(0.4)
	->size(150)
	->background('#512bee')
	->color('#fff')
	->font(__DIR__ . '/font/nunito.extrabold.ttf');
