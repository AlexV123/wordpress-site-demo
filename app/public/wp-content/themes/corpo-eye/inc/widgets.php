<?php
/**
 * Theme widgets.
 *
 * @package Corpo_Eye
 */

// Load widget base.
require_once get_template_directory() . '/lib/widget-base/class-widget-base.php';

if ( ! function_exists( 'corpo_eye_load_widgets' ) ) :

	/**
	 * Load widgets.
	 *
	 * @since 1.0.0
	 */
	function corpo_eye_load_widgets() {

		// Social widget.
		register_widget( 'Corpo_Eye_Social_Widget' );

		// Featured Page widget.
		register_widget( 'Corpo_Eye_Featured_Page_Widget' );

		// Latest News widget.
		register_widget( 'Corpo_Eye_Latest_News_Widget' );

		// Call To Action widget.
		register_widget( 'Corpo_Eye_Call_To_Action_Widget' );

		// Services widget.
		register_widget( 'Corpo_Eye_Services_Widget' );

		// Recent Posts widget.
		register_widget( 'Corpo_Eye_Recent_Posts_Widget' );
	}

endif;

add_action( 'widgets_init', 'corpo_eye_load_widgets' );

if ( ! class_exists( 'Corpo_Eye_Social_Widget' ) ) :

	/**
	 * Social widget Class.
	 *
	 * @since 1.0.0
	 */
	class Corpo_Eye_Social_Widget extends Corpo_Eye_Widget_Base {

		/**
		 * Sets up a new widget instance.
		 *
		 * @since 1.0.0
		 */
		function __construct() {

			$opts = array(
				'classname'                   => 'corpo_eye_widget_social',
				'description'                 => __( 'Displays social icons.', 'corpo-eye' ),
				'customize_selective_refresh' => true,
				);
			$fields = array(
				'title' => array(
					'label' => __( 'Title:', 'corpo-eye' ),
					'type'  => 'text',
					'class' => 'widefat',
					),
				'subtitle' => array(
					'label' => __( 'Subtitle:', 'corpo-eye' ),
					'type'  => 'text',
					'class' => 'widefat',
					),
				);

			if ( false === has_nav_menu( 'social' ) ) {
				$fields['message'] = array(
					'label' => __( 'Social menu is not set. Please create menu and assign it to Social Menu.', 'corpo-eye' ),
					'type'  => 'message',
					'class' => 'widefat',
					);
			}

			parent::__construct( 'corpo-eye-social', __( 'CE: Social', 'corpo-eye' ), $opts, array(), $fields );

		}

		/**
		 * Outputs the content for the current widget instance.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args     Display arguments.
		 * @param array $instance Settings for the current widget instance.
		 */
		function widget( $args, $instance ) {

			$params = $this->get_params( $instance );

			echo $args['before_widget'];

			if ( ! empty( $params['title'] ) ) {
				echo $args['before_title'] . $params['title'] . $args['after_title'];
			}

			if ( ! empty( $params['subtitle'] ) ) {
				echo '<p class="widget-subtitle">' . esc_html( $params['subtitle'] ) . '</p>';
			}

			if ( has_nav_menu( 'social' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'social',
					'container'      => false,
					'depth'          => 1,
					'link_before'    => '<span class="screen-reader-text">',
					'link_after'     => '</span>',
				) );
			}

			echo $args['after_widget'];

		}
	}
endif;

