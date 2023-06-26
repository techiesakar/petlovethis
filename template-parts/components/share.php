<?php
$postURL = urlencode(get_the_permalink());
$postTitle = get_the_title();
$postIMG = urlencode(get_the_post_thumbnail_url());
$facebookURL = 'https://www.facebook.com/sharer.php?u=';
$twitterURL = 'https://twitter.com/share?url=';
$linkedinURL = "https://www.linkedin.com/sharing/share-offsite/?url=";
$pinterestURL = "https://pinterest.com/pin/create/bookmarklet/?media=";

?>
<ul class="flex gap-4 items-center text-xl md:text-2xl">
    <li>
        <a target="popup" href="<?php echo $facebookURL . $postURL; ?>" class="sharebtn facebook-btn " onclick="window.open('<?php echo $facebookURL . $postURL; ?>','popup','width=600,height=600'); return false;">
            <i class="fa-brands fa-facebook"></i>

        </a>
    </li>
    <li>
        <a target="popup" href="<?php echo $twitterURL . $postURL . '&text' . '=' . $postTitle; ?>" class="sharebtn twitter-btn" onclick="window.open('<?php echo $twitterURL . $postURL . '&text' . '=' . $postTitle; ?>','popup','width=600,height=600'); return false;">
            <i class="fa-brands fa-twitter"></i>
        </a>
    </li>
    <li>
        <a target="popup" href="<?php echo $linkedinURL . $postURL ?>" class="sharebtn linkedin-btn" onclick="window.open('<?php echo $linkedinURL . $postURL ?>','popup','width=600,height=600'); return false;">
            <i class="fa-brands fa-linkedin"></i>
        </a>
    </li>
    <li>
        <a target="popup" href="<?php echo $pinterestURL . $postIMG . '&url=' . $postURL . '&description=' . $postTitle; ?>" class="sharebtn pinterest-btn" onclick="window.open('<?php echo $pinterestURL . $postIMG . '&url=' . $postURL . '&description=' . $postTitle; ?>','popup','width=600,height=600'); return false;">
            <i class="fa-brands fa-pinterest"></i>
        </a>
    </li>
</ul>