<?php

class star_addons_contact_us extends WP_Widget {
    public function __construct() {
    	parent::__construct('star_addons_contact_us', __('Star Addons Contact Us', 'star-addons-for-elementor'), array(
            'description' => __('This is contact us widget.', 'star-addons-for-elementor')
    	));
    }
    
    public function widget( $args, $instance ) { ?>

		<div class="col-lg-3 col-sm-12 col-md-6">		
			<div class="single-footer-widget pl-0">	
				<?php $title = $instance['title']; ?>
				<h3><?php echo esc_attr( $title ); ?></h3>
				<ul class="footer-contact-info">
					<?php $address = $instance['address']; 
					if( $address ) : ?>
					    <li>
                            <div class="icon">
                                <i aria-hidden="true" class="fas fa-map-marker-alt"></i>
                            </div><?php echo esc_attr( $address ); ?>
                        </li>
					<?php endif; 
					$email = $instance['email']; 
					if( $email ) : ?>
					    <li>
                            <div class="icon">
                                <i aria-hidden="true" class="far fa-envelope"></i>
                            </div><?php echo esc_attr( $email ); ?></li>
					<?php endif; 
					$phone = $instance['phone']; 
					if( $phone ) : ?>
					    <li>
                            <div class="icon">
                                <i aria-hidden="true" class="fas fa-phone"></i>
                            </div><?php echo esc_attr( $phone ); ?></li>
					<?php endif; 
					$fax = $instance['fax']; 
					if( $fax ) : ?>
					    <li>
                            <div class="icon">
                                <i aria-hidden="true" class="fas fa-fax"></i>
                            </div>
                            <?php echo esc_attr( $fax ); ?></li>
					<?php endif; ?>
				</ul>
			</div>	
		</div>							

    <?php }

    public function form( $instance ) {
        if( isset( $instance['title'] ) ) :
    	    $title    = $instance['title'];
        endif;
        if( isset( $instance['address'] ) ) :
    	    $address  = $instance['address'];
        endif;
        if( isset( $instance['email'] ) ) :
    	    $email    = $instance['email'];
        endif;
        if( isset( $instance['phone'] ) ) :
    	    $phone    = $instance['phone'];
        endif;	 
        if( isset( $instance['fax'] ) ) :
    	    $fax   = $instance['fax'];
        endif;       	        
    ?>

    <P>
        <label for="<?php echo esc_html( $this->get_field_id('title') ); ?>"><?php echo __('Title:', 'star-addons-for-elementor'); ?></label>
    </p>

    <p>
       <input type="text" class="widefat" id="<?php echo esc_html( $this->get_field_id('title') ); ?>" name="<?php echo esc_html( $this->get_field_name('title') ); ?>" value="<?php if( isset( $title ) ) : echo esc_attr( $title ); endif; ?>">
    </p>

    <P>
        <label for="<?php echo esc_html( $this->get_field_id('address') ); ?>"><?php echo __('Address:', 'star-addons-for-elementor'); ?></label>
    </p>

    <p>
       <input type="text" class="widefat" id="<?php echo esc_html( $this->get_field_id('address') ); ?>" name="<?php echo esc_html( $this->get_field_name('address') ); ?>" value="<?php if( isset( $address ) ) : echo esc_attr( $address ); endif; ?>">
    </p>

    <P>
        <label for="<?php echo esc_html( $this->get_field_id('email') ); ?>"><?php echo __('Email:', 'star-addons-for-elementor'); ?></label>
    </p>

    <p>
       <input type="text" class="widefat" id="<?php echo esc_html( $this->get_field_id('email') ); ?>" name="<?php echo esc_html( $this->get_field_name('email') ); ?>" value="<?php if( isset( $email ) ) : echo esc_attr( $email ); endif; ?>">
    </p>

    <P>
        <label for="<?php echo esc_html( $this->get_field_id('phone') ); ?>"><?php echo __('Phone:', 'star-addons-for-elementor'); ?></label>
    </p>

    <p>
       <input type="text" class="widefat" id="<?php echo esc_html( $this->get_field_id('phone') ); ?>" name="<?php echo esc_html( $this->get_field_name('phone') ); ?>" value="<?php if( isset( $phone ) ) : echo esc_attr( $phone ); endif; ?>">
    </p>

    <P>
        <label for="<?php echo esc_html( $this->get_field_id('fax') ); ?>"><?php echo __('Fax:', 'star-addons-for-elementor'); ?></label>
    </p>

    <p>
       <input type="text" class="widefat" id="<?php echo esc_html( $this->get_field_id('fax') ); ?>" name="<?php echo esc_html( $this->get_field_name('fax') ); ?>" value="<?php if( isset( $fax ) ) : echo esc_attr( $fax ); endif; ?>">
    </p>

    <?php }
}

function star_addons_contact_us_function() {
	register_widget('star_addons_contact_us');
}

add_action('widgets_init', 'star_addons_contact_us_function');
