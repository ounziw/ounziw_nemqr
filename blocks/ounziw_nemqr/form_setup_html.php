<?php defined('C5_EXECUTE') or die("Access Denied.");
?>

<fieldset>
    <div class='form-group'>
        <legend><?php echo t('NEM Setting')?></legend>
        <?php  echo  $form->label('wallet', t('Wallet')) ?>
        <?php  echo  $form->text('wallet', $wallet) ?>
        <?php  echo  $form->label('amount', t('Amount')) ?>
        <?php  echo  $form->text('amount', $amount) ?>
        <?php  echo  $form->label('message', t('Message for QR Code')) ?>
        <?php  echo  $form->text('message', $message) ?>
    </div>
    <div class="form-group">
        <legend><?php echo t('QR Code Settting')?></legend>
        <?php  echo  $form->label('size', t('Size')) ?>
        <?php  echo  $form->number('size', $size) ?>
        <?php  echo  $form->label('padding', t('Padding')) ?>
        <?php  echo  $form->number('padding', $padding) ?>
    </div>
</fieldset>