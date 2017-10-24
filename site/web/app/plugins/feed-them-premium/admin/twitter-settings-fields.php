<?php
$twitter_popup_option = isset($twitter_popup_option) ? $twitter_popup_option : "";
$fts_bar_fb_prefix = isset($fts_bar_fb_prefix) ? $fts_bar_fb_prefix : "";
$twitter_load_more_option = isset($twitter_load_more_option) ? $twitter_load_more_option : "";
$twitter_load_more_style = isset($twitter_load_more_style) ? $twitter_load_more_style : "";

//Pop Up Option
$output .= '<div class="feed-them-social-admin-input-wrap">';
$output .= '<div class="feed-them-social-admin-input-label">' . __('Display Photos in Popup', 'feed-them-premium') . '</div>';
$output .= '<select name="twitter_popup_option" id="twitter-popup-option" class="feed-them-social-admin-input">';
$output .= '<option ' . selected($twitter_popup_option, 'no', false) . ' value="no">' . __('No', 'feed-them-premium') . '</option>';
$output .= '<option ' . selected($twitter_popup_option, 'yes', false) . ' value="yes">' . __('Yes', 'feed-them-premium') . '</option>';
$output .= '</select>';
$output .= '<div class="clear"></div>';
$output .= '</div><!--/feed-them-social-admin-input-wrap-->';

// twitter LOAD MORE OPTION
$output .= '<div class="feed-them-social-admin-input-wrap">';
$output .= '<div class="feed-them-social-admin-input-label">' . __('Load more posts', 'feed-them-premium') . '</div>';
$output .= '<select name="' . $fts_bar_fb_prefix . 'twitter_load_more_option" id="twitter_load_more_option" class="feed-them-social-admin-input">';
$output .= '<option ' . selected($twitter_load_more_option, 'yes', false) . ' value="yes">' . __('Yes', 'feed-them-premium') . '</option>';
$output .= '<option ' . selected($twitter_load_more_option, 'no', false) . ' value="no">' . __('No', 'feed-them-premium') . '</option>';
$output .= '</select>';
$output .= '<div class="clear"></div>';
$output .= '</div><!--/feed-them-social-admin-input-wrap-->';

// twitter LOAD MORE TYPE OPTION
$output .= '<div class="fts-twitter-load-more-options-wrap">';
$output .= '<div class="instructional-text"><strong>' . __('NOTE:', 'feed-them-premium') . '</strong> ' . __('The Button option will show a "Load More Posts" button under your feed. The AutoScroll option will load more posts when you reach the bottom of the feed. AutoScroll ONLY works if you\'ve filled in a Fixed Height for your feed.', 'feed-them-premium') . '</div>';
$output .= '<div class="feed-them-social-admin-input-wrap">';
$output .= '<div class="feed-them-social-admin-input-label">' . __('Load more style', 'feed-them-premium') . '</div>';
$output .= '<select name="' . $fts_bar_fb_prefix . 'twitter_load_more_style" id="twitter_load_more_style" class="feed-them-social-admin-input">';
$output .= '<option ' . selected($twitter_load_more_style, 'button', false) . ' value="button">' . __('Button', 'feed-them-premium') . '</option>';
$output .= '<option ' . selected($twitter_load_more_style, 'autoscroll', false) . ' value="autoscroll">' . __('AutoScroll', 'feed-them-premium') . '</option>';
$output .= '</select>';
$output .= '<div class="clear"></div>';
$output .= '</div><!--/feed-them-social-admin-input-wrap-->';
$output .= '</div><!--/fts-facebook-load-more-options-wrap-->';
?>