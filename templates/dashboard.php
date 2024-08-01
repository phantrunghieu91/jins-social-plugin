<?php
/**
 * @package Jins Social Plugin
 * Template for dashboard page of the plugin
 */
$options = get_option('jins_social_plugin_socials') ?? [];
?>
<div class="wrap jins-social">
  <?php settings_errors(); ?>

  <form class="jins-social__form" method="POST" action="options.php"
    data-options-count="<?= esc_attr(count($options)) ?>">
    <div class="jins-social__message"></div>
    <?php
    settings_fields('jins_social_plugin_dashboard'); // This is the option group
    do_settings_sections('jins_social_plugin'); // This is the page slug
    if (!empty($options)):
      for ($i = 0; $i < count($options); $i++):
        $option = $options[$i];
        ?>
        <div class="jins-social__social-section">
          <input type="text" name="jins_social_plugin_socials[<?= $i ?>][social_name]"
            class="jins-social__social-name-input" placeholder="Social name" value="<?= esc_attr($option['social_name']) ?>"
            required>
          <input type="text" name="jins_social_plugin_socials[<?= $i ?>][social_url]" class="jins-social__social-url-input"
            placeholder="Social URL" value="<?= esc_attr($option['social_url']) ?>">
          <a href="javascript:void(0);" class="button jins-social__remove-social-btn"
            data-index="<?= esc_attr($i) ?>">Remove</a>
          <div class="jins-social__social-icon">
            <input type="hidden" name="jins_social_plugin_socials[<?= $i ?>][social_icon]"
              value="<?= !empty($option['social_icon']) ? $option['social_icon'] : '' ?>">
            <a href="javascript:void(0);" class="button jins-social__select-icon-btn">Select Icon</a>
            <?php if ($option['social_icon']): ?>
              <img src="<?= wp_get_attachment_image_url($option['social_icon'], 'thumbnail', true) ?>" alt="Social Icon"
                class="jins-social__social-icon-img">
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
</div>