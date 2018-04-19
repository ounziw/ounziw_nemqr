<?php
if (isset($qrCode)) { ?>
    <img src="<?php  echo  $qrCode->getDataUri() ?>" class="qr-code" alt="<?php echo h($alt);?>">
<?php
} else {
    echo t('Please enter a text to see a QR code');
}
