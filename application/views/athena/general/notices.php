
<?php foreach (Notices::get() as $notice): ?>
    <div class="alert alert-<?php echo $notice['type']; ?>">
        <p><?php echo $notice['key']; ?></p>
    </div>
<?php endforeach; ?>