if ( ! class_exists( 'Corpo_Eye_Featured_Page_Widget' ) ) :

	/**
	 * Featured page widget Class.
	 *
	 * @since 1.0.0
	 */
	class Corpo_Eye_Featured_Page_Widget extends Corpo_Eye_Widget_Base {

		/**
		 * Sets up a new widget instance.
		 *
		 * @since 1.0.0
		 */
		function __construct() {

			$opts = array(
				'classname'                   => 'corpo_eye_widget_featured_page',
				'description'                 => __( 'Displays single featured Page or Post.', 'corpo-eye' ),
				'customize_selective_refresh' => true,
				);
			$fields = array(
				'title' => array(
					'label' => __( 'Title:', 'corpo-eye' ),
					'type'  => 'text',
					'class' => 'widefat',
					),
				'use_page_title' => array(
					'label'   => __( 'Use Page/Post Title as Widget Title', 'corpo-eye' ),
					'type'    => 'checkbox',
					'default' => true,
					),
				'subtitle' => array(
					'label' => __( 'Subtitle:', 'corpo-eye' ),
					'type'  => 'text',
					'class' => 'widefat',
					),
				'featured_page' => array(
					'label'            => __( 'Select Page:', 'corpo-eye' ),
					'type'             => 'dropdown-pages',
					'show_option_none' => __( '&mdash; Select &mdash;', 'corpo-eye' ),
					),
				'id_message' => array(
					'label'            => '<strong>' . _x( 'OR', 'Featured Page Widget', 'corpo-eye' ) . '</strong>',
					'type'             => 'message',
					),
				'featured_post' => array(
					'label'             => __( 'Post ID:', 'corpo-eye' ),
					'placeholder'       => __( 'Eg: 1234', 'corpo-eye' ),
					'type'              => 'text',
					'sanitize_callback' => 'corpo_eye_widget_sanitize_post_id',
					),
				'content_type' => array(
					'label'   => __( 'Show Content:', 'corpo-eye' ),
					'type'    => 'select',
					'default' => 'full',
					'options' => array(
						'excerpt' => __( 'Excerpt', 'corpo-eye' ),
						'full'    => __( 'Full', 'corpo-eye' ),
						),
					),
				'excerpt_length' => array(
					'label'       => __( 'Excerpt Length:', 'corpo-eye' ),
					'description' => __( 'Applies when Excerpt is selected in Content option.', 'corpo-eye' ),
					'type'        => 'number',
					'css'         => 'max-width:60px;',
					'default'     => 100,
					'min'         => 1,
					'max'         => 400,
					),
				'featured_image' => array(
					'label'   => __( 'Featured Image:', 'corpo-eye' ),
					'type'    => 'select',
					'options' => corpo_eye_get_image_sizes_options(),
					),
				'featured_image_alignment' => array(
					'label'   => __( 'Image Alignment:', 'corpo-eye' ),
					'type'    => 'select',
					'default' => 'center',
					'options' => corpo_eye_get_image_alignment_options(),
					),
				);

			parent::__construct( 'corpo-eye-featured-page', __( 'CE: Featured Page', 'corpo-eye' ), $opts, array(), $fields );

		}

		/**
		 * Outputs the content for the current widget instance.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args     Display arguments.
		 * @param array $instance Settings for the current widget instance.
		 */
		function widget( $args, $instance ) {

			$params = $this->get_params( $instance );

			echo $args['before_widget'];

			$our_id = '';

			if ( absint( $params['featured_post'] ) > 0 ) {
				$our_id = absint( $params['featured_post'] );
			}

			if ( absint( $params['featured_page'] ) > 0 ) {
				$our_id = absint( $params['featured_page'] );
			}

			if ( absint( $our_id ) > 0 ) {
				$qargs = array(
					'p'             => absint( $our_id ),
					'post_type'     => 'any',
					'no_found_rows' => true,
					);

				$the_query = new WP_Query( $qargs );
				if ( $the_query->have_posts() ) {

					while ( $the_query->have_posts() ) {
						$the_query->the_post();

						echo '<div class="featured-page-widget entry-content">';

						if ( 'disable' != $params['featured_image'] && has_post_thumbnail() ) {
							the_post_thumbnail( esc_attr( $params['featured_image'] ), array( 'class' => 'align' . esc_attr( $params['featured_image_alignment'] ) ) );
						}

						echo '<div class="featured-page-content">';

						if ( true === $params['use_page_title'] ) {
							the_title( $args['before_title'], $args['after_title'] );
						} else {
							if ( $params['title'] ) {
								echo $args['before_title'] . $params['title'] . $args['after_title'];
							}
						}

						if ( ! empty( $params['subtitle'] ) ) {
							echo '<p class="widget-subtitle">' . esc_html( $params['subtitle'] ) . '</p>';
						}

						if ( 'excerpt' === $params['content_type'] && absint( $params['excerpt_length'] ) > 0 ) {
							$excerpt = corpo_eye_the_excerpt( absint( $params['excerpt_length'] ) );
							echo wp_kses_post( wpautop( $excerpt ) );
							echo '<a href="'  . esc_url( get_permalink() ) . '" class="more-link">' . esc_html__( 'Read more', 'corpo-eye' ) . '</a>';
						} else {
							the_content();
						}

						echo '</div><!-- .featured-page-content -->';
						echo '</div><!-- .featured-page-widget -->';
					}

					wp_reset_postdata();
				}

			}

			echo $args['after_widget'];
		}
	}
