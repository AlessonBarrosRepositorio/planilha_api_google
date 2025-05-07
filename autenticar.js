

function verificarCampos() {
    const condominio = document.getElementById('condominio').value.trim();
    const nome = document.getElementById('nome').value.trim();
    const cpf = document.getElementById('cpf').value.trim();
    const whatsapp = document.getElementById('whatsapp').value.trim();
    const email = document.getElementById('email').value.trim();
    const residencia = document.getElementById('residencia').value.trim();

    const cpfValido = validarCPF(cpf.replace(/\D/g, ''));
    const emailValido = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(email);

    const botao = document.getElementById('enviar');

    const todosPreenchidos = condominio && nome && cpf && whatsapp && email && residencia;
    const semErrosVisiveis = document.getElementById('cpf-erro').style.display === 'none' &&
                            document.getElementById('email-erro').style.display === 'none';

    if (todosPreenchidos && cpfValido && emailValido && semErrosVisiveis) {
        botao.disabled = false;
    } else {
        botao.disabled = true;
    }
}
    ['condominio', 'nome', 'cpf', 'whatsapp', 'email', 'residencia'].forEach(id => {
document.getElementById(id).addEventListener('input', verificarCampos);
});

document.getElementById('email').addEventListener('input', function(e) {
const email = e.target.value;
const erro = document.getElementById('email-erro');


const regex = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;

if (email.length > 0 && !regex.test(email)) {
    erro.style.display = 'inline';
} else {
    erro.style.display = 'none';
}
verificarCampos();
});
document.getElementById('whatsapp').addEventListener('input', function (e) {
let value = e.target.value;

// Remove tudo que não for número
value = value.replace(/\D/g, '');

// Aplica a formatação (00) 9 0000-0000
value = value.replace(/^(\d{2})(\d)/, '($1) $2');
value = value.replace(/(\d{1})(\d{4})(\d{4})$/, '$1 $2-$3');

e.target.value = value;
});

function validarCPF(cpf) {
cpf = cpf.replace(/[^\d]+/g, '');

if (cpf.length !== 11 || /^(\d)\1+$/.test(cpf)) return false;

let soma = 0;
for (let i = 0; i < 9; i++) {
    soma += parseInt(cpf.charAt(i)) * (10 - i);
}

let resto = (soma * 10) % 11;
if (resto === 10 || resto === 11) resto = 0;
if (resto !== parseInt(cpf.charAt(9))) return false;

soma = 0;
for (let i = 0; i < 10; i++) {
    soma += parseInt(cpf.charAt(i)) * (11 - i);
}

resto = (soma * 10) % 11;
if (resto === 10 || resto === 11) resto = 0;

return resto === parseInt(cpf.charAt(10));
}

document.getElementById('cpf').addEventListener('input', function(c){
let value2 = c.target.value;

value2 = value2.replace(/\D/g,'');

value2 = value2.replace(/(\d{3})(\d)/, '$1.$2');
value2 = value2.replace(/(\d{3})(\d)/, '$1.$2');
value2 = value2.replace(/(\d{3})(\d{1,2})$/, '$1-$2');

c.target.value = value2;

const cpfNumeros = value2.replace(/\D/g, '');
const erro = document.getElementById('cpf-erro');

if (cpfNumeros.length === 11) {
    if (!validarCPF(cpfNumeros)) {
        erro.style.display = 'inline';
    } else {
        erro.style.display = 'none';
    }
} else {
    erro.style.display = 'none';
}
verificarCampos();
});
