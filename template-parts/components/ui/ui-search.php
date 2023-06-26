<div id="search_overlay" class="transition duration-300 ease-in-out bg-[#197667]/90 fixed z-50 top-0 left-0 right-0 bottom-0 h-screen w-screen flex justify-center items-center ">
    <form role="search" method="get" class="search-form flex flex-col gap-4 w-6/12" action="<?php echo esc_url(home_url('/')); ?>">
        <span class="sr-only"><?php echo esc_html_x('Search for:', 'label', 'petlovethis'); ?></span>
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative w-full">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>

            <input type="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg outline-none bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'petlovethis'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
            <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> <?php echo esc_html_x('Search', 'submit button', 'petlovethis'); ?></button>

        </div>
        <div class="text-center cursor-pointer  flex search_close items-center justify-center text-white text-xl font-bold gap-4">
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-2xl">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>

            <p>Close the search</p>
        </div>
    </form>
</div>