endif;

if ( ! class_exists( 'Corpo_Eye_Latest_News_Widget' ) ) :

	/**
	 * Latest news widget Class.
	 *
	 * @since 1.0.0
	 */
	class Corpo_Eye_Latest_News_Widget extends Corpo_Eye_Widget_Base {

		/**
		 * Sets up a new widget instance.
		 *
		 * @since 1.0.0
		 */
		function __construct() {
			$opts = array(
				'classname'                   => 'corpo_eye_widget_latest_news',
				'description'                 => __( 'Displays latest posts in grid.', 'corpo-eye' ),
				'customize_selective_refresh' => true,
				);
			$fields = array(
				'title' => array(
					'label' => __( 'Title:', 'corpo-eye' ),
					'type'  => 'text',
					'class' => 'widefat',
					),
				'subtitle' => array(
					'label' => __( 'Subtitle:', 'corpo-eye' ),
					'type'  => 'text',
					'class' => 'widefat',
					),
				'post_category' => array(
					'label'           => __( 'Select Category:', 'corpo-eye' ),
					'type'            => 'dropdown-taxonomies',
					'show_option_all' => __( 'All Categories', 'corpo-eye' ),
					),
				'post_number' => array(
					'label'   => __( 'Number of Posts:', 'corpo-eye' ),
					'type'    => 'number',
					'default' => 3,
					'css'     => 'max-width:60px;',
					'min'     => 1,
					'max'     => 100,
					),
				'post_column' => array(
					'label'   => __( 'Number of Columns:', 'corpo-eye' ),
					'type'    => 'select',
					'default' => 3,
					'options' => corpo_eye_get_numbers_dropdown_options( 1, 4 ),
					),
				'featured_image' => array(
					'label'   => __( 'Featured Image:', 'corpo-eye' ),
					'type'    => 'select',
					'default' => 'corpo-eye-thumb',
					'options' => corpo_eye_get_image_sizes_options(),
					),
				'excerpt_length' => array(
					'label'       => __( 'Excerpt Length:', 'corpo-eye' ),
					'description' => __( 'in words', 'corpo-eye' ),
					'type'        => 'number',
					'css'         => 'max-width:60px;',
					'default'     => 15,
					'min'         => 1,
					'max'         => 400,
					'adjacent'    => true,
					),
				'more_text' => array(
					'label'   => __( 'More Text:', 'corpo-eye' ),
					'type'    => 'text',
					'default' => __( 'Read more', 'corpo-eye' ),
					),
				'disable_date' => array(
					'label'   => __( 'Disable Date', 'corpo-eye' ),
					'type'    => 'checkbox',
					'default' => false,
					),
				'disable_excerpt' => array(
					'label'   => __( 'Disable Excerpt', 'corpo-eye' ),
					'type'    => 'checkbox',
					'default' => false,
					),
				'disable_more_text' => array(
					'label'   => __( 'Disable More Text', 'corpo-eye' ),
					'type'    => 'checkbox',
					'default' => false,
					),
				);

			parent::__construct( 'corpo-eye-latest-news', __( 'CE: Latest News', 'corpo-eye' ), $opts, array(), $fields );
		}

		/**
		 * Outputs the content for the current widget instance.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args     Display arguments.
		 * @param array $instance Settings for the current widget instance.
		 */
		function widget( $args, $instance ) {

			$params = $this->get_params( $instance );

			echo $args['before_widget'];

			if ( ! empty( $params['title'] ) ) {
				echo $args['before_title'] . $params['title'] . $args['after_title'];
			}

			if ( ! empty( $params['subtitle'] ) ) {
				echo '<p class="widget-subtitle">' . esc_html( $params['subtitle'] ) . '</p>';
			}

			$qargs = array(
				'posts_per_page' => esc_attr( $params['post_number'] ),
				'no_found_rows'  => true,
				);
			if ( absint( $params['post_category'] ) > 0 ) {
				$qargs['cat'] = absint( $params['post_category'] );
			}
			$all_posts = get_posts( $qargs );
			?>
			<?php if ( ! empty( $all_posts ) ) : ?>

				<?php global $post; ?>

				<div class="latest-news-widget latest-news-col-<?php echo esc_attr( $params['post_column'] ); ?>">

					<div class="inner-wrapper">

						<?php foreach ( $all_posts as $key => $post ) : ?>
							<?php setup_postdata( $post ); ?>

							<div class="latest-news-item">

									<?php if ( 'disable' !== $params['featured_image'] && has_post_thumbnail() ) : ?>
										<div class="latest-news-thumb">
											<div class="latest-news-meta">
												<?php if ( false === $params['disable_date'] ) : ?>
													<span class="latest-news-date"><span class="news-meta-date"><?php the_time( _x( 'd', 'date format', 'corpo-eye' ) ); ?></span><span class="news-meta-months"><?php the_time( _x( 'M', 'date format', 'corpo-eye' ) ); ?></span>
												<?php endif; ?>
											</div><!-- .latest-news-meta -->
											<a href="<?php the_permalink(); ?>">
												<?php
												$img_attributes = array( 'class' => 'aligncenter' );
												the_post_thumbnail( esc_attr( $params['featured_image'] ), $img_attributes );
												?>
											</a>
										</div><!-- .latest-news-thumb -->
									<?php endif; ?>
									<div class="latest-news-text-wrap">

										<div class="latest-news-text-content">
											<h3 class="latest-news-title">
												<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											</h3><!-- .latest-news-title -->

											<?php if ( false === $params['disable_excerpt'] ) :  ?>
												<div class="latest-news-summary">
												<?php
												$summary = corpo_eye_the_excerpt( esc_attr( $params['excerpt_length'] ), $post );
												echo wp_kses_post( wpautop( $summary ) );
												?>
												</div><!-- .latest-news-summary -->
											<?php endif; ?>
										</div><!-- .latest-news-text-content -->

										<?php if ( false === $params['disable_date'] || false === $params['disable_more_text'] ) : ?>

													<?php if ( false === $params['disable_more_text'] ) :  ?>
												<a href="<?php the_permalink(); ?>" class="custom-button"><?php echo esc_html( $params['more_text'] ); ?><span class="screen-reader-text">"<?php the_title(); ?>"</span>
														</a>
													<?php endif; ?>

										<?php endif; ?>

									</div><!-- .latest-news-text-wrap -->

							</div><!-- .latest-news-item -->

						<?php endforeach; ?>
					</div><!-- .row -->

				</div><!-- .latest-news-widget -->

				<?php wp_reset_postdata(); ?>

			<?php endif; ?>

			<?php echo $args['after_widget'];

		}
	}
