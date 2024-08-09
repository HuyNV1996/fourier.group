<?php

function theme_setup() {
	register_nav_menu('topmenu', __('Menu chính'));

	// Điếm lượt truy cập(view)
	function setpostview($postID){
		$count_key ='views';
		$count = get_post_meta($postID, $count_key, true);
		if($count == ''){
			$count = 0;
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
		} else {
			$count++;
			update_post_meta($postID, $count_key, $count);
		}
	}

	// Lấy lượt truy cập(view)
	function getpostviews($postID){
		$count_key ='views';
		$count = get_post_meta($postID, $count_key, true);
		if($count == ''){
			delete_post_meta($postID, $count_key);
			add_post_meta($postID, $count_key, '0');
			return "0";
		}
		return $count;
	}

	add_theme_support( 'post-thumbnails' );
}

add_action('init', 'theme_setup');

function add_custom_page_meta_box() {
    add_meta_box(
        'custom_page_description_meta_box',
        'Edit Page',
        'render_custom_page_meta_box',
        'page',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_custom_page_meta_box');

function render_custom_page_meta_box($post) {
	$custom_logo = get_option('custom_site_logo', '');
	$custom_data = get_post_meta($post->ID, 'custom_data', true) ?: [];
	$slider_data = get_post_meta($post->ID, 'slider_data', true) ?: array();
    $description = get_post_meta($post->ID, '_custom_page_description', true);

	usort($custom_data, function($a, $b) {
		return ($a['index'] <=> $b['index']);
	});

    wp_nonce_field('save_custom_page_description', 'custom_page_description_nonce');
	if ($post->post_title === 'Home') : ?>
		<div class="logo">
			<label for="custom_logo"><?php _e('Logo:', 'textdomain'); ?></label><br>
			<input type="text" name="custom_logo" id="custom_logo" value="<?php echo !empty($custom_logo) ?  esc_attr($custom_logo) : ''; ?>" class="regular-text"><br>
			<input type="file" name="custom_logo">
		</div>
	<?php endif; ?>

	<div id="custom-container">
		<?php foreach ($custom_data as $entry) : ?>
			<?php if ($entry['type'] === 'text') : ?>
				<div class="custom-text-entry" data-index="<?php echo $entry['index']; ?>">
					<label><?php echo ucwords($entry['position']) ?></label>
					<input type="hidden" name="position_text[]" id="position_text_${count}" placeholder="Vị trí hiển thị" value="<?php echo $entry['position'] ?>">
					<textarea name="custom_texts[]" id="custom_texts_<?php echo $entry['index']; ?>" rows="3" class="large-text"><?php echo esc_textarea($entry['value']); ?></textarea>
					<input type="hidden" name="index_text[]" value="<?php echo $entry['index']; ?>">
					<br><br>
				</div>
			<?php elseif ($entry['type'] === 'image') : ?>
				<div class="custom-img-entry" data-index="<?php echo $entry['index']; ?>">
					<label><?php echo ucwords($entry['position']) ?></label>
					<input type="hidden" name="position_img[]" id="position_img_${count}" placeholder="Vị trí hiển thị" value="<?php echo $entry['position'] ?>">
					<input type="text" name="custom_image_urls[]" id="custom_image_url_<?php echo $entry['index']; ?>" class="regular-text" value="<?php echo esc_attr($entry['value']); ?>">
					<input type="hidden" name="index_img[]" value="<?php echo $entry['index']; ?>">
					<input type="file" name="custom_image_files[]" id="custom_image_file_<?php echo $entry['index']; ?>"><br><br>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
	<button type="button" id="add-text-button"><?php _e('Add Text', 'textdomain'); ?></button>
	<button type="button" id="add-image">Add Image</button>

	<?php if ($post->post_title === 'SmartSoft Solutions' || $post->post_title === 'Outsource IT Service') : ?>
		<!-- Slider -->
		<h2><?php _e('Slider', 'textdomain'); ?></h2>
		<div id="slider-container">
		<?php if (isset($slider_data[0])) {
			$data = $slider_data[0]; // Lấy dữ liệu từ phần tử đầu tiên
			foreach ($data['item'] as $i => $item) :
				$text = isset($data['text'][$i]) ? $data['text'][$i] : '';
				$img_url = isset($data['img_url'][$i]) ? $data['img_url'][$i] : ''; ?>
			<div class="slider-entry" data-index="<?php echo $i; ?>">
				<label for="slider_item_<?php echo $i; ?>"><?php _e('Smart Item:', 'textdomain'); ?></label>
				<input type="text" name="slider_items[]" id="slider_item_<?php echo $i; ?>" class="regular-text" value="<?php echo esc_attr($item); ?>"><br>

				<label for="slider_image_<?php echo $i; ?>"><?php _e('Image:', 'textdomain'); ?></label>
				<?php if ($img_url) : ?>
					<img src="<?php echo esc_url($img_url); ?>" alt="Image <?php echo ($i + 1); ?>" style="max-width: 100px; height: auto;"><br>
					<input type="hidden" name="existing_slider_images[]" value="<?php echo esc_url($img_url); ?>">
				<?php endif; ?>
				<input type="file" name="slider_images[]" id="slider_image_<?php echo $i; ?>"><br>

				<label for="slider_text_<?php echo $i; ?>"><?php _e('Text:', 'textdomain'); ?></label>
				<input type="text" name="slider_texts[]" id="slider_text_<?php echo $i; ?>" class="regular-text" value="<?php echo esc_attr($text); ?>"><br>

				<button type="button" class="remove-slider"><?php _e('Remove', 'textdomain'); ?></button><br><br>
			</div>
		<?php endforeach; } ?>
		</div>

		<button type="button" id="add-slider"><?php _e('Add Field', 'textdomain'); ?></button><br><br>
	<?php endif;
    echo '<label for="description">Description:</label>
	<textarea name="_custom_page_description" rows="3" style="width:100%;">' . esc_textarea($description) . '</textarea>';
}

function save_custom_page_meta($post_id) {
    if (!isset($_POST['custom_page_description_nonce']) ||
        !wp_verify_nonce($_POST['custom_page_description_nonce'], 'save_custom_page_description')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (isset($_POST['_custom_page_description'])) {
        update_post_meta($post_id, '_custom_page_description', sanitize_textarea_field($_POST['_custom_page_description']));
    }

	if (isset($_POST['custom_logo']) && !empty($_POST['custom_logo'])) {
		$custom_logo = sanitize_text_field($_POST['custom_logo']);
		// Lưu vào cơ sở dữ liệu
		if (!empty($custom_logo)) {
			update_option('custom_site_logo', $custom_logo);
		}
	}

	// Nếu logo là một file upload
	if (isset($_FILES['custom_logo']) && !empty($_FILES['custom_logo']['name'])) {
		$uploaded_image = wp_handle_upload($_FILES['custom_logo'], array('test_form' => false));
		if (!isset($uploaded_image['error']) && isset($uploaded_image['url'])) {
			$custom_logo = $uploaded_image['url'];
		}
		// Lưu vào cơ sở dữ liệu
		update_option('custom_site_logo', $custom_logo);
	}

	$custom_data = [];

	// Thu thập dữ liệu từ form
	if (isset($_POST['custom_texts']) && !empty($_POST['custom_texts'])) {
		foreach ($_POST['custom_texts'] as $index => $text) {
			if (!empty($text)) {
				$custom_data[] = [
					'type' => 'text',
					'value' => sanitize_textarea_field($text),
					'index' => $_POST['index_text'][$index],
					'position' => $_POST['position_text'][$index]
				];
			}
		}
	}

	if (isset($_POST['custom_image_urls']) && !empty($_POST['custom_image_urls'])) {
		foreach ($_POST['custom_image_urls'] as $index => $img_url) {
			if (!empty($img_url)) {
				$custom_data[] = [
					'type' => 'image',
					'value' => esc_url_raw($img_url),
					'index' => $_POST['index_img'][$index],
					'position' => $_POST['position_img'][$index]
				];
			}
		}
	}

	if (isset($_FILES['custom_image_files']) && !empty($_FILES['custom_image_files']['name'])) {
		foreach ($_FILES['custom_image_files']['name'] as $index => $filename) {
			if ($_FILES['custom_image_files']['error'][$index] === UPLOAD_ERR_OK) {
				$uploaded_image = array(
					'name'     => $filename,
					'type'     => $_FILES['custom_image_files']['type'][$index],
					'tmp_name' => $_FILES['custom_image_files']['tmp_name'][$index],
					'error'    => $_FILES['custom_image_files']['error'][$index],
					'size'     => $_FILES['custom_image_files']['size'][$index]
				);
				$upload = wp_handle_upload($uploaded_image, array('test_form' => false));
				if (!isset($upload['error']) && isset($upload['url'])) {
					$custom_data[] = [
						'type' => 'image',
						'value' => $upload['url'],
						'index' => $_POST['index_img'][$index],
						'position' => $_POST['position_img'][$index]
					];
				}
			}
		}
	}

	 // Lưu dữ liệu vào cơ sở dữ liệu
	update_post_meta($post_id, 'custom_data', $custom_data);


	if (isset($_POST['slider_items']) && isset($_POST['slider_texts'])) {
		// Lấy dữ liệu hiện có từ cơ sở dữ liệu
		$slider_data = get_post_meta($post_id, 'slider_data', true);
		$slider_data = $slider_data ? $slider_data[0] : ['item' => [], 'text' => [], 'img_url' => []];

		// Dữ liệu mới từ biểu mẫu
		$new_slider_items = array_map('sanitize_textarea_field', $_POST['slider_items']);
		$new_slider_texts = array_map('sanitize_textarea_field', $_POST['slider_texts']);
		$existing_slider_images = isset($_POST['existing_slider_images']) ? array_map('esc_url_raw', $_POST['existing_slider_images']) : [];
		$new_uploaded_images = [];

		// Xử lý tải lên hình ảnh
		foreach ($_FILES['slider_images']['name'] as $key => $filename) {
			if ($_FILES['slider_images']['error'][$key] === UPLOAD_ERR_OK) {
				$uploaded_image = array(
					'name'     => $filename,
					'type'     => $_FILES['slider_images']['type'][$key],
					'tmp_name' => $_FILES['slider_images']['tmp_name'][$key],
					'error'    => $_FILES['slider_images']['error'][$key],
					'size'     => $_FILES['slider_images']['size'][$key]
				);
				$upload = wp_handle_upload($uploaded_image, array('test_form' => false));
				if (!isset($upload['error']) && isset($upload['url'])) {
					$new_uploaded_images[] = $upload['url'];
				}
			} else {
				// Nếu không upload mới, giữ lại ảnh hiện có
				$new_uploaded_images[] = isset($existing_slider_images[$key]) ? $existing_slider_images[$key] : '';
			}
		}

		// Kết hợp dữ liệu mới và cũ
		$combined_slider_data = [];
		$num_items = max(count($new_slider_items), count($slider_data['item']));

		for ($i = 0; $i < $num_items; $i++) {
			$item = isset($new_slider_items[$i]) ? $new_slider_items[$i] : (isset($slider_data['item'][$i]) ? $slider_data['item'][$i] : '');
			$text = isset($new_slider_texts[$i]) ? $new_slider_texts[$i] : (isset($slider_data['text'][$i]) ? $slider_data['text'][$i] : '');
			$image_url = isset($new_uploaded_images[$i]) ? $new_uploaded_images[$i] : (isset($slider_data['img_url'][$i]) ? $slider_data['img_url'][$i] : '');

			$combined_slider_data['item'][] = $item;
			$combined_slider_data['text'][] = $text;
			$combined_slider_data['img_url'][] = $image_url;
		}

		// Lưu dữ liệu vào cơ sở dữ liệu
		update_post_meta($post_id, 'slider_data', [$combined_slider_data]);
	}
}
add_action('save_post', 'save_custom_page_meta');

function enqueue_custom_admin_assets($hook) {
    // Kiểm tra xem đang ở trang chỉnh sửa meta box
    if ($hook != 'post.php' && $hook != 'post-new.php') {
        return;
    }

    // Kiểm tra xem loại bài viết có phải là 'page' không (hoặc loại bạn muốn)
    global $post;
    if (isset($post->post_type) && $post->post_type == 'page') {
        // Đường dẫn đến file CSS và JS
        wp_enqueue_style('custom-admin-css', get_stylesheet_directory_uri() . '/assets/css/admin-style.css');
        wp_enqueue_script('custom-admin-js', get_stylesheet_directory_uri() . '/assets/js/admin-main.js', array('jquery'), null, true);
    }
}
add_action('admin_enqueue_scripts', 'enqueue_custom_admin_assets');

function start_session() {
    if (session_status() === PHP_SESSION_NONE) {
		session_start();
	}
}

function close_session_if_active() {
    if (session_status() === PHP_SESSION_ACTIVE) {
        session_write_close();
    }
}

function custom_email_form() {
    ob_start();
	if (isset($_SESSION['contact_form_message'])): ?>
        <div class="notification <?php echo esc_attr($_SESSION['contact_form_message']['class']); ?>">
            <?php echo esc_html($_SESSION['contact_form_message']['message']); ?>
        </div>
        <?php unset($_SESSION['contact_form_message']); ?>
    <?php endif; ?>
    <form class="flex flex-col mt-8" action="<?php echo esc_url( $_SERVER['REQUEST_URI'] ); ?>" method="post">
        <input type="text" id="name" name="name" class="flex gap-1 px-4 py-2.5 whitespace-nowrap rounded bg-zinc-100 max-md:flex-wrap" placeholder="Name" aria-label="Name" required>
        <input type="email" id="email" name="email" class="flex gap-1 px-4 py-2.5 mt-4 rounded bg-zinc-100 max-md:flex-wrap" placeholder="E-mail address" aria-label="Email" required>
        <input type="text" id="company" name="company" class="flex gap-1 px-4 py-2.5 mt-4 rounded bg-zinc-100 max-md:flex-wrap" placeholder="Company name" aria-label="Company" required>
		<textarea id="message" name="message" rows="3" class="px-4 pt-3 pb-8 mt-4 rounded bg-zinc-100 max-md:max-w-full" placeholder="Your message" aria-label="Message"></textarea>
		<input type="hidden" name="submit_form" value="1">
        <button type="submit" class="justify-center self-end px-10 py-3 mt-6 text-base font-semibold leading-6 text-white whitespace-nowrap rounded border border-solid shadow bg-primary border-primary max-md:px-5">Submit</button>
    </form>
	<?php return ob_get_clean();
}
add_shortcode('custom_email_form', 'custom_email_form');

// Thêm trường email vào trang Settings > General
function my_custom_settings_init() {
    add_settings_section(
        'my_custom_email_section',
        'Custom Email Settings',
        null,
        'general'
    );

    add_settings_field(
        'my_custom_email_field',
        'Recipient Emails',
        'my_custom_email_field_render',
        'general',
        'my_custom_email_section'
    );

    register_setting('general', 'my_custom_email_field', [
        'type' => 'string',
        'sanitize_callback' => 'sanitize_text_field',
        'default' => ''
    ]);
}
add_action('admin_init', 'my_custom_settings_init');

function my_custom_email_field_render() {
    $emails = get_option('my_custom_email_field', '');
    echo '<p class="description">Nhập mail. Nếu nhập nhiều mail, hãy để mail cách nhau bằng ","</p><br>';
    echo '<input type="text" id="my_custom_email_field" name="my_custom_email_field" value="' . esc_attr($emails) . '" class="regular-text ltr" />';
}

function handle_contact_form_submission() {
    if (isset($_POST['submit_form'])) {
        $name = sanitize_text_field($_POST['name']);
		$company = sanitize_text_field($_POST['company']);
        $email = sanitize_email($_POST['email']);
        $message = sanitize_textarea_field($_POST['message']);

        // Lấy địa chỉ email người nhận từ cài đặt
        $to = get_option('my_custom_email_field'); // Mặc định nếu không có cài đặt
        $recipients = explode(',', $to); // Chia tách địa chỉ email
        $subject = 'New Contact Form Submission';
        $body = "Name: $name\nEmail: $email\nCompany: $company\nMessage: $message";
        $headers = array('Content-Type: text/plain; charset=UTF-8');

        // Gửi email
        $sent = wp_mail($recipients, $subject, $body, $headers);
		start_session();
		// Lưu thông báo vào session
        if ($sent) {
            $_SESSION['contact_form_message'] = array(
                'message' => 'Thank you for your message. It has been sent.',
                'class'   => 'success'
            );
        } else {
            $_SESSION['contact_form_message'] = array(
                'message' => 'There was an error trying to send your message. Please try again later.',
                'class'   => 'error'
            );
        }

        // Điều hướng lại trang để tránh gửi lại form khi tải lại
		close_session_if_active();
        wp_redirect($_SERVER['REQUEST_URI']);
        exit;
    }
}
add_action('wp', 'handle_contact_form_submission');

function language_selector_shortcode() {
    ob_start();
    ?>
	<select class="notranslate md:w-[160px]" id="select-language-option">
		<option value="">Select Language</option>
	</select>
    <div id="google_translate_element"></div>
    <?php return ob_get_clean();
}
add_shortcode('language_selector', 'language_selector_shortcode');

function get_page_id_by_title($title) {
    $query = new WP_Query(array(
        'post_type'      => 'page',
        'title'          => $title,
        'posts_per_page' => 1
    ));

    if ($query->have_posts()) {
        $query->the_post();
        $page_id = get_the_ID();
        wp_reset_postdata();
        return $page_id;
    }

    return null;
}

function get_data($values, $i) {
	$data = '';
	if (!empty($values)) {
		foreach ($values as $key => $value) {
			if ($value['position'] == $i) {
				$data = $values[$key]['value'];
			}
		}
	}
	return $data;
}

function get_custom_posts($count) {
	if (!is_int($count) || $count <= 0) {
		return new WP_Query();
	}
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
	$query = new WP_Query(array(
		'post_type' => 'post',
		'posts_per_page' => $count,
		'orderby' => 'date',
		'order' => 'DESC',
		'paged' => $paged
	));

	return $query;
}

function menu_mobile() {
	$html = '';
	$exclude_pages = array(
		get_page_id_by_title('Contact us'),
		get_page_id_by_title('Home'),
		get_page_id_by_title('Case study')
	);

	$pages = get_pages(array(
		'exclude' => $exclude_pages,
		'sort_column' => 'post_title',
		'sort_order' => 'asc'
	));


	if ($pages) {
		foreach ($pages as $page) {
			if ($page->post_title == 'Solutions') {
                $html .= '<a href="' . get_permalink($page->ID) . '" class="shrink-0 py-2 px-4 self-start max-md:text-sm text-primary font-bold rounded shadow-sm border-primary border">Go to overview</a>';
            } else if ($page->post_title != 'Solutions') {
                $html .= '<a href="' . get_permalink($page->ID) . '" class="item-dropdown font-semibold">' . esc_html($page->post_title) . '</a>';
            }
		}?>
		<script type="text/javascript">
			document.addEventListener('DOMContentLoaded', function () {
				const menuMobile = document.querySelector('#menu-mobile .menu-item-133');
				let html = '<?php echo esc_html($html); ?>'
				if (menuMobile) {
					menuMobile.insertAdjacentHTML('beforeend', '<i class="bx bx-chevron-down text-base"></i>');
					menuMobile.insertAdjacentHTML('afterend', '<li class="item-menu-mb drop-down-content"><nav class="flex flex-col gap-6 px-8 py-6"><?php echo $html; ?></nav></li>');
				}
			})
		</script>

	<?php }
}

add_action('wp', 'menu_mobile');