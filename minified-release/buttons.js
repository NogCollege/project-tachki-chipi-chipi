let buttons = document.querySelectorAll('.button-cat')


let category = new Map([
    ['suv', document.querySelectorAll('.suv')],
    ['business', document.querySelectorAll('.business')],
    ['sport', document.querySelectorAll('.sport')],
    ['premium', document.querySelectorAll('.premium')],
    ['comfort', document.querySelectorAll('.comfort')]
    ]);

let allCards = document.querySelectorAll('.card')
    function DisplayCards(cat) {
        allCards.forEach((card) => {
        card.style.display = 'none' 
        })
        category.get(cat).forEach((card) => {
        card.style.display = 'flex'
        })
    }
        
for (let button of buttons) {
    button.addEventListener("click", function() {
    if (!button.classList.contains("selected_b")) {

    buttons.forEach((button) => {
    button.classList.remove("selected_b") // убираем класс у всех кнопок
    this.classList.add("selected_b") // добавляем класс к нажатой кнопке
    })
    DisplayCards(this.dataset.category)
    } else {

    }
    })
    }

    document.querySelector('.all_b').addEventListener('click', function(evt) {
        evt.preventDefault();
        allCards.forEach((card) => {
        card.style.display = 'flex';
        console.log("bloc")
        })
        buttons.forEach((button) => {
        button.classList.remove("button-active")
        console.log("bloc")
        })
        })