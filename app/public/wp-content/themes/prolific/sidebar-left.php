<?php
/**
 * The left sidebar containing the main widget area.
 */
if ( ! is_active_sidebar( 'prolific-sidebar' ) ) {
    return;
}
$sidebar_layout = prolific_sidebar_selection();
?>
<?php if( $sidebar_layout == "left-sidebar" ) : ?>
    <div id="secondary-left" class="widget-area at-remove-width sidebar secondary-sidebar" role="complementary">
        <div id="sidebar-section-top" class="widget-area sidebar clearfix">
            <?php dynamic_sidebar( 'prolific-sidebar' ); ?>
        </div>
    </div>
<?php endif;