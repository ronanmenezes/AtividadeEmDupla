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


const clienteModalInstacia = new bootstrap.Modal(document.getElementById('modalAddCliente'));
const clienteModal = document.getElementById('modalAddCliente');
const inNome = document.getElementById('inNome');
const inCpf = document.getElementById('inCpf');
const inTelefone = document.getElementById('inTelefone');
const btnAddCliente = document.getElementById('btnAddCliente');
const formAddCliente = document.getElementById('frmAddCliente');

if (clienteModal) {

    const formAddCliente = document.getElementById('frmAddCliente');

    clienteModal.addEventListener('shown.bs.modal', () => {


        const input = document.querySelector("#inCpf")
        input.addEventListener('keypress', () => {
            let inputlength = input.value.length
            if (inputlength === 3 || inputlength === 7) {
                input.value += '.'
            } else if (inputlength === 11) {
                input.value += '-'
            } else if (inputlength === 14) {
                document.getElementById("inTelefone").focus();

            }

        })

        const inputt = document.querySelector("#inTelefone")
        inputt.addEventListener('keypress', () => {
            let inputlength = inputt.value.length
            if (inputlength === 0) {
                inputt.value += '('
            } else if (inputlength === 3) {
                inputt.value += ')'
            }
            else if (inputlength === 9) {
                inputt.value += '-'
            }
        })


        const SubmitHandler = function (event) {
            event.preventDefault();
            btnAddCliente.disabled = true;

            var form = event.target;
            var formData = new FormData(form);
            formData.append('controle', 'clienteAdd');
            fetch('controle.php', {
                method: 'POST',
                body: formData,
            })
                .then(response => response.json())
                .then(data => {
                    if (data.sucesso) {
                        form.reset();
                        btnAddCliente.disabled = false;
                        form.removeEventListener('submit', SubmitHandler);
                        clienteModalInstacia.hide();
                        setTimeout(function () {
                            alert(data.mensagem);
                            var atualizar = data.atualizar;
                            carregaMenu(atualizar);
                        }, 700);
                    } else {
                        console.error('Erro na requisição de retorno');
                    }
                })
                .catch(error => {
                    console.error('Erro na requisição:', error);
                });
        };
        formAddCliente.addEventListener('submit', SubmitHandler);
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

function deletarGeralC(controle, id) {
    fetch('controle.php', {
        method: 'POST',
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body: 'controle=' + encodeURIComponent(controle) + '&id=' + encodeURIComponent(id)
    })

        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data.success) {
                mostrarloading()
                alert('Excluído com sucesso');
                setTimeout(function () { esconderloading() }, 20);
                carregaMenu("listarCliente");
            }
            else {
                alert('Ocorreu um erro ao excluir');
                setTimeout(function () { esconderloading() }, 20);
                carregaMenu("listarCliente");
            }
        })
        .catch((error) => console.error("Erro na requisição:", error));
}


const servicoModalInstacia = new bootstrap.Modal(document.getElementById('modalAddServico'));
const servicoModal = document.getElementById('modalAddServico');
const inServico = document.getElementById('inServico');
const btnAddServico = document.getElementById('btnAddServico');
const formAddServico = document.getElementById('frmAddServico');




