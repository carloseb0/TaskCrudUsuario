import './bootstrap';
import Inputmask from 'inputmask';

document.addEventListener("DOMContentLoaded", function(){
    
    var cpfMask = new Inputmask("999.999.999-99", {
        placeholder: "", 
        showMaskOnHover: false,
        showMaskOnFocus: false
    });

    cpfMask.mask(document.querySelectorAll('#cpfcnpj'));

    var telefone = new Inputmask("(99) 9 9999-9999", {
        placeholder: "", 
        showMaskOnHover: false,
        showMaskOnFocus: false
    });
    telefone.mask(document.querySelectorAll('#telefone'));

    var danascimento = new Inputmask("99/99/9999", {
        placeholder: "", 
        showMaskOnHover: false,
        showMaskOnFocus: false
    });
    danascimento.mask(document.querySelectorAll('#danascimento'));

    var cepmask = new Inputmask("99999-999", {
        placeholder: "", 
        showMaskOnHover: false,
        showMaskOnFocus: false
    });
    cepmask.mask(document.querySelectorAll('#cep'));

});

const cep = document.querySelector('#cep');
const estado = document.querySelector('#estado');
const bairro = document.querySelector('#bairro');
const endereco = document.querySelector('#endereco');
const cidade = document.querySelector('#cidade');
const message = document.querySelector('#message');
cep.addEventListener("focusout", async function(){
    try {
        const cepValue = cep.value.replace('-', '');
        const response = await fetch(`https://viacep.com.br/ws/${cepValue}/json/`);

        if (!response.ok) {
            throw await response.json();
        }
        
        const responseCep = await response.json();
        
        endereco.value = responseCep.logradouro;
        bairro.value = responseCep.bairro;
        estado.value = responseCep.uf;
        cidade.value = responseCep.localidade;

    } catch (error) {
        if (error?.cep_error) {
            message.textContent = error.cep_error;
            setTimeout(() => {
                message.textContent = '';
            }, 5000);
        }
        console.log(error);
    }

});


const messagecpf = document.querySelector('#messagecpf');
const cpfInput = document.querySelector('#cpfcnpj');

cpfInput.addEventListener("focusout", function() {
    const cpf = cpfInput.value.replace(/[^\d]+/g,''); 
    if (!isValidCPF(cpf)) {
        messagecpf.textContent = 'CPF inválido';
        setTimeout(() => {
            messagecpf.textContent = '';
        }, 5000);
    } else {
        messagecpf.textContent = '';
    }
});

function isValidCPF(strCPF) {
    var Soma;
    var Resto;
    Soma = 0;
    if (strCPF.length !== 11 || strCPF == "00000000000") return false;

    for (var i = 1; i <= 9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11)) Resto = 0;
    if (Resto != parseInt(strCPF.substring(9, 10))) return false;

    Soma = 0;
    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;

    if ((Resto == 10) || (Resto == 11)) Resto = 0;
    if (Resto != parseInt(strCPF.substring(10, 11))) return false;

    return true;
}

document.addEventListener('DOMContentLoaded', function () {
    // Seleciona todos os links com a classe 'btn-desativar'
    const desativarLinks = document.querySelectorAll('.btn-desativar');

    desativarLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            // Previne a navegação automática para a URL
            event.preventDefault();

            // Exibe a caixa de confirmação
            const confirmation = confirm('Tem certeza que deseja desativar este usuário?');

            // Se o usuário confirmar, redireciona para o link
            if (confirmation) {
                window.location.href = link.href;
            }
        });
    });
});