document.addEventListener('DOMContentLoaded', function () {
	const form = document.getElementById('custom-form');
	const menu = document.querySelector('ul.menu');
	const addTextButton = document.getElementById('add-text-button');
	const addImageButton = document.getElementById('add-image');
	const addSliderButton = document.getElementById('add-slider');
	const customContainer = document.getElementById('custom-container');
	const sliderContainer = document.getElementById('slider-container');
	var sliderCount = document.getElementsByClassName('slider-entry').length;

	function addField(button, count, class_name, htmlFunction, container) {
		button.addEventListener('click', function () {
			let index = customContainer.children.length;
			let i = count == 0 ? index : count;
			i++;
			const newEntry = document.createElement('div');
			newEntry.className = class_name;
			newEntry.setAttribute('data-index', i);
			newEntry.innerHTML = htmlFunction(i);
			container.appendChild(newEntry);
		});
	}

	function imgHtml(count) {
		return `<label for="custom_texts_${count}">Image URL:</label><br>
			<input type="text" name="custom_image_urls[]" id="custom_image_url_${count}" class="regular-text">
			<input type="file" name="custom_image_files[]" id="custom_image_file_${count}">
			<input type="hidden" name="index_img[]" value="${count}">
			<button type="button" class="remove-image">Remove</button><br><br>`;
	}

	function textHtml(count) {
		return `<label for="custom_texts_${count}">Text:</label><br>
			<textarea name="custom_texts[]" id="custom_texts_${count}" rows="3" class="large-text"></textarea>
			<input type="hidden" name="index_text[]" value="${count}">
			<button type="button" class="remove-text-button">Remove</button>
			<br><br>`;
	}

	function sliderHtml(count) {
		return `<label for="slider_item_${count}">Smart Item:</label><br>
			<input type="text" name="slider_items[]" id="slider_item_${count}" class="regular-text"><br>
			<label for="slider_image_${count}">Image:</label><br>
			<input type="file" name="slider_images[]" id="slider_image_${count}"><br>
			<label for="slider_text_${count}">Text:</label><br>
			<input type="text" name="slider_texts[]" id="slider_text_${count}" class="regular-text"><br>
			<button type="button" class="remove-slider">Remove</button><br><br>`;
	}

	function attachRemoveEvent(a, b) {
		a.addEventListener('click', function (e) {
			if (e.target.classList.contains(b)) {
				e.target.parentElement.remove();
			}
		});
	}

	if (sliderContainer) {
		addField(
			addSliderButton,
			sliderCount,
			'slider-entry',
			sliderHtml,
			sliderContainer
		);
		attachRemoveEvent(sliderContainer, 'remove-slider');
	}

	if (customContainer) {
		addField(
			addTextButton,
			0,
			'custom-text-entry',
			textHtml,
			customContainer
		);
		addField(
			addImageButton,
			0,
			'custom-img-entry',
			imgHtml,
			customContainer
		);
		attachRemoveEvent(customContainer, 'remove-text-button');
		attachRemoveEvent(customContainer, 'remove-image');
	}
});
