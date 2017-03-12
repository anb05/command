<?php $lights = [1, 1, 0, 0, 0, 0, 0]; ?>

<?php foreach ($lights as $count => $light) : ?>
    <?php if ($light) : ?>
        <?php $indicator = "indicatorOn"; ?>
    <?php else:?>
        <?php $indicator = "indicatorOff"; ?>
    <?php endif; ?>
    <p><a class="button" href="/?line=<?= $count; ?>&col=1"></a>
        <span class="<?=$indicator;?>"></span>
        <a class="button" href="/?line=<?= $count; ?>&col=2"></a></p>
<?php endforeach; ?>
