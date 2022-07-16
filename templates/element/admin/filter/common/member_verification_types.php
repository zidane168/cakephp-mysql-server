<?php
$style = "";
$text = $verification_types[$this->Number->format($memberVerification->verification_type)];
if ($text === 'Register') {
    $style  = "badge badge-pill badge-primary";
    
} elseif ($text === 'Forgot password') {
    $style  = "badge badge-pill badge-secondary";

} elseif ($text === 'Ai Pairing') {
    $style  = "badge badge-pill badge-warning";
}
?>

<label class="<?= $style; ?>"> <?= $text ?> </label>