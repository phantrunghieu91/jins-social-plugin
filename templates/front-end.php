<?php
/**
 * @package Jins Social Plugin
 * * Template for front end display of the plugin
 */
if( !empty($socials) ) : ?>

<div class="jins-socials">
  <?php foreach ($socials as $social) : ?>
    <a href="<?= esc_url($social['url']) ?>" class="jins-socials__link" target="_blank">
      <?= wp_get_attachment_image( $social['icon'], 'thumbnail', true, [ 'class' => 'jins-socials__icon' ] ) ?>
    </a>
  <?php endforeach; ?>
</div>

<?php
endif;