document.getElementById("icpf").focus();

const input = document.querySelector("#icpf")
input.addEventListener('keypress', () =>{
    let inputlength = input.value.length
   if (inputlength === 3 || inputlength ===7 ) {
    input.value += '.'
   } else if (inputlength === 11) {
     input.value += '-'
   } else if (inputlength === 14) {
    document.getElementById("isenha").focus();
   }
} )




function fazerLogin() {
    mostrarloading()
    var cpf = document.getElementById('icpf').value;
    var senha = document.getElementById('isenha').value;
    var erromsg = document.getElementById('erromsg');
    if (cpf === '') {
        setTimeout(function() { esconderloading()}, 20);
        erromsg.style.display = 'block';
        erromsg.innerHTML = 'O campo de CPF está vazio. Preencha por favor.';
        return;
    }
    else if (senha === '') {
        setTimeout(function() { esconderloading()}, 20);
        erromsg.style.display = 'block';
        erromsg.innerHTML = 'O campo de senha está vazio. Preencha por favor.';
        return;
    } else if (senha.length < 8) {
        setTimeout(function() { esconderloading()}, 20);
        erromsg.style.display = 'block';
        erromsg.innerHTML = 'A senha deve conter 8 ou mais dígitos. Tente novamente';
        return;
    } else {
        erromsg.style.display = 'none';
    }


fetch('login.php', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
    },
    body: 'cpf=' + encodeURIComponent(cpf) + '&senha=' + encodeURIComponent(senha),
})

    .then(response => response.json())
    .then(data => {
        esconderloading();
        if (data.success) {
            setTimeout(function() {
                window.location.href = 'dashboard.php';
            }, 2000);
            alert(data.message);
            erromsg.classList.remove('alert-danger');
            erromsg.classList.add('alert-success');
            erromsg.innerHTML = data.message;
            erromsg.style.display = 'block';
            esconderloading()
        } else {
            erromsg.style.display = 'block';
            erromsg.innerHTML = data.message
        }
    })
    .catch(error => {
        console.error('Erro na requisição', error);
    });
}

function mostrarloading() {
    var divProcessando = document.createElement('div');
    divProcessando.id = 'processandoDiv';
    divProcessando.style.position = 'fixed';
    divProcessando.style.top = '80%';
    divProcessando.style.left = '48%';
    divProcessando.style.transform = 'translate(-50%, -50%)';
    divProcessando.innerHTML = '<img src="./img/loading.gif" width="100px" alt="Carregando" title="Processando...">';
    document.body.appendChild(divProcessando);
}
function esconderloading() {
    var divProcessando = document.getElementById('processandoDiv');
    if (divProcessando) {
        document.body.removeChild(divProcessando);
    }
}


function carregaMenu(controle) {
    fetch('controle.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'controle=' + encodeURIComponent(controle),
    })
        .then(response => response.text())
        .then(data => {
            document.getElementById('show').innerHTML = data;
        })
        .catch(error => console.error('Erro na requisição:', error));
}


