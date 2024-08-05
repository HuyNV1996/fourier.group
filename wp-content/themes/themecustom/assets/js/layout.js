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
