<?php
function get_breadcrumb()
{
    $output = '';

    if (!is_home() && !is_front_page()) {
        $output .= '<a href="' . esc_url(home_url('/')) . '">Home</a>';

        if (is_category() || is_single()) {
            $category = get_the_category();
            if ($category) {
                $output .= '<i class="fa-solid fa-chevron-right "></i>';
                $output .= '<a class="" href="' . esc_url(get_category_link($category[0]->term_id)) . '">' . $category[0]->cat_name . '</a>';
            }
        }

        if (is_single()) {
            $output .= '<i class=" fa-solid fa-chevron-right "></i> ';
            $output .= get_the_title();
        }
    }

    return $output;
}





//   Display pagination for archive pages.

function petlovethis_pagination($paged = '', $max_page = '')
{
    if (!$paged) {
        $paged = (get_query_var('paged')) ? get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : 1);
    }

    if (!$max_page) {
        global $wp_query;
        $max_page = isset($wp_query->max_num_pages) ? $wp_query->max_num_pages : 1;
    }

    $big  = 999999999; // need an unlikely integer

    $html = paginate_links(array(
        'base'       => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format'     => '?paged=%#%',
        'current'    => max(1, $paged),
        'total'      => $max_page,
        'mid_size'   => 1,
        'prev_text' => __('<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 rounded-2xl">
		<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
	  </svg>
	  '),
        'next_text' => __('<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 rounded-2xl">
		<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
	  </svg>
	  '),

    ));

    $html = "<div class='navigation pagination inline-flex  gap-2'>" . $html . "</div>";

    echo $html;
    // To Implement the code
    //  petlovethis_pagination($paged, $query->max_num_pages);
}
