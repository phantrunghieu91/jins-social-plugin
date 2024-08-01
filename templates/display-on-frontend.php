<?php
/**
 * @package Jins Social Plugin
 * * Template for front end display of the plugin
 */
$options = get_option('jins_social_plugin_display_fe_settings') ?? [];
?>
<div class="wrap">
  <?php settings_errors(  ); ?>
  <form action="options.php" class="fe-settings__form" method="POST">
    <?php 
      settings_fields('jins_social_plugin_display_front_end_settings');
      do_settings_sections('jins_social_plugin_display_fe');
    ?>
    <fieldset class="fe-settings__horizontal-position">
      <legend><?= _e('Horizontal:', 'jins-social-plugin') ?></legend>
      <div class="form-group">
        <input type="radio" id="horizontal-position" name="jins_social_plugin_display_fe_settings[horizontal-position]" value="left" <?= $options['horizontal-position'] === 'left' ? 'checked' : '' ?>/>
        <label for="horizontal-position"><?php _e("Left", 'jins-social-plugin') ?></label>
      </div>
      <div class="form-group">
        <input type="radio" id="horizontal-position" name="jins_social_plugin_display_fe_settings[horizontal-position]" value="right" <?= $options['horizontal-position'] === 'right' ? 'checked' : '' ?>/>
        <label for="horizontal-position"><?php _e("Right", 'jins-social-plugin') ?></label>
      </div>
    </fieldset>
  
    <fieldset class="fe-settings__vertical-position">
      <legend><?= _e("Vertical:", 'jins-social-plugin') ?></legend>
      <div class="form-group">
        <input type="radio" id="vertical-position" name="jins_social_plugin_display_fe_settings[vertical-position]" value="center" <?= $options['vertical-position'] === 'center' ? 'checked' : '' ?>/>
        <label for="vertical-position"><?php _e("Center", 'jins-social-plugin') ?></label>
      </div>
      <div class="form-group">
        <input type="radio" id="vertical-position" name="jins_social_plugin_display_fe_settings[vertical-position]" value="bottom" <?= $options['vertical-position'] === 'bottom' ? 'checked' : '' ?>/>
        <label for="vertical-position"><?php _e("Bottom", 'jins-social-plugin') ?></label>
      </div>
    </fieldset>

    <div class="form-group">
      <label for="icon-size"><?php _e("Icon Size:", 'jins-social-plugin') ?></label>
      <input type="text" id="icon-size" name="jins_social_plugin_display_fe_settings[icon-size]" value="<?= $options['icon-size'] ?? '' ?>" placeholder="Size of icon. Ex: 24px or 2rem" required />
      <p class="instruction"><?= _e('Enter size of icon with unit: px, em or rem. Ex: 24px, 2rem, 2em', 'jins-social-plugin') ?></p>
    </div>
    
    <div class="form-group">
      <label for="gap"><?php _e("Space between icon:", 'jins-social-plugin') ?></label>
      <input type="text" id="gap" name="jins_social_plugin_display_fe_settings[gap]" value="<?= $options['gap'] ?? '' ?>" placeholder="Space between icons. Ex: 10px or .625em" required />
      <p class="instruction"><?= _e('Enter space between icons unit: px, em or rem. Ex: 24px, 2rem, 2em', 'jins-social-plugin') ?></p>
    </div>

    <div class="form-group">
      <label for="margin-horizontal"><?php _e("Margin horizontal:", 'jins-social-plugin') ?></label>
      <input type="text" id="margin-horizontal" name="jins_social_plugin_display_fe_settings[margin-horizontal]" value="<?= $options['margin-horizontal'] ?? '' ?>" placeholder="Space from icons to left (right) edge. Ex: 10px or .625em" required />
      <p class="instruction"><?= _e('Enter space from icons to left (right) edge unit: px, em or rem. Ex: 24px, 2rem, 2em', 'jins-social-plugin') ?></p>
    </div>

    <div class="form-group">
      <label for="margin-vertical"><?php _e("Margin vertical:", 'jins-social-plugin') ?></label>
      <input type="text" id="margin-vertical" name="jins_social_plugin_display_fe_settings[margin-vertical]" value="<?= $options['margin-vertical'] ?? '' ?>" placeholder="Space from icons to bottom. Ex: 10px or .625em" required />
      <p class="instruction"><?= _e('Enter space from icons to bottom unit: px, em or rem. Ex: 24px, 2rem, 2em', 'jins-social-plugin') ?></p>
    </div>

    <div class="form-group">
      <label for="hide-in-mobile"><?= __("Hide in mobile:", "jins-social-plugin") ?></label>
      <input type="checkbox" id="hide-in-mobile" name="jins_social_plugin_display_fe_settings[hide-in-mobile]" <?= $options['hide-in-mobile'] ? 'checked' : '' ?> />
      <p class="instruction"><?= __("Check to hide icons in mobile view", "jins-social-plugin") ?></p>
    </div>

    <div class="form-group">
      <label for="has-tooltip"><?= __("Has Tooltip:", "jins-social-plugin") ?></label>
      <input type="checkbox" id="has-tooltip" name="jins_social_plugin_display_fe_settings[has-tooltip]" <?= $options['has-tooltip'] ? 'checked' : '' ?> />
      <p class="instruction"><?= __("Check to show social name as tooltip when hover on social icon.", "jins-social-plugin") ?></p>
    </div>
    <?php submit_button( ); ?>
  </form>
</div>