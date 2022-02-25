<?php 
function geniuscourses_add_metabox(){
   
    add_meta_box('car_metabox',esc_html__('Cars Settings', 'geniuscourses'), 'geniuscourses_cars_metabox_html', 'car', 'normal', 'high'); 

}
add_action('add_meta_boxes', 'geniuscourses_add_metabox');

function geniuscourses_cars_metabox_html($post){

    $car_price = get_post_meta($post->ID,'car_price',true);
    $car_engine = get_post_meta($post->ID,'car_engine',true);

    //check data
    wp_nonce_field('geniuscoursesrandomstring','_carmetabox');

    ?>
        <p>
            <label for="car_price"><?php esc_html_e('Car Price', 'geniuscourses'); ?></label>
            <input type="text" id="car_price" name="car_price" value="<?php echo esc_attr($car_price); ?>" >
        </p> 
        <p>
            <label for="car_engine"><?php esc_html_e('Car Engine', 'geniuscourses'); ?></label>
            <select id="car_engine" name="car_engine">
                <option value="">Select Engine</option>
                <option value="manual" <?php if($car_engine == 'manual'){ echo 'selected'; } ?>>Manual</option>
                <option value="automatic" <?php if($car_engine == 'automatic'){ echo 'selected'; } ?>>Automatic</option>
            </select>    
        </p>     
    <?php
}

//save this in db
function geniuscourses_save_metabox($post_id, $post){


    //if(isset($_POST['car_metabox']) || !wp_verify_nonce( $_POST['_carmetabox'], 'geniuscoursesrandomstring' ))  {
       // return $post_id;
    //}

    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
        return $post_id;
    }

    if($post->post_type !='car'){
        return $post_id;
    }

    $post_type = get_post_type_object($post->post_type);
    if(!current_user_can($post_type->cap->edit_post, $post_id)){
        return $post_id;
    }

    //$_POST['CAR_price']
    if(isset($_POST['car_price'])){
        update_post_meta($post_id, 'car_price', sanitize_text_field($_POST['car_price']));
    } else {
        delete_post_meta($post_id, 'car_price');
    }


    if(isset($_POST['car_engine'])){
        update_post_meta($post_id, 'car_engine', sanitize_text_field($_POST['car_engine']));
    } else {
        delete_post_meta($post_id, 'car_engine');
    }

    return $post_id;
}
add_action('save_post','geniuscourses_save_metabox', 10, 2);

