<?php foreach ($_SESSION['message'] as $message): ?>
    <p>
        <?= $message; ?>
    </p>
<?php endforeach; ?>
