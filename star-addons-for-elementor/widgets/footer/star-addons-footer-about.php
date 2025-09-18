<?php

class star_addons_about_us extends WP_Widget {
    public function __construct() {
    	parent::__construct('star_addons_about_us', __('Star Addons About Us', 'star-addons-for-elementor'), array(
            'description' => __( 'This is about us widget.', 'star-addons-for-elementor')
    	));
    }
    
    public function widget( $args, $instance ) { ?>

    	<div class="col-lg-3 col-sm-12 col-md-6">		
			<div class="single-footer-widget pl-0">	
				<?php $title = $instance['title']; 
				if( isset( $title ) && ! $title == '' ) : ?>
	    	        <h3><?php echo esc_attr( $title ); ?></h3>
	    	    <?php endif; 
	    	    $logo = $instance['logo']; 
	    	    if( isset( $logo ) ) : ?>
					<a class="logo" href="<?php echo esc_url( home_url() ); ?>">
	                    <img src="<?php echo esc_url( $logo ); ?>" />
	                </a>
			    <?php endif; 
			    $desc = $instance['desc']; ?>
					<p><?php echo esc_attr( $desc ); ?></p>
	            <?php 
				if( isset( $instance['show-social'] ) ) : 
					$show_social = $instance['show-social']; ?>
					<ul class="social-links">
						<?php $fb = $instance['fb'];
						if( ! $fb == '' ) : ?>
                            <li><a href="<?php echo esc_url( $fb ); ?>" class="facebook"><i class="fa fa-facebook"></i></a></li>
                        <?php endif;
                        $tw = $instance['tw'];
						if( ! $tw == '' ) : ?>
                            <li><a href="<?php echo esc_url( $tw ); ?>" class="twitter"><i class="fa fa-twitter"></i></a></li>
                        <?php endif; 
                        $in = $instance['in'];
                        if( ! $in == '' ) : ?>
                            <li><a href="<?php echo esc_url( $in ); ?>" class="instagram"><i class="fa fa-instagram"></i></a></li>
                        <?php endif; 
                        $li = $instance['li'];
                        if( ! $li == '' ) : ?>
                            <li><a href="<?php echo esc_url( $li ); ?>" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                        <?php endif;  
                        $yt = $instance['yt'];
                        if( ! $yt == '' ) : ?>
                            <li><a href="<?php echo esc_url( $yt ); ?>" class="youtube"><i class="fa fa-youtube-play"></i></a></li>
                        <?php endif; ?>
					</ul>					
				<?php endif; ?>
			</div>
		</div>	
		
    <?php }

