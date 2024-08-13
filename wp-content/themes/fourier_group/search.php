<?php
/* Template Name: Case study Page */
get_header();
?>

  <main>
    <section class="md:py-20 py-16 max-md:px-5">
      <div class="flex self-stretch leading-[150%] max-md:flex-wrap mx-auto max-w-layout max-md:text-center">
        <h1 class="flex-1 text-6xl font-bold text-primary max-md:max-w-full max-md:text-4xl">
			Kết quả tìm kiếm "<?php echo get_search_query(); ?>"
        </h1>
      </div>

	  	<div class="self-stretch mt-16">
			<div id="cards-container"
				class="grid md:grid-cols-3 grid-cols-1 gap-10 max-md:flex-col max-w-layout w-full mx-auto">
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
						<div class="flex flex-col max-md:ml-0 max-md:w-full">
							<div class="flex flex-col font-semibold text-primary md:mb-16">
								<?php echo get_the_post_thumbnail(get_the_id(), 'full', array('class' => 'w-full aspect-[1.56] rounded')); ?>
								<div class="justify-center self-start px-2 py-1 mt-4 text-xs leading-5 whitespace-nowrap bg-[#C3E1A6] rounded-lg">
									Education
								</div>
								<a href="<?php the_permalink(); ?>" class="mt-4 text-base leading-6 text-ellipsis hover:text-secondary hover:underline active:text-secondary active:underline">
									<?php the_title(); ?>
								</a>
								<div class="mt-4 text-sm leading-6 text-[#A6A5A5]">
									<?php the_excerpt(); ?>
								</div>
							</div>
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