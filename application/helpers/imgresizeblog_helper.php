<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('imgresizeblog'))
{
    function imgresizeblog($id = 0){
    	$ci =& get_instance();
    	$ci->load->model('news_model');

    	$ci->load->library('image_lib');

		$width = 240;
		$height = 240;

		if(isset($_GET['width'])){
			$width = $_GET['width'];
		}
		if(isset($_GET['height'])){
			$height = $_GET['height'];
		}

		$base_path = getcwd();
		
		$data['news'] = $ci->news_model->getData($id);
		$src_img		= 	$base_path."/assets/uploads/img_menu/".$data['news'][0]->image;
		$new_img		= 	$base_path."/assets/uploads/img_menu_resized/".$data['news'][0]->image;
		// echo $src_img;

		$config['image_library'] = 'gd2';
		$config['source_image'] = $src_img;
		$config['new_image'] = $new_img;

		$imageSize = $ci->image_lib->get_image_properties($config['source_image'], TRUE);
        // $newSize = min($imageSize);
        $newSize = 300;

        $config['width'] = $newSize;
        $config['height'] = $newSize;
        $config['y_axis'] = ($imageSize['height'] - $newSize) / 2;
        $config['x_axis'] = ($imageSize['width'] - $newSize) / 2;
		// $config['create_thumb'] = TRUE;

		// $config['dynamic_output'] = TRUE;
		$config['maintain_ratio'] = FALSE;
		// $config['width']         = 500;
		// $config['height']       = 500;

		if(!file_exists($new_img)){

			$ci->image_lib->initialize($config);

			if ( ! $ci->image_lib->crop()) {
		        echo $ci->image_lib->display_errors();
		    }

		}
			
		return base_url()."assets/uploads/img_menu_resized/".$data['news'][0]->image;
		
		// $this->image_lib->crop();

	}
}