    public function form( $instance ) {
        if( isset( $instance['title'] ) ) :
    	    $title = $instance['title'];
        endif;
        if( isset( $instance['logo'] ) ) :
    	    $logo = $instance['logo'];
        endif;
        if( isset( $instance['desc'] ) ) :
            $desc = $instance['desc'];
        endif;
        if( isset( $instance['show-social'] ) ) :
            $show_social = $instance['show-social'];
        endif; 
        if( isset( $instance['fb'] ) ) :
    	    $fb = $instance['fb'];
        endif;
        if( isset( $instance['tw'] ) ) :
    	    $tw = $instance['tw'];
        endif;
        if( isset( $instance['in'] ) ) :
    	    $in = $instance['in'];
        endif; 
        if( isset( $instance['li'] ) ) :
    	    $li = $instance['li'];
        endif;
         if( isset( $instance['yt'] ) ) :
    	    $yt = $instance['yt'];
        endif;
    ?>

    <P>
        <label for="<?php echo esc_html( $this->get_field_id('title') ); ?>"><?php echo __( 'Title:', 'star-addons-for-elementor'); ?></label>
    </p>

    <p>
       <input type="text" class="widefat" id="<?php echo esc_html( $this->get_field_id('title') ); ?>" name="<?php echo esc_html( $this->get_field_name('title') ); ?>" value="<?php if( isset( $title ) ) : echo esc_attr( $title ); endif; ?>">
    </p>

    <P>
        <label for="<?php echo esc_html( $this->get_field_id('logo') ); ?>"><?php echo __( 'Logo URL:', 'star-addons-for-elementor'); ?></label>
    </p>

    <p>
       <input type="text" class="widefat" id="<?php echo esc_html( $this->get_field_id('logo') ); ?>" name="<?php echo esc_html( $this->get_field_name('logo') ); ?>" value="<?php if( isset( $logo ) ) : echo esc_attr( $logo ); endif; ?>">
    </p>

    <P>
        <label for="<?php echo esc_html( $this->get_field_id('desc') ); ?>"><?php echo __( 'Description:', 'star-addons-for-elementor'); ?></label>
    </p>

    <p>
       <textarea rows="10" cols="50" class="large-text code" id="<?php echo esc_html( $this->get_field_id('desc') ); ?>" name="<?php echo esc_html( $this->get_field_name('desc') ); ?>"><?php if( isset( $desc ) ) : echo esc_attr( $desc ); endif; ?></textarea>
    </p>

    <p>
        <label for="<?php echo $this->get_field_id('show-social'); ?>"><?php echo __( 'Show Social:', 'star-addons-for-elementor'); ?></label>
        <input <?php if( isset( $instance['show-social'] ) ) : checked($show_social, 1); endif; ?> type="checkbox" id="<?php echo $this->get_field_id('show-social'); ?>" name="<?php echo esc_html( $this->get_field_name('show-social') ); ?>" value="1">
    </p>

    <P>
        <label for="<?php echo esc_html( $this->get_field_id('fb') ); ?>"><?php echo __( 'Facebook Link:', 'star-addons-for-elementor'); ?></label>
    </p>

    <p>
       <input type="text" class="widefat" id="<?php echo esc_html( $this->get_field_id('fb') ); ?>" name="<?php echo esc_html( $this->get_field_name('fb') ); ?>" value="<?php if( isset( $fb ) ) : echo esc_attr( $fb ); endif; ?>">
    </p>

    <P>
        <label for="<?php echo esc_html( $this->get_field_id('tw') ); ?>"><?php echo __( 'Twitter Link:', 'star-addons-for-elementor'); ?></label>
    </p>

    <p>
       <input type="text" class="widefat" id="<?php echo esc_html( $this->get_field_id('tw') ); ?>" name="<?php echo esc_html( $this->get_field_name('tw') ); ?>" value="<?php if( isset( $tw ) ) : echo esc_attr( $tw ); endif; ?>">
    </p>

    <P>
        <label for="<?php echo esc_html( $this->get_field_id('in') ); ?>"><?php echo __( 'Instagram Link:', 'star-addons-for-elementor'); ?></label>
    </p>

    <p>
       <input type="text" class="widefat" id="<?php echo esc_html( $this->get_field_id('in') ); ?>" name="<?php echo esc_html( $this->get_field_name('in') ); ?>" value="<?php if( isset( $in ) ) : echo esc_attr( $in ); endif; ?>">
    </p>

    <P>
        <label for="<?php echo esc_html( $this->get_field_id('li') ); ?>"><?php echo __( 'Linekdin Link:', 'star-addons-for-elementor'); ?></label>
    </p>

    <p>
       <input type="text" class="widefat" id="<?php echo esc_html( $this->get_field_id('li') ); ?>" name="<?php echo esc_html( $this->get_field_name('li') ); ?>" value="<?php if( isset( $li ) ) : echo esc_attr( $li ); endif; ?>">
    </p>

    <P>
        <label for="<?php echo esc_html( $this->get_field_id('yt') ); ?>"><?php echo __( 'Youtube Link:', 'star-addons-for-elementor'); ?></label>
    </p>

    <p>
       <input type="text" class="widefat" id="<?php echo esc_html( $this->get_field_id('yt') ); ?>" name="<?php echo esc_html( $this->get_field_name('yt') ); ?>" value="<?php if( isset( $yt ) ) : echo esc_attr( $yt ); endif; ?>">
    </p>

    <?php }
}

function star_addons_about_us_function() {
	register_widget('star_addons_about_us');
}

add_action('widgets_init', 'star_addons_about_us_function');
	