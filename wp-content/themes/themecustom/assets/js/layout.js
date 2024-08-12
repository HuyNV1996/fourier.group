const modal = document.getElementById('modalSupport');
const btnShowModal = document.querySelectorAll('.showModal');
const btnClose = document.getElementById('closeModal');

btnShowModal.forEach((item) =>
	item.addEventListener('click', (e) => {
		modal.classList.remove('hidden');
		document.body.style.overflowY = 'hidden';
	})
);

btnClose.addEventListener('click', (e) => {
	modal.classList.add('hidden');
	document.body.style.overflowY = 'auto';
});

var menuItem = document.getElementById('menu-item-133');
var megaMenuContent = document.getElementsByClassName('mega-menu-content');
document.addEventListener('DOMContentLoaded', function () {
	const menuMobileItem = document.querySelector('#menu-mobile .item-menu-mb');
	const menuMobile = document.querySelector('#menu-mobile .menu-item-133');

	if (menuMobileItem) {
		menuMobileItem.classList.add('hidden');
	}

	if (menuMobile) {
		menuMobile.addEventListener('click', (e) => {
			menuMobileItem.classList.toggle('hidden');
		});
	}
});

if (menuItem) {
	var anchorTag = menuItem.querySelector('a');
	anchorTag.insertAdjacentHTML(
		'beforeend',
		'<i class="bx bx-chevron-down text-base"></i>'
	);
}

if (menuItem && megaMenuContent.length > 0) {
	menuItem.addEventListener('mouseenter', function () {
		for (var i = 0; i < megaMenuContent.length; i++) {
			megaMenuContent[i].classList.remove('hidden');
		}
	});

	menuItem.addEventListener('mouseleave', function () {
		for (var i = 0; i < megaMenuContent.length; i++) {
			var time = setTimeout(
				(function (i) {
					return function () {
						megaMenuContent[i].classList.add('hidden');
					};
				})(i),
				200
			);

			megaMenuContent[i].addEventListener('mouseenter', function () {
				clearTimeout(time);
			});

			megaMenuContent[i].addEventListener('mouseleave', function () {
				this.classList.add('hidden');
			});
		}
	});
}

const menuMobile = document.getElementById('menu-mobile');
const toggleMenu = document.getElementById('toggleMenu');

toggleMenu.addEventListener('click', () => {
	menuMobile.classList.toggle('active');
	if (menuMobile.classList.contains('active')) {
		toggleMenu.querySelector('i').classList.replace('bx-menu', 'bx-x');
		document.body.style.overflowY = 'hidden';
	} else {
		toggleMenu.querySelector('i').classList.replace('bx-x', 'bx-menu');
		document.body.style.overflowY = 'auto';
	}
});

document.querySelector('main').style.marginTop =
	document.querySelector('header').offsetHeight;

let translator;

function googleTranslateElementInit() {
	translator = new google.translate.TranslateElement(
		{
			pageLanguage: 'en', // Set default language to English
			autoDisplay: false,
		},
		'google_translate_element'
	);

	// Remove Google Translate tooltip
	const removePopup = document.getElementById('goog-gt-tt');
	if (removePopup) {
		removePopup.parentNode.removeChild(removePopup);
	}

	const customDropdown = document.querySelector('#select-language-option');

	const observer = new MutationObserver((mutationsList) => {
		for (const mutation of mutationsList) {
			if (mutation.type === 'childList') {
				const googleDropdown = document.querySelector(
					'#google_translate_element .goog-te-combo'
				);

				if (
					googleDropdown &&
					customDropdown &&
					googleDropdown.innerHTML !== ''
				) {
					const options = googleDropdown.options;
					const selectedValue = customDropdown.value;
					customDropdown.innerHTML =
						'<option value="">Select Language</option>';
					Array.from(options).forEach((option) => {
						const newOption = document.createElement('option');
						newOption.value = option.value;
						newOption.text = option.text;
						customDropdown.appendChild(newOption);
					});
					customDropdown.value = selectedValue;
				}
			}
		}
	});

	const targetNode = document.getElementById('google_translate_element');
	observer.observe(targetNode, { childList: true, subtree: true });

	customDropdown.addEventListener('change', () => {
		const languageChangeTo = customDropdown.value;
		if (languageChangeTo === 'en') {
			restoreDefaultLanguage();
		} else {
			doGTranslate(`en|${languageChangeTo}`);
		}
	});
}

function restoreDefaultLanguage() {
	const translateDocument = document.querySelector('#\\:1\\.container');
	if (!translateDocument) return;
	const restoreButton =
		translateDocument.contentDocument.querySelector('#\\:1\\.restore');
	if (restoreButton) {
		restoreButton.click();
	}
}

function GTranslateFireEvent(element, event) {
	try {
		if (document.createEvent) {
			const evt = document.createEvent('HTMLEvents');
			evt.initEvent(event, true, true);
			element.dispatchEvent(evt);
		} else {
			const evt = document.createEventObject();
			element.fireEvent('on' + event, evt);
		}
	} catch (e) {}
}

function doGTranslate(langPair) {
	if (!langPair) return;
	const lang = langPair.split('|')[1];
	const select = document.querySelector('.goog-te-combo');
	if (select) {
		select.value = lang;
		GTranslateFireEvent(select, 'change');
		const customDropdown = document.querySelector(
			'#select-language-option'
		);
		if (customDropdown) {
			customDropdown.value = lang;
		}
	}
}

function clearGoogleTranslateCache() {
	const googleTranslateContainer = document.getElementById(
		'google_translate_element'
	);
	if (googleTranslateContainer) {
		googleTranslateContainer.innerHTML = '';
		// Recreate Google Translate element
		const script = document.createElement('script');
		script.type = 'text/javascript';
		script.src =
			'https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit&r=' +
			new Date().getTime();
		document.head.appendChild(script);
	}
}

document.addEventListener('DOMContentLoaded', function () {
	clearGoogleTranslateCache();
});

const menuI = document.querySelector('.menu-item');
const subMenu = menuI.querySelector('.sub-menu');
menuI.addEventListener('mouseover', function () {
	if (subMenu) {
		subMenu.style.display = 'block';
	}
});

menuI.addEventListener('mouseout', function () {
	if (subMenu) {
		subMenu.style.display = 'none';
	}
});
