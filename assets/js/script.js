const listeSectionVoiture = document.querySelectorAll('.section-voiture')
let index = 0
listeSectionVoiture[0].classList.remove("hidden")


const BoutonPrecedent = document.getElementById('buttonprecedent')
BoutonPrecedent.addEventListener('click', evenementPrecedent)


const BoutonSuivant = document.getElementById('bouttonsuivant')
BoutonSuivant.addEventListener('click', evenementSuivant)

function evenementSuivant() {
    listeSectionVoiture[index].classList.add('hidden')
    index++

    if(index >= listeSectionVoiture.length) {
        index =0
    }

    listeSectionVoiture[index].classList.remove('hidden')

    
}

function evenementPrecedent() {
    listeSectionVoiture[index].classList.add('hidden')
    index--

    if (index < 0) {
        index = listeSectionVoiture.length - 1
    }

    listeSectionVoiture[index].classList.remove('hidden')
}