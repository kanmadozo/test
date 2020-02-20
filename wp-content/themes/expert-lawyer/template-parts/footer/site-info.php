<?php
/**
 * Displays footer site info
 *
 * @package WordPress
 * @subpackage expert-lawyer
 * @since 1.0
 * @version 1.4
 */

?>

<div class="site-info">
	<p><?php echo esc_html(get_theme_mod('expert_lawyer_footer_copy',__('Copyright 2019 -','expert-lawyer'))); ?> <?php expert_lawyer_credit(); ?></p>
</div>