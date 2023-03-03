<?php

function resizeImage($source_path, $new_path, $width, $height)
{
    $CI = &get_instance();

    $config['image_library'] = 'gd2';
    $config['source_image'] = $source_path;
    $config['new_image'] = $new_path;
    // $config['create_thumb'] = true;
    $config['maintain_ratio'] = true;
    $config['width'] = $width;
    $config['height'] = $height;

    $CI->load->library('image_lib', $config);
    $CI->image_lib->initialize($config);

    if (!$CI->image_lib->resize()) {
        echo $CI->image_lib->display_errors();
        exit;
    }

    // $CI->image_lib->resize();
    $CI->image_lib->clear();
}
