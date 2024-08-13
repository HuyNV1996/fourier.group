<?php

if(!function_exists('language_selector_shortcode')){
	function language_selector_shortcode() {
		ob_start();
		?>
		<div class="language-icon m-auto flex" id="language-icon">
			<!-- <div id="language-icon">🌐</div> -->
			<select class="notranslate md:w-[185px] max-md:w-[80px]" id="select-language-option">
				<option value="">Select Language</option>
			</select>
		</div>
		<div id="google_translate_element"></div>
		<?php return ob_get_clean();
	}
	add_shortcode('language_selector', 'language_selector_shortcode');
}

if(!function_exists('custom_email_form')){
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
}