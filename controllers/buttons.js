let buttons = document.querySelectorAll('.button-cat')
let category = new Map([
    ['suv', document.querySelectorAll('.cat-suv')],
    ['business', document.querySelectorAll('.cat-business')],
    ['sport', document.querySelectorAll('.cat-sport')],
    ['premium', document.querySelectorAll('.cat-premium')],
    ['comfort', document.querySelectorAll('.cat-comfort')]
    ]);

let allCards = document.querySelectorAll('.glavniy')
function DisplayCards(cat) {
    allCards.forEach((card) => {
    card.style.display = 'none' 
    console.log("none")
    })
    category.get(cat).forEach((card) => {
    card.style.display = 'block'
    console.log("bloc")
    })
}
        
for (let button of buttons) {
    button.addEventListener("click", function() {
    if (!button.classList.contains("selected_b")) {
    console.log("Нажатие на неактивную кнопку")
    buttons.forEach((button) => {
    button.classList.remove("selected_b") // убираем класс у всех кнопок
    this.classList.add("selected_b") // добавляем класс к нажатой кнопке
    })
    DisplayCards(this.dataset.category)
    } else {
    console.log("Нажатие на активную кнопку")
    }
    })
    }