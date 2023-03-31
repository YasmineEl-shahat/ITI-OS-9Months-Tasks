<?php
/**
* Kortez: Excerpt
*
* @since Kortez 1.0.0
*/
if( ! class_exists( 'Kortez_Excerpt' ) ):

    class Kortez_Excerpt{

        /**
        * Default length (by WordPress)
        *
        * @since Kortez 1.0.0
        * @access public
        * @var int
        */
        public $length = 15;

        /**
        * Read more Text for excerpt
        * @since Kortez 1.0.0
        * @access public
        * @var string
        */
        public $more_text = '';

        /**
        * So you can call: kortez_excerpt( 'short' );
        *
        * @since Kortez 1.0.0
        * @access protected
        * @var    array
        */
        protected $types = array(
            'short'   => 15,
            'regular' => 25,
            'long'    => 55
        );

        /**
        * Stores class instance
        * 
        * @since Kortez 1.0.0
        * @access protected
        * @var    object
        */
        protected static $instance = NULL;

        /**
        * Retrives the instance of this class
        * 
        * @since Kortez 1.0.0
        * @access public
        * @return object
        */
        public static function get_instance() {

            if ( ! self::$instance ) {
              self::$instance = new self();
            }

            return self::$instance;
        }

        /**
        * Sets the length for the excerpt,then it adds the WP filter
        * And automatically calls the_excerpt();
        *
        * @since Kortez 1.0.0
        * @param string $new_length 
        * @access public
        * @return void
        */
        public function excerpt( $new_length = 15, $echo, $more_text ) {

            $this->length    = $new_length;
            $this->more_text = $more_text;
            if(!is_admin()):
                add_filter( 'excerpt_more', array( $this, 'new_excerpt_more' ), 999 );
                add_filter( 'excerpt_length', array( $this, 'new_length' ), 999 );
            endif;

            if( $echo )
              the_excerpt();
            else
              return get_the_excerpt();

        }

        public function new_excerpt_more(){
            return $this->more_text;
        }

        /** 
        * Tells WP the new length
        *
        * @since Kortez 1.0.0
        * @access public
        * @return int
        */
        public function new_length() {

            if( isset( $this->types[ $this->length ] ) )
              return $this->types[ $this->length ];
            else
              return $this->length;
        }
    }

endif;