
<?php foreach ($_SESSION['power'] as $key => $light) : ?>
    <?php if ($light) : ?>
        <?php $indicator = "indicatorOn"; ?>
    <?php else:?>
        <?php $indicator = "indicatorOff"; ?>
    <?php endif; ?>
    <p><a class="button" href="/?line=<?= $key; ?>&col=1"></a>
        <span class="<?=$indicator;?>"></span>
        <a class="button" href="/?line=<?= $key; ?>&col=2"></a></p>
<?php endforeach; ?>
