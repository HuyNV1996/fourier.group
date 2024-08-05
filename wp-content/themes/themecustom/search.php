<?php
/* Template Name: Case study Page */
get_header();
?>

  <main>
    <section class="md:py-20 py-16 max-md:px-5">
      <div class="flex self-stretch leading-[150%] max-md:flex-wrap mx-auto max-w-layout max-md:text-center">
        <h1 class="flex-1 text-6xl font-bold text-primary max-md:max-w-full max-md:text-4xl">
			Kết quả tìm kiếm
        </h1>
      </div>

	  	<div class="self-stretch mt-16">
			<div id="cards-container"
				class="grid grid-cols-1 gap-10 max-md:flex-col max-w-layout w-full mx-auto">
				<?php
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
				?>
			</div>
		</div>

		<div id="pagination"
			class="flex justify-center items-center max-md:mt-10 self-stretch px-16 text-sm leading-6 text-center whitespace-nowrap text-primary mt-5x">
			<div class="flex gap-1 items-center">
				<?php

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
				?>
			</div>
		</div>
    </section>
  </main>
<?php
get_footer();
?>