endif;

if ( ! class_exists( 'Corpo_Eye_Call_To_Action_Widget' ) ) :

	/**
	 * Call to action widget Class.
	 *
	 * @since 1.0.0
	 */
	class Corpo_Eye_Call_To_Action_Widget extends Corpo_Eye_Widget_Base {

		/**
		 * Sets up a new widget instance.
		 *
		 * @since 1.0.0
		 */
		function __construct() {

			$opts = array(
				'classname'                   => 'corpo_eye_widget_call_to_action',
				'description'                 => __( 'Call To Action Widget.', 'corpo-eye' ),
				'customize_selective_refresh' => true,
				);
			$fields = array(
				'title' => array(
					'label' => __( 'Title:', 'corpo-eye' ),
					'type'  => 'text',
					'class' => 'widefat',
					),
				'description' => array(
					'label' => __( 'Description:', 'corpo-eye' ),
					'type'  => 'text',
					'class' => 'widefat',
					),
				'primary_button_text' => array(
					'label'   => __( 'Primary Button Text:', 'corpo-eye' ),
					'default' => __( 'Learn more', 'corpo-eye' ),
					'type'    => 'text',
					'class'   => 'widefat',
					),
				'primary_button_url' => array(
					'label' => __( 'Primary Button URL:', 'corpo-eye' ),
					'type'  => 'url',
					'class' => 'widefat',
					),
				'secondary_button_text' => array(
					'label'   => __( 'Secondary Button Text:', 'corpo-eye' ),
					'default' => '',
					'type'    => 'text',
					'class'   => 'widefat',
					),
				'secondary_button_url' => array(
					'label' => __( 'Secondary Button URL:', 'corpo-eye' ),
					'type'  => 'url',
					'class' => 'widefat',
					),
				);

			parent::__construct( 'corpo-eye-call-to-action', __( 'CE: Call To Action', 'corpo-eye' ), $opts, array(), $fields );

		}

		/**
		 * Outputs the content for the current widget instance.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args     Display arguments.
		 * @param array $instance Settings for the current widget instance.
		 */
		function widget( $args, $instance ) {

			$params = $this->get_params( $instance );

			echo $args['before_widget'];

			if ( ! empty( $params['title'] ) ) {
				echo $args['before_title'] . $params['title'] . $args['after_title'];
			}
			?>
			<div class="call-to-action-content">
				<?php if ( ! empty( $params['description'] ) ) : ?>
				    <div class="call-to-action-description">
				        <?php echo wp_kses_post( wpautop( $params['description'] ) ); ?>
				    </div><!-- .call-to-action-description -->
				<?php endif; ?>
				<?php if ( ! empty( $params['primary_button_text'] ) || ! empty( $params['secondary_button_text'] ) ) : ?>
					<div class="call-to-action-buttons">
						<?php if ( ! empty( $params['primary_button_text'] ) ) : ?>
							<a href="<?php echo esc_url( $params['primary_button_url'] ); ?>" class="custom-button btn-call-to-action btn-call-to-primary"><?php echo esc_html( $params['primary_button_text'] ); ?></a>
						<?php endif; ?>
						<?php if ( ! empty( $params['secondary_button_text'] ) ) : ?>
							<a href="<?php echo esc_url( $params['secondary_button_url'] ); ?>" class="custom-button btn-call-to-action btn-call-to-secondary"><?php echo esc_html( $params['secondary_button_text'] ); ?></a>
						<?php endif; ?>
					</div><!-- .call-to-action-buttons -->
				<?php endif; ?>
			</div><!-- .call-to-action-content -->
			<?php

			echo $args['after_widget'];

		}
	}
