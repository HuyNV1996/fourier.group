<?php

function theme_setup() {
	register_nav_menu('topmenu', __('Menu chính'));

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

function custom_admin_menu() {
    add_menu_page(
        __('Pages Settings', 'textdomain'), // Tên menu
        __('Pages Settings', 'textdomain'), // Tên hiển thị
        'manage_options', // Capability
        'custom-pages', // Slug
        'custom_pages_callback', // Hàm hiển thị nội dung trang
        'dashicons-admin-page', // Icon
        2 // Vị trí trong menu
    );
}
add_action('admin_menu', 'custom_admin_menu');

function custom_pages_callback() {
    // Lấy ID của trang chủ tĩnh (nếu có)
    $homepage_id = get_option('page_on_front');

    // Lấy danh sách các trang đã xuất bản
    $pages = get_pages(array('post_status' => 'publish', 'sort_column' => 'post_title'));

    echo '<div class="wrap">';
    echo '<h1>' . __('Pages Settings', 'textdomain') . '</h1>';

    // Hiển thị danh sách các trang
    echo '<ul class="menu">';
    foreach ($pages as $page) {
        if (strcasecmp($page->post_title, 'Case study') === 0) {
            continue;
        }
        $is_homepage = ($page->ID == $homepage_id) ? ' (Homepage)' : '';
        $edit_url = admin_url('admin.php?page=custom-pages&edit_page=' . $page->ID);
        echo '<li><a href="' . esc_url($edit_url) . '">' . esc_html($page->post_title) . $is_homepage . '</a></li>';
    }
    echo '</ul>';

    // Xử lý hiển thị form tùy chỉnh khi chọn trang
    if (isset($_GET['edit_page'])) {
        $edit_page = $_GET['edit_page'];
        $page_id = intval($edit_page);
        $page = get_post($page_id);

        if ($page) {
            echo '<h1>' . esc_html($page->post_title) . '</h1>';
            echo '<div>';

            // Kiểm tra xem người dùng có submit form hay không
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && check_admin_referer('custom_page_settings_save', 'custom_page_settings_nonce')) {
				$page_id = intval($_GET['edit_page']);
                if (isset($_POST['custom_logo'])) {
					$custom_logo = sanitize_text_field($_POST['custom_logo']);
					// Lưu vào cơ sở dữ liệu
					update_option('custom_site_logo', $custom_logo);
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

				if (isset($_POST['custom_texts'])) {

					$custom_texts = array_map('sanitize_textarea_field', $_POST['custom_texts']);
					update_post_meta($page_id, 'custom_texts', $custom_texts);
				}

                // Lưu ảnh từ URL
				if (isset($_POST['custom_image_urls'])) {
					$custom_image_urls = array_map('esc_url_raw', $_POST['custom_image_urls']);
					update_post_meta($page_id, 'custom_image_urls', $custom_image_urls);
				}

				// Xử lý upload ảnh
				if (isset($_FILES['custom_image_files'])) {
					$uploaded_images = array();
					foreach ($_FILES['custom_image_files']['name'] as $key => $filename) {
						if ($_FILES['custom_image_files']['error'][$key] === UPLOAD_ERR_OK) {
							$uploaded_image = array(
								'name' => $filename,
								'type' => $_FILES['custom_image_files']['type'][$key],
								'tmp_name' => $_FILES['custom_image_files']['tmp_name'][$key],
								'error' => $_FILES['custom_image_files']['error'][$key],
								'size' => $_FILES['custom_image_files']['size'][$key]
							);
							$upload = wp_handle_upload($uploaded_image, array('test_form' => false));
							if (!isset($upload['error']) && isset($upload['url'])) {
								$uploaded_images[] = $upload['url'];
							}
						}
					}
					if (!empty($uploaded_images)) {
						update_post_meta($page_id, 'custom_image_urls', $uploaded_images);
					}
				}

				if (isset($_POST['slider_items']) && isset($_POST['slider_texts'])) {
					// Lấy dữ liệu hiện có từ cơ sở dữ liệu
					$slider_data = get_post_meta($page_id, 'slider_data', true);
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
					update_post_meta($page_id, 'slider_data', [$combined_slider_data]);
				}

                echo '<div class="updated"><p>' . __('Settings saved.', 'textdomain') . '</p></div>';
            }

            // Lấy giá trị từ CSDL
            $custom_texts = get_post_meta($page_id, 'custom_texts', true) ?: array();
            $custom_image_urls = get_post_meta($page_id, 'custom_image_urls', true) ?: array();
			$custom_logo = get_option('custom_site_logo', '');
			$slider_data = get_post_meta($page_id, 'slider_data', true) ?: array();

            // Hiển thị form tùy chỉnh
            ?>
            <form method="post" enctype="multipart/form-data">
                <?php wp_nonce_field('custom_page_settings_save', 'custom_page_settings_nonce'); ?>

                <?php if ($page->post_title === 'Home') : ?>
                    <!-- Logo chỉ cho trang chủ -->
                    <h2><?php _e('Logo', 'textdomain'); ?></h2>
                    <p>
                        <label for="custom_logo"><?php _e('Logo (Text or URL):', 'textdomain'); ?></label><br>
                        <input type="text" name="custom_logo" id="custom_logo" value="<?php echo !empty($custom_logo) ?  esc_attr($custom_logo) : ''; ?>" class="regular-text"><br>
						<input type="file" name="custom_logo">
                    </p>
                <?php endif; ?>

                <!-- Text -->
                <h2><?php _e('Custom Texts', 'textdomain'); ?></h2>
                <div id="custom-texts-container">
					<?php foreach ($custom_texts as $i => $text) : ?>
						<div class="custom-text-entry">
							<label for="custom_texts_<?php echo $i; ?>"><?php _e('Text ' . ($i + 1) . ':', 'textdomain'); ?></label><br>
							<textarea name="custom_texts[]" id="custom_texts_<?php echo $i; ?>" rows="3" class="large-text"><?php echo esc_textarea($text); ?></textarea>
							<button type="button" class="remove-text-button"><?php _e('Remove', 'textdomain'); ?></button>
							<br><br>
						</div>
					<?php endforeach; ?>
                </div>
				<button type="button" id="add-text-button"><?php _e('Add Text', 'textdomain'); ?></button>

                <!-- Image -->
                <h2><?php _e('Custom Image', 'textdomain'); ?></h2>
                <div id="image-container">
					<?php foreach ($custom_image_urls as $i => $img_url) : ?>
						<div class="custom-img-entry">
							<label for="custom_image_url_<?php echo $i; ?>"><?php _e('Image URL ' . ($i + 1) . ':', 'textdomain'); ?></label><br>
							<input type="text" name="custom_image_urls[]" id="custom_image_url_<?php echo $i; ?>" class="regular-text" value="<?php echo esc_attr($img_url); ?>">
							<input type="file" name="custom_image_files[]" id="custom_image_file_1"><br><br>
						</div>
					<?php endforeach; ?>
				</div>
				<button type="button" id="add-image">Add Image</button>

				<?php if ($page->post_title === 'SmartSoft Solutions' || $page->post_title === 'Outsource IT Service') : ?>
                    <!-- Slider -->
                    <h2><?php _e('Slider', 'textdomain'); ?></h2>
					<div id="slider-container">
					<?php if (isset($slider_data[0])) {
						$data = $slider_data[0]; // Lấy dữ liệu từ phần tử đầu tiên
						foreach ($data['item'] as $i => $item) :
							$text = isset($data['text'][$i]) ? $data['text'][$i] : '';
							$img_url = isset($data['img_url'][$i]) ? $data['img_url'][$i] : ''; ?>
						<div class="slider-entry" data-index="<?php echo $i; ?>">
							<label for="slider_item_<?php echo $i; ?>"><?php _e('Smart Item ' . ($i + 1) . ':', 'textdomain'); ?></label><br>
							<input type="text" name="slider_items[]" id="slider_item_<?php echo $i; ?>" class="regular-text" value="<?php echo esc_attr($item); ?>"><br>

							<label for="slider_image_<?php echo $i; ?>"><?php _e('Image ' . ($i + 1) . ':', 'textdomain'); ?></label><br>
							<?php if ($img_url) : ?>
								<img src="<?php echo esc_url($img_url); ?>" alt="Image <?php echo ($i + 1); ?>" style="max-width: 100px; height: auto;"><br>
								<input type="hidden" name="existing_slider_images[]" value="<?php echo esc_url($img_url); ?>">
							<?php endif; ?>
							<input type="file" name="slider_images[]" id="slider_image_<?php echo $i; ?>"><br>

							<label for="slider_text_<?php echo $i; ?>"><?php _e('Text ' . ($i + 1) . ':', 'textdomain'); ?></label><br>
							<input type="text" name="slider_texts[]" id="slider_text_<?php echo $i; ?>" class="regular-text" value="<?php echo esc_attr($text); ?>"><br>

							<button type="button" class="remove-slider"><?php _e('Remove', 'textdomain'); ?></button><br><br>
						</div>
					<?php endforeach; } ?>
					</div>

					<button type="button" id="add-slider"><?php _e('Add Field', 'textdomain'); ?></button>
				<?php endif ?>

                <p>
                    <input type="submit" name="submit_custom_page" value="<?php _e('Save Changes', 'textdomain'); ?>" class="button button-primary">
                </p>
            </form>
			<script type="text/javascript">
				document.addEventListener('DOMContentLoaded', function() {
					const addTextButton = document.getElementById('add-text-button');
					const addImageButton = document.getElementById('add-image');
					const addSliderButton = document.getElementById('add-slider');
					const textsContainer = document.getElementById('custom-texts-container');
					const imgContainer = document.getElementById('image-container');
					const sliderContainer = document.getElementById('slider-container');
					var textCount = document.getElementsByClassName('custom-text-entry').length;
					var imageCount = document.getElementsByClassName('custom-img-entry').length;
					var sliderCount = document.getElementsByClassName('slider-entry').length;

					function addField(button, count, class_name, htmlFunction, container) {
						button.addEventListener('click', function() {
							count++;
							const newEntry = document.createElement('div');
							newEntry.className = class_name;
							newEntry.innerHTML = htmlFunction(count);
							container.appendChild(newEntry);
						});
					}

					function imgHtml(count) {
						return `<label for="custom_texts_${count}">Image URL ${count}:</label><br>
							<input type="text" name="custom_image_urls[]" id="custom_image_url_${count}" class="regular-text">
							<input type="file" name="custom_image_files[]" id="custom_image_file_${count}">
							<button type="button" class="remove-image">Remove</button><br><br>`;
					}

					function textHtml(count) {
						return `<label for="custom_texts_${count}">Text ${count}:</label><br>
							<textarea name="custom_texts[]" id="custom_texts_${count}" rows="3" class="large-text"></textarea>
							<button type="button" class="remove-text-button">Remove</button>
							<br><br>`
					}

					function sliderHtml(count) {
						return `<label for="slider_item_${count}">Smart Item: ${count}</label><br>
							<input type="text" name="slider_items[]" id="slider_item_${count}" class="regular-text"><br>
							<label for="slider_image_${count}">Image: ${count}</label><br>
							<input type="file" name="slider_images[]" id="slider_image_${count}">
							<br>
							<label for="slider_text_${count}">Text: ${count}</label><br>
							<input type="text" name="slider_texts[]" id="slider_text_${count}" class="regular-text"><br>
							<button type="button" class="remove-slider">Remove</button><br><br>`
					}

					function attachRemoveEvent(a, b) {
						a.addEventListener('click', function(e) {
							if (e.target.classList.contains(b)) {
								e.target.parentElement.remove();
							}
						});
					}

					addField(addTextButton, textCount, 'custom-text-entry', textHtml, textsContainer)
					addField(addImageButton, imageCount, 'custom-img-entry', imgHtml, imgContainer)
					if (sliderContainer != null) {
						addField(addSliderButton, sliderCount, 'slider-entry', sliderHtml, sliderContainer)
						attachRemoveEvent(sliderContainer, 'remove-slider')
					}
					if (textsContainer != null) {
						attachRemoveEvent(textsContainer, 'remove-text-button')
					}
					if (imgContainer != null) {
						attachRemoveEvent(imgContainer, 'remove-image')
					}
				});
				</script>
            <?php

            echo '</div>';
        } else {
            echo '<p>' . __('Page not found.', 'textdomain') . '</p>';
        }
    }
    echo '</div>';
}

function custom_admin_styles() {
    // Kiểm tra nếu đang ở trang admin và là trang chỉnh sửa của custom page
    $screen = get_current_screen();
    if ($screen->id === 'toplevel_page_custom-pages') {
        wp_enqueue_style('custom-admin-styles', get_template_directory_uri() . '/assets/css/admin-style.css');
    }
}
add_action('admin_enqueue_scripts', 'custom_admin_styles');

function add_custom_page_meta_box() {
    add_meta_box(
        'custom_page_description_meta_box',
        'Page Description',
        'render_custom_page_meta_box',
        'page',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_custom_page_meta_box');

function render_custom_page_meta_box($post) {
    $description = get_post_meta($post->ID, '_custom_page_description', true);
    wp_nonce_field('save_custom_page_description', 'custom_page_description_nonce');
    echo '<textarea name="_custom_page_description" rows="5" style="width:100%;">' . esc_textarea($description) . '</textarea>';
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
}
add_action('save_post', 'save_custom_page_meta');

function start_session() {
    if (!session_id()) {
        session_start();
    }
}
add_action('init', 'start_session');

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

function handle_contact_form_submission() {
    if (isset($_POST['submit_form'])) {
        $name = sanitize_text_field($_POST['name']);
		$company = sanitize_text_field($_POST['company']);
        $email = sanitize_email($_POST['email']);
        $message = sanitize_textarea_field($_POST['message']);

        $to = 'tamvt2.gcode@gmail.com'; // Thay đổi địa chỉ email người nhận
        $subject = 'New Contact Form Submission';
        $body = "Name: $name\nEmail: $email\nCompany: $company\nMessage: $message";
        $headers = array('Content-Type: text/plain; charset=UTF-8');

        // Gửi email
        $sent = wp_mail($to, $subject, $body, $headers);

		// Lưu thông báo vào session
        if ($sent) {
            $_SESSION['contact_form_message'] = array(
                'message' => 'Your message was sent successfully!',
                'class'   => 'success'
            );
        } else {
            $_SESSION['contact_form_message'] = array(
                'message' => 'There was an error sending your message. Please try again.',
                'class'   => 'error'
            );
        }

        // Điều hướng lại trang để tránh gửi lại form khi tải lại
        wp_redirect($_SERVER['REQUEST_URI']);
        exit;
    }
}
add_action('wp', 'handle_contact_form_submission');