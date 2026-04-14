<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->

<?php $__env->startSection('code', '404'); ?>
<?php $__env->startSection('title', __('Page introuvable')); ?>
<?php $__env->startSection('message', __('La page que vous recherchez n\'existe pas ou a été déplacée.')); ?>

<?php echo $__env->make('errors.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/stephanelapointe/__IA__/_____SERVEUR_____/site_internet/kalystrat/resources/views/errors/404.blade.php ENDPATH**/ ?>