<?php 
use library\Helper; 
?>
<div class="container banner">
    <?php foreach($usersList as $user) : ?>
        <div class="alert alert-dark" role="alert">
            <p class="h5">Name: <?php echo Helper::hc($user['name']) ?></p>
            <p class="h5">Phone: <?php echo Helper::hc($user['phone'])?></p>
            <p class="h5">Token: <?php echo Helper::hc($user['token'])?></p>
        </div>
    <?php endforeach; ?>    
</div>
