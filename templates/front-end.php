<?php
/**
 * @package Jins Social Plugin
 * * Template for front end display of the plugin
 */
$fe_settings = get_option('jins_social_plugin_display_fe_settings') ?? [];
$plugin_base = new \jinsSocialPlugin\inc\base\BaseController();
if( !empty($fe_settings) ) : ?>
  <style>
    .jins-socials {
      --jins-socials-gap: <?= $fe_settings['gap'] ?>;
      --jins-socials-icon-size: <?= $fe_settings['icon-size'] ?>;
      <?php
      $left = $fe_settings['horizontal-position'] === 'left' ? $fe_settings['margin-horizontal'] : 'auto';
      $right = $fe_settings['horizontal-position'] === 'right' ? $fe_settings['margin-horizontal'] : 'auto';
      $center = $fe_settings['vertical-position'] === 'center' ? '50%' : 'auto';
      $bottom = $fe_settings['vertical-position'] === 'bottom' ? $fe_settings['margin-vertical'] : 'auto';
      echo sprintf('--jins-socials-left:%s;--jins-socials-right:%s;', $left, $right);
      echo sprintf('--jins-socials-top:%s;--jins-socials-bottom:%s;', $center, $bottom);
      
      echo $fe_settings['vertical-position'] === 'center' ? 'transform: translateY(-50%);' : '';
      ?>
    }
  </style>
<?php endif;
if( !empty($socials) ) : ?>

<div class="jins-socials<?= $fe_settings['hide-in-mobile'] ? ' hide-on-mobile' : '' ?>">
  <?php foreach ($socials as $social) : ?>
    <a href="<?= esc_url($social['url']) ?>" class="jins-socials__link" target="_blank">
      <?php if( $fe_settings['has-tooltip'] ) : ?>
        <span class="jins-socials__tooltip"><?= esc_html($social['name']) ?></span>
      <?php endif; ?>

      <?php
      if( !empty($social['icon']) ) :
        echo wp_get_attachment_image( $social['icon'], 'thumbnail', true, [ 'class' => 'jins-socials__icon' ] );
      else: ?>
        <img class="jins-socials__icon" src="<?= "$plugin_base->plugin_url/assets/images/social-default.png" ?>" alt="default" />
      <?php endif; ?>
    </a>
  <?php endforeach; ?>
</div>

<?php endif; 