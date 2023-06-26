<?php

/**
 * Shortcode callback function to display social links.
 *
 * @param array $atts Shortcode attributes.
 *
 * @return string Generated social links HTML.
 */
function petlovethis_social_links_shortcode($atts)
{
    $social_links = array('facebook', 'tiktok', 'instagram', 'linkedin', 'twitter', 'whatsapp');

    $html = '';

    foreach ($social_links as $platform) {
        $link = get_theme_mod("petlovethis_{$platform}_link");
        if ($link) {
            $icon = '';

            switch ($platform) {
                case 'facebook':
                    $icon = 'fa-brands text-[#222222]  fa-facebook-f';
                    break;
                case 'tiktok':
                    $icon = 'fa-brands text-[#222222]  fa-tiktok ';
                    break;
                case 'instagram':
                    $icon = 'fa-brands text-[#222222]  fa-instagram';
                    break;
                case 'linkedin':
                    $icon = 'fab text-[#222222] fa-linkedin';
                    break;
                case 'twitter':
                    $icon = 'fa-brands text-[#222222]  fa-twitter ';
                    break;
                case 'whatsapp':
                    $icon = 'fa-brands text-[#222222]  fa-whatsapp';
                    break;
            }
            $html .= '<a href="' . esc_url($link) . '" class="flex items-center justify-center bg-white  w-10 h-10 rounded-full"><i class="' . $icon . '"></i></a>';
        }
    }

    return $html;
}
add_shortcode('petlovethis_social_links', 'petlovethis_social_links_shortcode');
