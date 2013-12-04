<?php
/*
Plugin Name: Eettafel Plugin
Plugin URI: https://github.com/DelftscheStudentenBond/eettafel
Description: Een wordpress plugin voor de DSB website in Wordpress om eenvoudig het eettafel menu te tonen en in te kunnen voeren.
Author: WebCom
Version: 1.0
*/

class WP_Widget_Eettafel extends WP_Widget \
{
  function WP_Widget_Eettafel() 
  {
    // Construct goes here.
    $widget_ops = array( 'classname' => 'widget_Eettafel', 'description' => __( "Eettafel" ) );
    $this->WP_Widget('eettafel', __('Eettafel'), $widget_ops);
  }

  function widget($args, $instance) 
  {
    // Our Widget Function
    extract($args);
    echo $before_widget;
    if(!empty($instance['title'])) { 
    	echo $before_title . $instance['title'] . $after_title; 
    }
    echo "<p>Hello Eettafel!</p>";
    echo $after_widget;
  }

  function update($new_instance, $old_instance) 
  {
    // Our Update Function
    // This function is used to save our widget information to the database. Every time someone goes into the Widget screen in WordPress and changes some options, this function will be called.
    // Do some database/set-option magic here
    // see http://codex.wordpress.org/Function_Reference/update_option
    return $new_instance;
  }

  function form($instance) 
  {		
    // Our Form Function
    // This form creates our widget administration panel on the Widget page in the WordPress control panel.
    echo '<div id="eettafel-admin-panel">';
    echo '<label for="' . $this->get_field_id("title") .'">Widget titel:</label>';
    echo '<input type="text" class="widefat" ';
    echo 'name="' . $this->get_field_name("title") . '" '; 
    echo 'id="' . $this->get_field_id("title") . '" ';
    echo 'value="' . $instance["title"] . '" />';
    echo '<p>This widget will display the title you choose above followed by the menu of the current week.</p>';
    echo '</div>';
  } 
}

add_action('widgets_init', create_function('', 'return register_widget("WP_Widget_Eettafel");'));
