<div class="row">
    <article class="col-md-12">
        <div class="page-header">
            <h1><?php echo __($title); ?></h1>       
        </div>

        <?php foreach (Notices::get() as $notice): ?>
            <div class="alert alert-<?php echo $notice['type']; ?>">
                <p><?php echo $notice['key']; ?></p>
            </div>
        <?php endforeach; ?>

        <div class="col-md-9">
            <?php echo $content; ?>
        </div>
        <div class="col-md-3 sidebar">
            <?php echo View::factory('athena/_shared/sidebar_admin')->render(); ?>
        </div>
    </article>
</div>