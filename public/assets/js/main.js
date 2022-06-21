const input = document.getElementById('cnpj')

input.addEventListener('keypress', () =>{
    let inputlength = input.value.length

    if(inputlength === 2 || inputlength === 6){
        input.value += '.'
    }else if(inputlength === 10){
        input.value += '/'
    }else if(inputlength === 15){
        input.value += '-'
    }


})