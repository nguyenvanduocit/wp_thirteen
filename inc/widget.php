<?php
class QuoteWidget extends WP_Widget {

	function QuoteWidget() {
		// Instantiate the parent object
		parent::__construct( false, 'My New Widget Title' );
	}

	function widget( $args, $instance ) {?>
		<aside class="widget widget_text">
		<?php $id = rand(0,296); ?>
		<img title="Danh ngôn hay" alt="Image quote" src="http://danhngon.muatocroi.com/images/300-<?php echo $id ?>.jpg">
		</aside>
	<?php}

	function update( $new_instance, $old_instance ) {
		// Save widget options
	}

	function form( $instance ) {
		// Output admin widget options form
	}
}

function myplugin_register_widgets() {
	register_widget( 'QuoteWidget' );
}

add_action( 'widgets_init', 'myplugin_register_widgets' );
?>