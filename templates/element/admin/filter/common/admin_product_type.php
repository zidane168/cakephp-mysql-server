<?php

if ($_type == 1) {
	$text 	= __d('product', 'rent');
	$style  = "badge badge-pill badge-success";

} else {
	$text 	= __d('product', 'sell');
	$style  = "badge badge-pill badge-warning";
}

?>

<label class="<?= $style; ?>"> <?= $text ?> </label>