endif;

if ( ! class_exists( 'Corpo_Eye_Services_Widget' ) ) :

	/**
	 * Services widget Class.
	 *
	 * @since 1.0.0
	 */
	class Corpo_Eye_Services_Widget extends Corpo_Eye_Widget_Base {

		/**
		 * Sets up a new widget instance.
		 *
		 * @since 1.0.0
		 */
		function __construct() {

			$opts = array(
				'classname'                   => 'corpo_eye_widget_services',
				'description'                 => __( 'Show your services with icon and read more link.', 'corpo-eye' ),
				'customize_selective_refresh' => true,
				);
			$fields = array(
				'title' => array(
					'label' => __( 'Title:', 'corpo-eye' ),
					'type'  => 'text',
					'class' => 'widefat',
					),
				'subtitle' => array(
					'label' => __( 'Subtitle:', 'corpo-eye' ),
					'type'  => 'text',
					'class' => 'widefat',
					),
				'excerpt_length' => array(
					'label'       => __( 'Excerpt Length:', 'corpo-eye' ),
					'description' => __( 'in words', 'corpo-eye' ),
					'type'        => 'number',
					'css'         => 'max-width:60px;',
					'default'     => 15,
					'min'         => 1,
					'max'         => 400,
					'adjacent'    => true,
					),
				'disable_excerpt' => array(
					'label'   => __( 'Disable Excerpt', 'corpo-eye' ),
					'type'    => 'checkbox',
					'default' => false,
					),
				'more_text' => array(
					'label'   => __( 'Read More Text:', 'corpo-eye' ),
					'type'    => 'text',
					'default' => __( 'Read more', 'corpo-eye' ),
					),
				'disable_more_text' => array(
					'label'   => __( 'Disable Read More', 'corpo-eye' ),
					'type'    => 'checkbox',
					'default' => false,
					),
				);

			for( $i = 1; $i <= 4; $i++ ) {
				$fields[ 'block_heading_' . $i ] = array(
					'label' => __( 'Block', 'corpo-eye' ) . ' #' . $i,
					'type'  => 'heading',
					'class' => 'widefat',
					);
				$fields[ 'block_page_' . $i ] = array(
					'label'            => __( 'Select Page:', 'corpo-eye' ),
					'type'             => 'dropdown-pages',
					'show_option_none' => __( '&mdash; Select &mdash;', 'corpo-eye' ),
					);
				$fields[ 'block_icon_' . $i ] = array(
					'label'       => __( 'Icon:', 'corpo-eye' ),
					'description' => __( 'Eg: fa-cogs', 'corpo-eye' ),
					'type'        => 'text',
					'default'     => 'fa-cogs',
					);
			}

			parent::__construct( 'corpo-eye-services', __( 'CE: Services', 'corpo-eye' ), $opts, array(), $fields );

		}

		/**
		 * Outputs the content for the current widget instance.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args     Display arguments.
		 * @param array $instance Settings for the current widget instance.
		 */
		function widget( $args, $instance ) {

			$params = $this->get_params( $instance );

			echo $args['before_widget'];

			if ( ! empty( $params['title'] ) ) {
				echo $args['before_title'] . $params['title'] . $args['after_title'];
			}
			if ( ! empty( $params['subtitle'] ) ) {
				echo '<p class="widget-subtitle">' . esc_html( $params['subtitle'] ) . '</p>';
			}

			$service_arr = array();
			for ( $i = 0; $i < 4 ; $i++ ) {
				$block = ( $i + 1 );
				$service_arr[ $i ] = array(
					'page' => $params[ 'block_page_' . $block ],
					'icon' => $params[ 'block_icon_' . $block ],
					);
			}
			$refined_arr = array();
			if ( ! empty( $service_arr ) ) {
				foreach ( $service_arr as $item ) {
					if ( ! empty( $item['page'] ) ) {
						$refined_arr[ $item['page'] ] = $item;
					}
				}
			}

			if ( ! empty( $refined_arr ) ) {
				$this->render_widget_content( $refined_arr, $params );
			}

			echo $args['after_widget'];

		}

		/**
		 * Render services content.
		 *
		 * @since 1.0.0
		 *
		 * @param array $service_arr Services array.
		 * @param array $params      Parameters array.
		 */
		function render_widget_content( $service_arr, $params ) {

			$column = count( $service_arr );

			$page_ids = array_keys( $service_arr );

			$qargs = array(
				'post__in'      => $page_ids,
				'post_type'     => 'page',
				'orderby'       => 'post__in',
				'no_found_rows' => true,
				);

			$all_posts = get_posts( $qargs );
			?>
			<?php if ( ! empty( $all_posts ) ) :  ?>

				<?php global $post; ?>

				<div class="service-block-list service-col-<?php echo esc_attr( $column ); ?>">
					<div class="inner-wrapper">

						<?php foreach ( $all_posts as $post ) :  ?>
							<?php setup_postdata( $post ); ?>
							<div class="service-block-item">
								<div class="service-block-inner">
									<?php if ( isset( $service_arr[ $post->ID ]['icon'] ) && ! empty( $service_arr[ $post->ID ]['icon'] ) ) : ?>
										<a class="service-icon" href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>"><i class="<?php echo 'fa ' . esc_attr( $service_arr[ $post->ID ]['icon'] ); ?>"></i></a>
									<?php endif; ?>
									<div class="service-block-inner-content">
										<h3 class="service-item-title">
											<a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>">
												<?php echo get_the_title( $post->ID ); ?>
											</a>
										</h3>
										<?php if ( true !== $params['disable_excerpt'] ) :  ?>
											<div class="service-block-item-excerpt">
												<?php
												$excerpt = corpo_eye_the_excerpt( $params['excerpt_length'], $post );
												echo wp_kses_post( wpautop( $excerpt ) );
												?>
											</div><!-- .service-block-item-excerpt -->
										<?php endif; ?>

										<?php if ( true !== $params['disable_more_text'] ) :  ?>
											<a href="<?php echo esc_url( get_permalink( $post -> ID ) ); ?>" class="more-link"><?php echo esc_html( $params['more_text'] ); ?></a>
										<?php endif; ?>
									</div><!-- .service-block-inner-content -->
								</div><!-- .service-block-inner -->
							</div><!-- .service-block-item -->
						<?php endforeach; ?>

					</div><!-- .inner-wrapper -->

				</div><!-- .service-block-list -->

				<?php wp_reset_postdata(); ?>

			<?php endif; ?>

			<?php
		}

	}
