Khi bạn tạo một theme mới trong WordPress, bạn cần phải tạo một thư mục trong wp-content/themes và đặt các tệp cơ bản sau vào thư mục đó:

-   index.php
-   style.css
-   function.php

Để đảm bảo đường link đến các tệp CSS, JS, và hình ảnh là chính xác cần thêm `<?php bloginfo('template_directory')?>` hoặc `<?php echo get_template_directory_uri(); ?>` vào trước đường dẫn

file functions.php

```php
function theme_setup() {
	// tạo menu
	register_nav_menu('topmenu', __('Menu chính'));

	// đếm lượt truy cập vào bài viết
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

	// lấy lượt truy cập của bài viết
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

	// thêm ảnh đại diện cho bài viết
	add_theme_support( 'post-thumbnails' );
}

add_action('init', 'theme_setup');

function custom_customize_register( $wp_customize ) {
    // Thêm cài đặt cho text
    $wp_customize->add_setting('custom_text_setting', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    // Thêm cài đặt cho ảnh
    $wp_customize->add_setting('custom_image_setting', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    // Thêm phần (section) cho cài đặt
    $wp_customize->add_section('custom_content_section', array(
        'title'      => __('Custom Content', 'textdomain'),
        'priority'   => 30,
    ));

    // Thêm điều khiển cho text
    $wp_customize->add_control('custom_text_control', array(
        'label'    => __('Custom Text', 'textdomain'),
        'section'  => 'custom_content_section',
        'settings' => 'custom_text_setting',
        'type'     => 'textarea',
    ));

    // Thêm điều khiển cho ảnh
    $wp_customize->add_control(new WP_Customize_Image_control($wp_customize, 'custom_image_control', array(
        'label'    => __('Custom Image', 'textdomain'),
        'section'  => 'custom_content_section',
        'settings' => 'custom_image_setting',
    )));
}
add_action('customize_register', 'custom_customize_register');
```

Hiển thị ảnh, text ở trang chủ (index.php)

```php
	// lấy ảnh ở `custom_image_setting`
	$custom_image_url = get_theme_mod('custom_image_setting', '');
	if (!empty($custom_image_url)) {
		echo '<img loading="lazy" src="' . esc_url($custom_image_url) . '" class="object-cover absolute inset-0 size-full" />';
	} else {
		echo '<img loading="lazy" srcset="' . get_template_directory_uri() . '/assets/img/home/demo.jpg" class="object-cover absolute inset-0 size-full" />';
	}

	// lấy ảnh ở `custom_text_setting`
	$custom_text = get_theme_mod('custom_text_setting', '');
	if (!empty($custom_text)) {
		echo '<div class="mt-6 text-base leading-6 text-white max-md:max-w-full w-full md:w-[65%]">' . esc_html($custom_text) . '</div>';
	} else {
		echo '<div class="mt-6 text-base leading-6 text-white max-md:max-w-full w-full md:w-[65%]">
			We are dedicated to providing top-notch maintenance and support, catering to the unique needs of both startups and established enterprises. Discover how Fourier can help drive your business forward with our expert solutions and unwavering commitment to innovation.
		</div>';
	}
```

Hiển thị danh sách bài viết

```php
	// Hiển thị danh sách bài viết
	// Tạo một đối tượng WP_Query với các tham số bạn muốn
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
	$query = new WP_Query(array(
		'post_type' => 'post',
		'posts_per_page' => 5,
		'orderby' => 'date',
		'order' => 'DESC',
		'paged' => $paged
	));

	// Kiểm tra nếu có bài viết
	if ($query->have_posts()) :
		while ($query->have_posts()) : $query->the_post(); ?>
			<div class="card flex ml-5 mr-5">
				<a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail(get_the_id(), 'full', array('class' => 'thumnail')); ?></a>
				<div class="post-content ml-4">
					<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="post-excerpt"><?php the_excerpt(); ?></div>
				</div>
			</div>
		<?php endwhile;
		wp_reset_postdata(); // Đặt lại dữ liệu bài viết
	else :
		echo '<p>No posts found</p>';
	endif;

	// Phân trang
	// Kiểm tra số trang tối đa và tạo liên kết phân trang nếu cần
	if ($query->max_num_pages > 1) :
		$big = 999999999; // Số rất lớn để thay thế
		echo paginate_links(array(
			'base'         => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
			'format'       => '?paged=%#%',
			'prev_text'    => __('<'),
			'next_text'    => __('>'),
			'current'      => max(1, $paged),
			'total'        => $query->max_num_pages,
		));
	endif;
```

