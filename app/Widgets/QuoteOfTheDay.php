<?php
namespace App\Widgets;

use App\Providers\ThemeServiceProvider;
use Illuminate\View\View;

class QuoteOfTheDay extends \WP_Widget {

    public function __construct() {
        // actual widget processes
        parent::__construct( 'QouteOfTheDay', __('Quote Of The Day', 'sage'));
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {

        $postArgs = [
            'post_type' => 'quote',
            'orderby'   => 'rand',
            'posts_per_page' => '1',
        ];

        $posts = get_posts($postArgs);
        $post = $posts[0];
        $title = apply_filters( 'widget_title', $instance['title'] );

        echo \Illuminate\Support\Facades\View::make('widgets.quote-of-the-day', [
            'quote' => $post->post_content,
            'title' => $title,
            'post'  => get_field('post', $post->ID ),
        ]);
        wp_reset_postdata();
//        extract( $args );
//        $title = apply_filters( 'widget_title', $instance['title'] );
//
//        echo $before_widget;
//        if ( ! empty( $title ) ) {
//            echo $before_title . $title . $after_title;
//        }
//        echo __( 'Hello, World!', 'text_domain' );
//        echo $after_widget;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'Quote of the day', 'sage' );
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
         </p>
    <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

        return $instance;
    }
}

?>
