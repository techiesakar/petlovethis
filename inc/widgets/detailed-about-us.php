<?php class LogoTextNavWidget extends WP_Widget
{

    // Widget constructor
    public function __construct()
    {
        parent::__construct(
            'logo_text_nav_widget',
            'Logo Text Nav Widget',
            array('description' => 'A custom widget that displays a logo, text, and navigation.')
        );
    }

    // Widget frontend display
    public function widget($args, $instance)
    {
        echo $args['before_widget'];

        // Display the logo
        if (!empty($instance['logo'])) {
            echo '<a href="' . home_url() . '" class="flex items-center"><img class=""custom-logo custom-logo w-auto" src="' . esc_attr($instance['logo']) . '" alt="Logo"></a>';
        }

        // Display the text
        if (!empty($instance['text'])) {
            echo '<p>' . esc_html($instance['text']) . '</p>';
        }

        // Display the navigation if enabled
        if (!empty($instance['display_navigation']) && $instance['display_navigation'] === 'yes' && !empty($instance['navigation'])) {
            wp_nav_menu(array(
                'menu' => $instance['navigation'],
                'container' => 'nav',

                'menu_class' => ' justify-between gap-4  grid-cols-2 grid',
            ));
        }

        echo $args['after_widget'];
    }

    // Widget backend form
    public function form($instance)
    {
        $logo = !empty($instance['logo']) ? $instance['logo'] : '';
        $text = !empty($instance['text']) ? $instance['text'] : '';
        $navigation = !empty($instance['navigation']) ? $instance['navigation'] : '';
        $display_navigation = isset($instance['display_navigation']) && $instance['display_navigation'] === 'yes' ? 'yes' : 'no';

        // Logo field
        echo '<p>';
        echo '<label for="' . $this->get_field_id('logo') . '">Logo URL:</label><br>';
        echo '<input type="url" class="widefat" id="' . $this->get_field_id('logo') . '" name="' . $this->get_field_name('logo') . '" value="' . esc_attr($logo) . '" />';
        echo '</p>';

        // Text field
        echo '<p>';
        echo '<label for="' . $this->get_field_id('text') . '">Text:</label>';
        echo '<textarea class="widefat" rows="5" id="' . $this->get_field_id('text') . '" name="' . $this->get_field_name('text') . '">' . esc_textarea($text) . '</textarea>';
        echo '</p>';

        // Display navigation option
        echo '<p>';
        echo '<input type="checkbox" id="' . $this->get_field_id('display_navigation') . '" name="' . $this->get_field_name('display_navigation') . '" value="yes" ' . checked($display_navigation, 'yes', false) . '/>';
        echo '<label for="' . $this->get_field_id('display_navigation') . '">Display Navigation</label>';
        echo '</p>';

        // Navigation dropdown
        echo '<p>';
        echo '<label for="' . $this->get_field_id('navigation') . '">Navigation:</label><br>';
        echo '<select class="widefat" id="' . $this->get_field_id('navigation') . '" name="' . $this->get_field_name('navigation') . '">';
        echo '<option value="">Select a Menu</option>';
        $menus = get_terms('nav_menu');
        foreach ($menus as $menu) {
            $selected = ($navigation === $menu->slug) ? 'selected' : '';
            echo '<option value="' . esc_attr($menu->slug) . '" ' . $selected . '>' . esc_html($menu->name) . '</option>';
        }
        echo '</select>';
        echo '</p>';
    }

    // Update widget settings
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['logo'] = !empty($new_instance['logo']) ? esc_url_raw($new_instance['logo']) : '';
        $instance['text'] = sanitize_textarea_field($new_instance['text']);
        $instance['navigation'] = sanitize_text_field($new_instance['navigation']);
        $instance['display_navigation'] = isset($new_instance['display_navigation']) && $new_instance['display_navigation'] === 'yes' ? 'yes' : 'no';

        return $instance;
    }
}

// Register the custom widget
function register_custom_widget()
{
    register_widget('LogoTextNavWidget');
}
add_action('widgets_init', 'register_custom_widget');
