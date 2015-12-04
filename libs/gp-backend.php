<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p><label for="<?php echo $this->get_field_id( 'titleson' ); ?>"><?php _e( 'Display Titles:' ); ?></label> 
<select class="widefat" id="<?php echo $this->get_field_id( 'titleson' ); ?>" name="<?php echo $this->get_field_name( 'titleson'); ?>">
<option value="1">Yes</option>
<option value="0">No</option>
</select>
</p>
<p><label for="<?php echo $this->get_field_id('describe'); ?>"><?php _e('Description:' ); ?></label>
<textarea class="widefat" id="<?php echo $this->get_field_id( 'describe' ); ?>" name="<?php echo $this->get_field_name( 'describe' ); ?>"><?php echo esc_attr( $describe ); ?></textarea>
</p>
<p><label for="<?php echo $this->get_field_id('items'); ?>"><?php _e('Items:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'items' ); ?>" name="<?php echo $this->get_field_name( 'items' ); ?>" type="text" value="<?php echo esc_attr( $items ); ?>" />
</p>
<p><label for="<?php echo $this->get_field_id('columns'); ?>"><?php _e('Columns:' ); ?></label>
<select class="widefat" id="<?php echo $this->get_field_id( 'columns' ); ?>" name="<?php echo $this->get_field_name( 'columns' ); ?>">
	<option selected value="4">4</option>
	<option value="3">3</option>
	<option value="2">2</option>
	<option value="6">6<option>
</select>
</p>