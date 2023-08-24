let products = {
  data: [
    {
      productName: "Controle NOX Krom Gaming KEY, PC, PS3, Android, Preto Fosco/Laranja - NXKROMKEY",
      category: "Video-Game",
      price: "R$ 99,90",
      priceOFER: "",
      image: "imagens/produtos/video-game3.jpg",
    },
    {
      productName: "Jogo Uncharted 4: A Thiefs End Hits PS4",
      category: "Jogos",
      price: "R$ 74,90",
      priceOFER: "",
      image: "imagens/produtos/jogo3.jpg",
    },
    {
      productName: "Headphone Exbom Gatinho Hf-c290bt Preto",
      category: "Fones",
      price: "R$ 66,35",
      priceOFER: "",
      image: "imagens/produtos/fone1.png",
    },
    {
      productName: "Jogo The Last Of Us Part II PS4",
      category: "Jogos",
      price: "R$ 139,90",
      priceOFER: "",
      image: "imagens/produtos/jogo1.png",
    },
    {
      productName: "Teclado Multilaser Slim Laser Resistente à Água ABNT2 - TC193",
      category: "Teclado",
      price: "R$ 26,90",
      priceOFER: "",
      image: "imagens/produtos/teclado1.jpg",
    },
    {
      productName: "Mouse Gamer Redragon Cobra, Chroma RGB, 12400DPI, 7 Botões, Preto - M711 V2",
      category: "Mouse",
      price: "",
      priceOFER: "R$ 114,90!",
      image: "imagens/produtos/mouse1.png",
    },
    {
      productName: "Fone De Ouvido Com Microfone Knup Kp-422 Rosa",
      category: "Fones",
      price: "R$ 42,90",
      priceOFER: "",
      image: "imagens/produtos/fone4.jpg",
    },
    {
      productName: "Capa Capinha Case Skin P/ Controle De Ps5 Playstation 5 Protetora Em Silicone Camuflado Alta Proteção Cor: Graffiti 07",
      category: "Video-Game",
      price: "R$ 59,90",
      priceOFER: "",
      image: "imagens/produtos/video-game1.jpg",
    },
    {
      productName: "Fone De Ouvido Intra Auricular Com Microfone Oex Tune Fn402 Preto",
      category: "Fones",
      price: "R$ 19,90",
      priceOFER: "",
      image: "imagens/produtos/fone3.jpg",
    },
    {
      productName: "Capa para Joystick PS4 de Silicone Trust GXT 744R, Vermelho - 21214",
      category: "Video-Game",
      price: "R$ 29,90",
      priceOFER: "",
      image: "imagens/produtos/video-game2.jpg",
    },
    {
      productName: "Jogo Marvel's Spider-Man: Miles Morales PS4",
      category: "Jogos",
      price: "R$ 169,90",
      priceOFER: "",
      image: "imagens/produtos/jogo2.png",
    },
    {
      productName: "Combo Teclado e Mouse sem fio Logitech MK235 com Conexão USB, Pilhas Inclusas e Layout ABNT2 - 920-007903",
      category: "Teclado",
      price: "R$ 133,90",
      priceOFER: "",
      image: "imagens/produtos/teclado2.jpg",
    },
    {
      productName: "Mouse Bright Standart, USB, Prata - 107",
      category: "Mouse",
      price: "R$ 9,90",
      priceOFER: "",
      image: "imagens/produtos/Prod-mouse2.jpg",
    },
    {
      productName: "Mouse sem fio Logitech MX Master 3 com Sensor Darkfield para Qualquer Superfície, USB Unifying ou Bluetooth, Recarregável - 910-005647",
      category: "Mouse",
      price: "R$ 428,90",
      priceOFER: "",
      image: "imagens/produtos/Prod-mouse3.jpg",
    },
    {
      productName: "Teclado e Mouse Sem Fio Multilaser Slim 2.4Ghz ABNT 2 Preto - TC212",
      category: "Teclado",
      price: "R$ 69,90",
      priceOFER: "",
      image: "imagens/produtos/teclado3.jpg",
    },
  ],
};

for (let i of products.data) {
  //Create Card
  let card = document.createElement("div");
  //Card should have category and should stay hidden initially
  card.classList.add("card", i.category, "hide");
  //image div
  let imgContainer = document.createElement("div");
  imgContainer.classList.add("image-container");
  //img tag
  let image = document.createElement("img");
  image.setAttribute("src", i.image);
  imgContainer.appendChild(image);
  card.appendChild(imgContainer);
  //container
  let container = document.createElement("div");
  container.classList.add("container");
  //product name
  let name = document.createElement("h5");
  name.classList.add("product-name");
  name.innerText = i.productName.toUpperCase();
  container.appendChild(name);
  //price
  let price = document.createElement("tentativa");
  price.innerText =i.price;
  container.appendChild(price);
  //priceOFER
  let priceOFER = document.createElement("h2");
  priceOFER.innerText =i.priceOFER;
  container.appendChild(priceOFER);

  card.appendChild(container);
  document.getElementById("products").appendChild(card);
}

//parameter passed from button (Parameter same as category)
function filterProduct(value) {
  //Button class code
  let buttons = document.querySelectorAll(".button-value");
  buttons.forEach((button) => {
    //check if value equals innerText
    if (value.toUpperCase() == button.innerText.toUpperCase()) {
      button.classList.add("active");
    } else {
      button.classList.remove("active");
    }
  });

  //select all cards
  let elements = document.querySelectorAll(".card");
  //loop through all cards
  elements.forEach((element) => {
    //display all cards on 'all' button click
    if (value == "Todos") {
      element.classList.remove("hide");
    } else {
      //Check if element contains category class
      if (element.classList.contains(value)) {
        //display element based on category
        element.classList.remove("hide");
      } else {
        //hide other elements
        element.classList.add("hide");
      }
    }
  });
}

//Search button click
document.getElementById("search").addEventListener("click", () => {
  //initializations
  let searchInput = document.getElementById("search-input").value;
  let elements = document.querySelectorAll(".product-name");
  let cards = document.querySelectorAll(".card");

  //loop through all elements
  elements.forEach((element, index) => {
    //check if text includes the search value
    if (element.innerText.includes(searchInput.toUpperCase())) {
      //display matching card
      cards[index].classList.remove("hide");
    } else {
      //hide others
      cards[index].classList.add("hide");
    }
  });
});

//Initially display all products
window.onload = () => {
  filterProduct("Todos");
};