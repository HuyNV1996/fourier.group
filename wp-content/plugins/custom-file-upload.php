<?php
/*
Plugin Name: Custom File Upload
Description: Allows .jfif file uploads.
Version: 1.0
Author: Your Name
*/

function allow_jfif_uploads($mimes) {
    $mimes['jfif'] = 'image/jpeg'; // Allow .jfif files
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_jfif_uploads');