<?php
/**
 * The template for displaying search forms in Twenty Eleven
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url( get_home_url( '/' ) ); ?>">
        <label class="icon-search">&nbsp;</label>
		<label for="s" class="assistive-text assistive-tzsearch"><?php esc_attr_e( 'Search', 'plazarttheme' ); ?></label>
		<input type="text" class="field Tzsearchform inputbox search-query" name="s" id="s" placeholder="<?php esc_attr_e( 'Search...', 'plazarttheme' ); ?>" />
		<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'plazarttheme' ); ?>" />
	</form>
