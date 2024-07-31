<?php
/**
 * @package Jins Social Plugin
 * * Template for front end display of the plugin
 */
$fe_settings = get_option('jins_social_plugin_display_fe_settings') ?? [];
if( !empty($fe_settings) ) : ?>
  <style>
    .jins-socials {
      --jins-socials-gap: <?= $fe_settings['gap'] ?>;
      <?php
      $left = $fe_settings['horizontal-position'] === 'left' ? $fe_settings['margin-horizontal'] : 'auto';
      $right = $fe_settings['horizontal-position'] === 'right' ? $fe_settings['margin-horizontal'] : 'auto';
      $center = $fe_settings['vertical-position'] === 'center' ? '50%' : 'auto';
      $bottom = $fe_settings['vertical-position'] === 'bottom' ? $fe_settings['margin-vertical'] : 'auto';
      echo sprintf('--jins-socials-left:%s;--jins-socials-right:%s;', $left, $right);
      echo sprintf('--jins-socials-top:%s;--jins-socials-bottom:%s;', $center, $bottom);
      
      echo $fe_settings['vertical-position'] !== 'center' ?: 'transform: translateY(-50%);';
      ?>
    }
    .jins-socials__link {
      --jins-socials-icon-size: <?= $fe_settings['icon-size'] ?>;
    }
  </style>
<?php endif;
if( !empty($socials) ) : ?>

<div class="jins-socials">
  <?php foreach ($socials as $social) : ?>
    <a href="<?= esc_url($social['url']) ?>" class="jins-socials__link" target="_blank">
      <?= wp_get_attachment_image( $social['icon'], 'thumbnail', true, [ 'class' => 'jins-socials__icon' ] ) ?>
    </a>
  <?php endforeach; ?>
</div>

<?php endif; 