Chi tiết bài viết

```html
<?php if (have_posts()) :
		while (have_posts()) : the_post();
			<!-- Đếm lượt truy cập vào bài viết -->
setpostview(get_the_id()); ?>
<div
	class="flex gap-2 text-sm font-medium leading-6 text-neutral-400 max-md:flex-wrap">
	<div>Case study</div>
	<div>/</div>
	<div class="text-primary max-md:max-w-full">
		<?php the_title(); ?>
	</div>
</div>
<div
	class="justify-center self-start px-2 py-1 mt-10 text-xs font-semibold leading-5 bg-lime-200 rounded text-primary">
	Financial Services
</div>
<div
	class="mt-6 text-4xl font-extrabold leading-[60px] text-primary max-md:max-w-full">
	<!-- Hiển thị tiêu đề bài viết -->
	<?php the_title(); ?>
</div>
<div class="meta text-gray-400">
	<!-- Hiển thị thời gian tạo bài viết -->
	<span
		>Ngày đăng:
		<?php echo get_the_date('d - m - Y'); ?></span
	>
	<!-- Hiển thị tác giả tạo bài viết -->
	<span class="ml-3 mr-3"
		>Tác giả:
		<?php the_author(); ?></span
	>
	<!-- Lấy lượt truy cập vào bài viết -->
	<span
		>Lượt xem:
		<?php echo getpostviews(get_the_id()); ?>
		lượt</span
	>
</div>
<!-- Hiển thị nội dung bài viết -->
<div class="mt-8 text-base leading-6 text-primary max-md:max-w-full">
	<?php the_content(); ?>
</div>
<div class="tag">
	<p><?php the_tags('Từ Khóa: '); ?></p>
</div>
<div class="post-navigation mt-5">
	<!-- Chuyển qua lại các bài viết trong danh sách -->
	<?php previous_post_link('%link', '« Bài trước: %title'); ?>
	<?php next_post_link('%link', '%title: Bài tiếp theo »'); ?>
</div>
<div class="like mt-5">
	<div
		class="fb-like"
		data-href="<?php the_permalink(); ?>"
		data-width=""
		data-layout=""
		data-action=""
		data-size=""
		data-share="true"></div>
</div>
<div class="comment mt-5">
	<div
		class="fb-comments"
		data-href="<?php the_permalink(); ?>"
		data-width="100%"
		data-numposts="5"></div>
</div>
<?php endwhile; else : ?>
<p>Không có</p>
<?php endif; ?>
```

Chức năng search

```html
<!-- Form search -->
<form
	action="<?php bloginfo('url') ?>/"
	method="get"
	class="flex gap-4"
	role="search">
	<button
		id="search-study-button"
		class="text-xl max-md:text-lg flex justify-center items-center"
		type="submit">
		<i class="bx bx-search"></i>
	</button>
	<input
		id="search-study-input"
		name="s"
		placeholder="Search case studies"
		class=" bg-zinc-100 outline-none" />
</form>
```

File search.php

```php
	// Hiển thị bài viết có từ khóa
	// Tạo một đối tượng WP_Query với các tham số bạn muốn
	$paged = get_query_var('paged') ? get_query_var('paged') : 1;
	$search_query = get_search_query();
	$query = new WP_Query(array(
		'post_type' => 'post',
		'posts_per_page' => 5,
		'orderby' => 'date',
		'order' => 'DESC',
		'paged' => $paged,
		's' => $search_query
	));

	// Kiểm tra nếu có bài viết
	if ($query->have_posts()) :
		while ($query->have_posts()) : $query->the_post(); ?>
			<div class="card">
				<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="post-excerpt"><?php the_excerpt(); ?></div>
			</div>
		<?php endwhile;
		wp_reset_postdata(); // Đặt lại dữ liệu bài viết
	else :
		echo '<p>No posts found</p>';
	endif;

	// Phân trang
	// Kiểm tra số trang tối đa và tạo liên kết phân trang nếu cần
	if ($query->max_num_pages > 1) :
		$big = 999999999; // Số rất lớn để thay thế
		echo paginate_links(array(
			'base'         => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
			'format'       => '?paged=%#%',
			'prev_text'    => __('<'),
			'next_text'    => __('>'),
			'current'      => max(1, $paged),
			'total'        => $query->max_num_pages,
		));
	endif;
```
