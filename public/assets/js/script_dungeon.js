// On cible les input
let titleDj = document.getElementById('titleDj');
let descriptDj = document.getElementById('descriptDj');
let screenDj = document.getElementById('screenDj');
let age = document.getElementById('age');

// On cible les éléments Small du Dom
// let titleDjSmall = document.getElementById('titleDjSmall');
// let descriptDjSmall = document.getElementById('descriptDjSmall');
// let screenDjSmall = document.getElementById('screenDjSmall');
// let ageSmall = document.getElementById('ageSmall');

// On cible le bouton cloneur
let clonePreset = document.getElementById('clonePreset');

let removeCloneButton = document.getElementById('removeClone');

// création d'un compteur permettant de générer des id différents pour les clones
let counter = 0;

const cloneForm = () => {
    // On cible le bloc HTML à cloner
    let toClone = document.getElementById('toClone');

    // On crée une copie de l'élément HTML dans la variable clone
    let cloned = toClone.cloneNode(true);

     // On ajoute la classe "cloned-form" aux éléments clonés pour permettre de les ciblés pour les supprimer
    cloned.classList.add('cloned-form');

    // On modifie l'id du clone
    counter++;
    cloned.id = cloned.id + counter;

    // On modifie les valeurs indispensables du clone
    let labels = cloned.querySelectorAll('label');
    labels.forEach(label => {
        label.setAttribute('for', label.getAttribute('for') + counter);
    })

    let inputs = cloned.querySelectorAll('input');
    inputs.forEach(input => {
        input.setAttribute('id', input.getAttribute('id') + counter);
        input.value = '';
    });


    let smalls = cloned.querySelectorAll('small');
    smalls.forEach(small => {
        small.setAttribute('id', small.getAttribute('id') + counter);
    })

    // On cible l'emplacement ou cloner et on clone
    let clones = document.getElementById('clones');
    clones.append(cloned);

}

// const submitForm = (event) => {
//     event.preventDefault();
//     let titlesDj = document.querySelectorAll('.titleDj');
//     let descriptsDj = document.querySelectorAll('.descriptDj');
//     let screensDj = document.querySelectorAll('.screenDj');

//     nbItems = titlesDj.length;
//     for (i = 0; i < nbItems; i++) {

//         datas.innerHTML += `<div>${titlesDj[i].value}  ${descriptsDj[i].value} ${screensDj[i].value}">${screensDj[i].value}</div>`;
//     }

// }

const removeClone = () => {
    // On vérifie si il y a des formulaires cloné à l'aide de leur id préalablement crée
    let clones = document.querySelectorAll('.cloned-form');
    if (clones.length > 0) {
        // on supprime ici le dernier clone 
        let lastClone = clones[clones.length - 1];
        lastClone.remove();
    }
};


// Création d'un écouteur d'évènement sur le bouton clone!
clonePreset.addEventListener('click', cloneForm);

// Création d'un écouteur d'événement pour le bouton "-" afin de les supprimer si besoin
removeCloneButton.addEventListener('click', removeClone);

// myForm.addEventListener('submit', submitForm)