endif;

if ( ! class_exists( 'Corpo_Eye_Recent_Posts_Widget' ) ) :

	/**
	 * Recent posts widget Class.
	 *
	 * @since 1.0.0
	 */
	class Corpo_Eye_Recent_Posts_Widget extends Corpo_Eye_Widget_Base {

		/**
		 * Sets up a new widget instance.
		 *
		 * @since 1.0.0
		 */
		function __construct() {

			$opts = array(
				'classname'                   => 'corpo_eye_widget_recent_posts',
				'description'                 => __( 'Displays recent posts.', 'corpo-eye' ),
				'customize_selective_refresh' => true,
				);
			$fields = array(
				'title' => array(
					'label' => __( 'Title:', 'corpo-eye' ),
					'type'  => 'text',
					'class' => 'widefat',
					),
				'subtitle' => array(
					'label' => __( 'Subtitle:', 'corpo-eye' ),
					'type'  => 'text',
					'class' => 'widefat',
					),
				'post_category' => array(
					'label'           => __( 'Select Category:', 'corpo-eye' ),
					'type'            => 'dropdown-taxonomies',
					'show_option_all' => __( 'All Categories', 'corpo-eye' ),
					),
				'post_number' => array(
					'label'   => __( 'Number of Posts:', 'corpo-eye' ),
					'type'    => 'number',
					'default' => 4,
					'css'     => 'max-width:60px;',
					'min'     => 1,
					'max'     => 100,
					),
				'featured_image' => array(
					'label'   => __( 'Featured Image:', 'corpo-eye' ),
					'type'    => 'select',
					'default' => 'thumbnail',
					'options' => corpo_eye_get_image_sizes_options( true, array( 'disable', 'thumbnail' ), false ),
					),
				'image_width' => array(
					'label'       => __( 'Image Width:', 'corpo-eye' ),
					'type'        => 'number',
					'description' => __( 'px', 'corpo-eye' ),
					'css'         => 'max-width:60px;',
					'adjacent'    => true,
					'default'     => 70,
					'min'         => 1,
					'max'         => 150,
					),
				'disable_date' => array(
					'label'   => __( 'Disable Date', 'corpo-eye' ),
					'type'    => 'checkbox',
					'default' => false,
					),
				);

			parent::__construct( 'corpo-eye-recent-posts', __( 'CE: Recent Posts', 'corpo-eye' ), $opts, array(), $fields );

		}

		/**
		 * Outputs the content for the current widget instance.
		 *
		 * @since 1.0.0
		 *
		 * @param array $args     Display arguments.
		 * @param array $instance Settings for the current widget instance.
		 */
		function widget( $args, $instance ) {

			$params = $this->get_params( $instance );

			echo $args['before_widget'];

			if ( ! empty( $params['title'] ) ) {
				echo $args['before_title'] . $params['title'] . $args['after_title'];
			}
			if ( ! empty( $params['subtitle'] ) ) {
				echo '<p class="widget-subtitle">' . esc_html( $params['subtitle'] ) . '</p>';
			}
			$qargs = array(
				'posts_per_page' => esc_attr( $params['post_number'] ),
				'no_found_rows'  => true,
				);
			if ( absint( $params['post_category'] ) > 0 ) {
				$qargs['cat'] = $params['post_category'];
			}
			$all_posts = get_posts( $qargs );

			?>
			<?php if ( ! empty( $all_posts ) ) :  ?>

				<?php global $post; ?>

				<div class="recent-posts-wrapper">

					<?php foreach ( $all_posts as $key => $post ) :  ?>
						<?php setup_postdata( $post ); ?>

						<div class="recent-posts-item">

							<?php if ( 'disable' !== $params['featured_image'] && has_post_thumbnail() ) :  ?>
								<div class="recent-posts-thumb">
									<a href="<?php the_permalink(); ?>">
										<?php
										$img_attributes = array(
											'class' => 'alignleft',
											'style' => 'max-width:' . esc_attr( $params['image_width'] ). 'px;',
											);
										the_post_thumbnail( esc_attr( $params['featured_image'] ), $img_attributes );
										?>
									</a>
								</div><!-- .recent-posts-thumb -->
							<?php endif ?>
							<div class="recent-posts-text-wrap">
								<h3 class="recent-posts-title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h3><!-- .recent-posts-title -->

								<?php if ( false === $params['disable_date'] ) :  ?>
									<div class="recent-posts-meta">

										<?php if ( false === $params['disable_date'] ) :  ?>
											<span class="recent-posts-date"><?php the_time( get_option( 'date_format' ) ); ?></span><!-- .recent-posts-date -->
										<?php endif; ?>

									</div><!-- .recent-posts-meta -->
								<?php endif; ?>

							</div><!-- .recent-posts-text-wrap -->

						</div><!-- .recent-posts-item -->

					<?php endforeach; ?>

				</div><!-- .recent-posts-wrapper -->

				<?php wp_reset_postdata(); // Reset. ?>

			<?php endif; ?>

			<?php
			echo $args['after_widget'];

		}
	}
endif;
