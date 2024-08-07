const progressData = [
	{
		title: 'Internship program',
		description:
			'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui earum cumque, voluptatibus repellendus similique blanditiis, eos optio velit eligendi nihil ipsa, nostrum consequuntur expedita suscipit ipsum ratione vel voluptate necessitatibus?',
	},
	{
		title: 'Fresher program',
		description:
			'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui earum cumque, voluptatibus repellendus similique blanditiis, eos optio velit eligendi nihil ipsa, nostrum consequuntur expedita suscipit ipsum ratione vel voluptate necessitatibus?',
	},
	{
		title: 'Business Analyst',
		description:
			'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui earum cumque, voluptatibus repellendus similique blanditiis, eos optio velit eligendi nihil ipsa, nostrum consequuntur expedita suscipit ipsum ratione vel voluptate necessitatibus?',
	},
	{
		title: 'Tester',
		description:
			'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui earum cumque, voluptatibus repellendus similique blanditiis, eos optio velit eligendi nihil ipsa, nostrum consequuntur expedita suscipit ipsum ratione vel voluptate necessitatibus?',
	},
	{
		title: 'UI/UX',
		description:
			'Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui earum cumque, voluptatibus repellendus similique blanditiis, eos optio velit eligendi nihil ipsa, nostrum consequuntur expedita suscipit ipsum ratione vel voluptate necessitatibus?',
	},
];

const progressContain = document.getElementById('progressItem');
const progressDetail = document.getElementById('progressDetail');

const strData = progressData.map((item, index) => {
	return `<button type="button" class="item-progress ${
		index === 0 && 'active'
	} text-center py-5 px-3 flex-1 min-w-[200px]">${item.title}</button>`;
});
const strDetail = progressData.map((item, index) => {
	return `<div class="prgDetail ${index !== 0 && 'hidden'} max-w-layout">
  <div class="flex-col p-10 rounded-lg bg-[#E1E1E1] max-md:px-5 max-md:max-w-full">
    <div class="text-2xl font-bold leading-8 max-md:max-w-full">
      ${item.title}
    </div>
    <div class="shrink-0 mt-6 h-px border border-solid bg-neutral-400 border-neutral-400 max-md:max-w-full">
    </div>
    <div class="mt-6 text-base leading-6 max-md:max-w-full">
    ${item.description}
    </div>
  </div>
</div>`;
});

var baseUrl = progressDetail.getAttribute('data-base-url');
progressContain.innerHTML = strData.join('').toString();
console.log(baseUrl);
progressDetail.innerHTML =
	`<div class="tamgiac absolute w-10 h-10 -top-9 -translate-x-[50%]"><img src="${baseUrl}/assets/img/home/polygon.png" alt="tamgiac"></div>` +
	strDetail.join('').toString();

const prgDetail = document.querySelectorAll('.prgDetail');
const itemProgress = document.querySelectorAll('.item-progress');
const tamgiac = document.querySelector('.tamgiac');

let spaceItem = 100 / progressData.length; // 20
let spaceItemBetween = 100 / progressData.length / 2; // 10

tamgiac.style.left = spaceItemBetween + '%';

itemProgress.forEach((item, index) =>
	item.addEventListener('click', (e) => {
		itemProgress.forEach((oldItem, idx) => {
			oldItem.classList.remove('active');
			prgDetail[idx].classList.add('hidden');
		});
		item.classList.add('active');
		tamgiac.style.left = `${spaceItemBetween + spaceItem * index}%`;
		item.scrollIntoView({ behavior: 'smooth' });
		prgDetail[index].classList.remove('hidden');
	})
);
