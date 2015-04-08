<ul class="nav nav-pills">
    <?php foreach ($alphas as $alpha): ?>
    <li role="presentation" class=" <?php if(Athena_Request::isCurrentQueryParam('letter', $alpha)) echo 'active'; ?>">
        <a href="<?php echo Athena_Request::currentURI(); ?>?letter=<?php echo $alpha; ?>">
            <?php echo $alpha; ?>
        </a>
    </li> 
    <?php endforeach; ?>
</ul>

<hr/>