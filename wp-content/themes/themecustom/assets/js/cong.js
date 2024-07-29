const cardData = [
  {
    id: "1",
    category: "Education",
    title: "Social Ethics And Technology Design",
    description:
      "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
    imageUrl: "/assets/img/home/img2.png",
  },
  {
    id: "2",
    category: "Financial Services",
    title: "Jodie Jackson on why mainstream media needs to be disrupted",
    description:
      "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
    imageUrl: "/assets/img/home/img1.png",
  },
  {
    id: "3",
    category: "Retail",
    title: "Health-Centered Design Talk at HXD Conference",
    description:
      "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
    imageUrl: "/assets/img/home/img.png",
  },
  {
    id: "4",
    category: "Education",
    title: "Social Ethics And Technology Design",
    description:
      "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
    imageUrl: "/assets/img/home/img2.png",
  },
  {
    id: "5",
    category: "Financial Services",
    title: "Jodie Jackson on why mainstream media needs to be disrupted",
    description:
      "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
    imageUrl: "/assets/img/home/img1.png",
  },
  {
    id: "6",
    category: "Retail",
    title: "Health-Centered Design Talk at HXD Conference",
    description:
      "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
    imageUrl: "/assets/img/home/img.png",
  },
  {
    id: "7",
    category: "Education",
    title: "Social Ethics And Technology Design",
    description:
      "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
    imageUrl: "/assets/img/home/img2.png",
  },
  {
    id: "8",
    category: "Financial Services",
    title: "Jodie Jackson on why mainstream media needs to be disrupted",
    description:
      "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
    imageUrl: "/assets/img/home/img1.png",
  },
  {
    id: "9",
    category: "Retail",
    title: "Health-Centered Design Talk at HXD Conference",
    description:
      "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
    imageUrl: "/assets/img/home/img.png",
  },
  {
    id: "10",
    category: "Education",
    title: "Social Ethics And Technology Design",
    description:
      "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
    imageUrl: "/assets/img/home/img2.png",
  },
  {
    id: "11",
    category: "Financial Services",
    title: "Jodie Jackson on why mainstream media needs to be disrupted",
    description:
      "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
    imageUrl: "/assets/img/home/img1.png",
  },
  {
    id: "12",
    category: "Retail",
    title: "Health-Centered Design Talk at HXD Conference",
    description:
      "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
    imageUrl: "/assets/img/home/img.png",
  },
];

function createCard(card) {
  return `
      <div class="flex flex-col max-md:ml-0 max-md:w-full">
          <div class="flex flex-col font-semibold text-primary md:mb-16">
              <img
                  loading="lazy"
                  src="${card.imageUrl}"
                  class="w-full aspect-[1.56] rounded"
              />
              <div class="justify-center self-start px-2 py-1 mt-4 text-xs leading-5 whitespace-nowrap bg-[#C3E1A6] rounded">
                  ${card.category}
              </div>
              <a href="/detailcasestudy.html?id=${card.id}" class="mt-4 text-base leading-6 text-ellipsis hover:text-secondary hover:underline active:text-secondary active:underline">
                  ${card.title}
              </a>
              <div class="mt-4 text-sm leading-6 text-[#A6A5A5]">
                  ${card.description}
              </div>
          </div>
      </div>
  `;
}

function renderCards(cards) {
  const cardsContainer = document.getElementById("cards-container");
  cardsContainer.innerHTML = cards.map(createCard).join("");
}

renderCards(cardData);


