<?php
/**
 * @package Jins Social Plugin
 * Template for dashboard page of the plugin
 */
$options = get_option('jins_social_plugin_dashboard') ?? [];
?>
<div class="wrap jins-social">
  <h1>Jins Social Plugin</h1>
  <?php settings_errors(); ?>
  <nav class="tab-nav">
    <a data-target="#add-socials" class="tab-nav__item tab-nav__item--active">Add Socials</a>
    <a data-target="#front-end-settings" class="tab-nav__item"><?= _e('Display in website settings', 'jins-social-plugin') ?></a>
    <a data-target="#about" class="tab-nav__item">About</a>
  </nav>
  <div class="tab-content">
    <div class="tab-pane tab-pane--active" id="add-socials">
      <form class="jins-social__form" method="POST" action="options.php"
        data-options-count="<?= esc_attr(count($options)) ?>">
        <div class="jins-social__message"></div>
        <?php
        settings_fields('jins_social_plugin_settings'); // This is the option group
        do_settings_sections('jins_social_plugin'); // This is the page slug
        if (!empty($options)):
          for ($i = 0; $i < count($options); $i++):
            $option = $options[$i];
            ?>
            <div class="jins-social__social-section">
              <input type="text" name="jins_social_plugin_dashboard[<?= $i ?>][social_name]"
                class="jins-social__social-name-input" placeholder="Social name"
                value="<?= esc_attr($option['social_name']) ?>" required>
              <input type="text" name="jins_social_plugin_dashboard[<?= $i ?>][social_url]"
                class="jins-social__social-url-input" placeholder="Social URL" value="<?= esc_attr($option['social_url']) ?>">
              <a href="javascript:void(0);" class="button jins-social__remove-social-btn" data-index="<?= esc_attr($i) ?>">Remove</a>
              <div class="jins-social__social-icon">
                <input type="hidden" name="jins_social_plugin_dashboard[<?= $i ?>][social_icon]" value="<?= !empty($option['social_icon']) ? $option['social_icon'] : '' ?>">
                <a href="javascript:void(0);" class="button jins-social__select-icon-btn">Select Icon</a>
                <?php if( $option['social_icon'] ): ?>
                  <img src="<?= esc_url($option['social_icon']) ?>" alt="Social Icon" class="jins-social__social-icon-img">
                  <a class="jins-social__remove-icon-btn" href="javascript:void(0);"></a>
                <?php endif; ?>
              </div>
            </div>
          <?php endfor; endif; ?>
        <a href="javascript:void(0);" class="button jins-social__add-more-social">Add more social</a>
        <?php submit_button(); ?>
        <!-- <button type="submit" class="jins-social__submit-btn">Submit</button> -->
      </form>
    </div>
    <div class="tab-pane" id="front-end-settings">
      <h2>Display on website settings</h2>
    </div>
    <div class="tab-pane" id="about">
      <h2>About Jins Social Plugin</h2>
      <p>Jins Social Plugin is a simple social media plugin that allows you to add social media links to your website.</p>
    </div>
  </div>
</div>