const timeLineData = [
	{
		stepName: 'Title 1',
		stepDescription:
			'Our IT consulting specialists analyze your existing software solutions and their usage by your staff to identify workflow and automation issues.',
	},
	{
		stepName: 'Title 2',
		stepDescription:
			'The consultants create a roadmap and strategy to leverage advanced technology and streamline your software infrastructure, then set KPIs for software performance and employee efficiency.',
	},
	{
		stepName: 'Title 3',
		stepDescription:
			'Effective IT consulting requires collaboration between the client and the consulting company. Our experts analyze your workflows, identify issues, and our developers address the hindering factors',
	},
	{
		stepName: 'Title 4',
		stepDescription:
			'Once the initial goals are achieved, our software engineers and IT consulting advisors recommend future enhancements and assist with their implementation.',
	},
];

// Handle render timeliness
function renderTimeline(data) {
	let currentIndex = 0;
	const timelineContainer = document.getElementById('timeline-container');
	if (timelineContainer) {
		const dataString = data.map((item, index) => {
			if (index === currentIndex) {
				return `<button type="button" class="p-1 w-10 h-10 relative flex justify-center items-center border-4 border-solid rounded-full z-50 font-semibold step-item active"><span>${
					index + 1
				}</span><span class="absolute bottom-[-150%] text-nowrap">Step ${
					index + 1
				}</span></button>`;
			}
			return `<button type="button" class="p-1 w-10 h-10 relative flex justify-center items-center border-4 border-solid rounded-full z-50 font-semibold step-item"><span>${
				index + 1
			}</span><span class="absolute bottom-[-150%] text-nowrap">Step ${
				index + 1
			}</span></button>`;
		});
		timelineContainer.innerHTML = dataString.join('');
		document.getElementById('progress-container').style.display = 'block';

		function stepDescription(index) {
			document.getElementById('step-title').textContent = `Step ${
				index + 1
			}: ${timeLineData[index]?.stepName}`;
			document.getElementById('step-description').textContent =
				timeLineData[index]?.stepDescription;
		}

		stepDescription(currentIndex);
		//Init progressbar
		const progressBar = document.getElementById('progress-bar');
		const spaceStep = data.length - 1;
		const spaceStepPerCentwithDot = 100 / spaceStep;
		const spaceStepPercent = 100 / spaceStep / 2;
		progressBar.style.width = spaceStepPercent + '%';
		//Handle click step
		const stepItems = document.querySelectorAll('.step-item');
		stepItems.forEach(
			(stepBtn, index) =>
				(stepBtn.onclick = function (e) {
					stepDescription(index);
					for (i = 0; i < data.length; i++) {
						if (i <= index) {
							stepItems[i].classList.add('active');
						} else {
							stepItems[i].classList.remove('active');
						}
					}
					// set progress bar
					if (index === 0) {
						progressBar.style.width = spaceStepPercent + '%';
					} else if (index === data.length - 1) {
						progressBar.style.width = 100 + '%';
					} else {
						console.log(
							index * spaceStepPerCentwithDot + spaceStepPercent
						);
						progressBar.style.width =
							index * spaceStepPerCentwithDot +
							spaceStepPercent +
							'%';
					}
				})
		);
	}
}

//Check data before render
if (Array.isArray(timeLineData) && timeLineData.length > 0) {
	renderTimeline(timeLineData);
}

window.addEventListener('load', function () {
	// Khi toàn bộ trang và tài nguyên đã tải xong, ẩn màn hình loading
	var loadingScreen = document.getElementById('wap-loading');
	if (loadingScreen) {
		loadingScreen.classList.add('hidden');
		setTimeout(() => {
			loadingScreen.classList.add('d-none');
		}, 100);
	}
});
