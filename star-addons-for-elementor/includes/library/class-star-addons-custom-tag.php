<?php

/**
 * Add Custom Image to Course Tags
 */

if( ! class_exists( 'Showcase_Tag_Images' ) ) {
  class Showcase_Tag_Images {
    
    public function __construct() {
     //
    }

    /**
     * Initialize the class and start calling our hooks and filters
     */
     public function init() {
     // Image actions
     add_action( 'course_tag_add_form_fields', array( $this, 'add_tag_image' ), 10, 2 );
     add_action( 'created_course_tag', array( $this, 'save_tag_image' ), 10, 2 );
     add_action( 'course_tag_edit_form_fields', array( $this, 'update_tag_image' ), 10, 2 );
     add_action( 'edited_course_tag', array( $this, 'updated_tag_image' ), 10, 2 );
     add_action( 'admin_enqueue_scripts', array( $this, 'load_media' ) );
     add_action( 'admin_footer', array( $this, 'add_script' ) );
   }

   public function load_media() {
     if( ! isset( $_GET['taxonomy'] ) || $_GET['taxonomy'] != 'course_tag' ) {
       return;
     }
     wp_enqueue_media();
   }
  
   /**
    * Add a form field in the new tag page
    * @since 1.1
    */
  
   public function add_tag_image( $taxonomy ) { ?>
     <div class="form-field term-group">
       <label for="showcase-tag-image-id"><?php echo esc_html( 'Image', 'star-addons-for-elementor' ); ?></label>
       <input type="hidden" id="showcase-tag-image-id" name="showcase-tag-image-id" class="custom_media_url" value="">
       <div id="tag-image-wrapper"></div>
       <p>
         <input type="button" class="button button-secondary showcase_tax_media_button" id="showcase_tax_media_button" name="showcase_tax_media_button" value="<?php echo esc_html( 'Add Image', 'star-addons-for-elementor' ); ?>" />
         <input type="button" class="button button-secondary showcase_tax_media_remove" id="showcase_tax_media_remove" name="showcase_tax_media_remove" value="<?php echo esc_html( 'Remove Image', 'star-addons-for-elementor' ); ?>" />
       </p>
     </div>
   <?php }

   /**
    * Save the form field
    * @since 1.1
    */
   public function save_tag_image( $term_id, $tt_id ) {
     if( isset( $_POST['showcase-tag-image-id'] ) && '' !== $_POST['showcase-tag-image-id'] ){
       add_term_meta( $term_id, 'showcase-tag-image-id', absint( $_POST['showcase-tag-image-id'] ), true );
     }
    }

    /**
     * Edit the form field
     * @since 1.1
     */
    public function update_tag_image( $term, $taxonomy ) { ?>
      <tr class="form-field term-group-wrap">
        <th scope="row">
          <label for="showcase-tag-image-id"><?php echo esc_html( 'Image', 'star-addons-for-elementor' ); ?></label>
        </th>
        <td>
          <?php $image_id = get_term_meta( $term->term_id, 'showcase-tag-image-id', true ); ?>
          <input type="hidden" id="showcase-tag-image-id" name="showcase-tag-image-id" value="<?php echo esc_attr( $image_id ); ?>">
          <div id="tag-image-wrapper">
            <?php if( $image_id ) { ?>
              <?php echo wp_get_attachment_image( $image_id, 'thumbnail' ); ?>
            <?php } ?>
          </div>
          <p>
            <input type="button" class="button button-secondary showcase_tax_media_button" id="showcase_tax_media_button" name="showcase_tax_media_button" value="<?php echo __( 'Add Image', 'star-addons-for-elementor' ); ?>" />
            <input type="button" class="button button-secondary showcase_tax_media_remove" id="showcase_tax_media_remove" name="showcase_tax_media_remove" value="<?php echo __( 'Remove Image', 'star-addons-for-elementor' ); ?>" />
          </p>
        </td>
      </tr>
   <?php }

   /**
    * Update the form field value
    * @since 1.1
    */
   public function updated_tag_image( $term_id, $tt_id ) {
     if( isset( $_POST['showcase-tag-image-id'] ) && '' !== $_POST['showcase-tag-image-id'] ){
       update_term_meta( $term_id, 'showcase-tag-image-id', absint( $_POST['showcase-tag-image-id'] ) );
     } else {
       update_term_meta( $term_id, 'showcase-tag-image-id', '' );
     }
   }
 
   /**
    * Enqueue styles and scripts
    * @since 1.1
    */
   public function add_script() {
     if( ! isset( $_GET['taxonomy'] ) || $_GET['taxonomy'] != 'course_tag' ) {
       return;
     } ?>
     <script> jQuery(document).ready( function($) {
       _wpMediaViewsL10n.insertIntoPost = '<?php _e( "Insert", "showcase" ); ?>';
       function ct_media_upload(button_class) {
         var _custom_media = true, _orig_send_attachment = wp.media.editor.send.attachment;
         $('body').on('click', button_class, function(e) {
           var button_id = '#'+$(this).attr('id');
           var send_attachment_bkp = wp.media.editor.send.attachment;
           var button = $(button_id);
           _custom_media = true;
           wp.media.editor.send.attachment = function(props, attachment){
             if( _custom_media ) {
               $('#showcase-tag-image-id').val(attachment.id);
               $('#tag-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
               $( '#tag-image-wrapper .custom_media_image' ).attr( 'src',attachment.url ).css( 'display','block' );
             } else {
               return _orig_send_attachment.apply( button_id, [props, attachment] );
             }
           }
           wp.media.editor.open(button); return false;
         });
       }
       ct_media_upload('.showcase_tax_media_button.button');
       $('body').on('click','.showcase_tax_media_remove',function(){
         $('#showcase-tag-image-id').val('');
         $('#tag-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
       });
       // Thanks: http://stackoverflow.com/questions/15281995/wordpress-create-tag-ajax-response
       $(document).ajaxComplete(function(event, xhr, settings) {
         var queryStringArr = settings.data.split('&');
         if( $.inArray('action=add-tag', queryStringArr) !== -1 ){
           var xml = xhr.responseXML;
           $response = $(xml).find('term_id').text();
           if($response!=""){
             // Clear the thumb image
             $('#tag-image-wrapper').html('');
           }
          }
        });
      });
    </script>
   <?php }
  }
$Showcase_Taxonomy_Images = new Showcase_Tag_Images();
$Showcase_Taxonomy_Images->init(); }
