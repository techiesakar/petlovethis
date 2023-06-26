<?php
						// Get the categories assigned to the post
						$categories = get_the_category();

						if (!empty($categories)) {
							echo '<div class="flex gap-2 m-0">';
							// Display only the first category
							$category = $categories[0];
							echo '<a class="px-3 py-1 rounded-lg bg-yellow-200 font-light text-sm" href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
							echo '</div>';
						} else {
							echo 'No categories found.';
						}
