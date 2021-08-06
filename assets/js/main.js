function runAgeVerifier(){
    const main = document.querySelector('main')
    const popup = document.getElementById('age-verifier-popup')

    main.classList.add('main-hidden')
    popup.style.display = 'block'

}

function ageVerifierConfirm(){
    const main = document.querySelector('main')
    const popup = document.getElementById('age-verifier-popup')

    localStorage.setItem('centralDistrictAge', 'granted')

    main.classList.remove('main-hidden')
    popup.style.display = 'none'
}

function ageVerifierNegation(){
    const popup = document.getElementById('age-verifier-popup')
    popup.style.display = 'none'
}
