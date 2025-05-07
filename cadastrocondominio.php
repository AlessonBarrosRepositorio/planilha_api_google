<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indik</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/awesomplete/1.1.5/awesomplete.min.css" />
    <style>
        *{
            margin:0;
            border:0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }
        body{
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        *:focus {
            outline: 2px solid #f82;
        }
        
        input[list]::-webkit-calendar-picker-indicator {
            display: none; 
        }

       
        input[list] {
            max-height: 5rem;
        }
        .areaCentro{
            width: 20rem;
            height: 29rem;
            background-color: #eeee;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            box-shadow: 2px 4px 6px #f82;
            border:1px solid #f82;
        }
        .formulario{
            width: 90%;
            height: 90%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: .5rem;
        }
        .awesomplete{
            width: 96%;
            height: 2rem;
            margin-bottom: 0.5rem;
        }          
        input{
            width: 90%;
            height: 2rem;
            padding: .4rem;
            text-align: center;
            
            border:1px solid #f82;
            
        }
        .corF{
            width: 100%;
            height: 2rem;
            background-color: #f82;
            position: absolute;
        }
        .faixaS{
            top: 2.2rem;
        }
        .faixaI{
            bottom: 0;
            height: 3.4rem;
        }
        .imagem{
            width: 3.8rem;
            position:absolute;
            bottom: 0;
            left:0.8rem;
        }

    </style>
</head>
<body>
    <div class="faixaS corF"><img src="../assets/images/indiklaranja.png" class="imagem" alt="complemento logo"></div>
    <div class="areaCentro">
        <form class="formulario" action="" method="post" name="formulario">
            <label for="condominio">Condominio</label>
            <input class="awesomplete" list="condominios" id="condominio" name="data[condominio]">

                <datalist id="condominios"> 
                    <option value="AIUKA">
                    <option value="ALAGOINHAS">
                    <option value="ΑΝΑ BASTOS">
                    <option value="ARAÇATUBA">
                    <option value="ARUANA">
                    <option value="AYRES SALDANHA">
                    <option value="BARBACENA">
                    <option value="BOLIVAR">
                    <option value="BRIGITE">
                    <option value="CAMARGO">
                    <option value="CEREJEIRA">
                    <option value="CIPALOS">
                    <option value="CONDADO LUZERNE">
                    <option value="CORAMAR">
                    <option value="DOIS DE AGOSTO">
                    <option value="DOM PEDRO II">
                    <option value="ESTER LANDES">
                    <option value="FRANCO">
                    <option value="HAYA">
                    <option value="ΙΒΙΑΡΑΒΑ">
                    <option value="ITAOBI">
                    <option value="ITAOCA">
                    <option value="JOAQUIM F. BRAGA">
                    <option value="JUPIA">
                    <option value="LELLIS">
                    <option value="LOGAN">
                    <option value="LYGIA">
                    <option value="MACAUBAS">
                    <option value="MIRANTE">
                    <option value="NICÁCIO">
                    <option value="OURO NEGRO AA">
                    <option value="PARAGON">
                    <option value="PORTO BELLO">
                    <option value="RESIDENCIAL ASSUNÇÃO">
                    <option value="RESID. MARIA ANGÉLICA">
                    <option value="RIO ALTO">
                    <option value="ROMULO (2287-9387)">
                    <option value="RONY">
                    <option value="ROYAL STAR">
                    <option value="SALVATERRA">
                    <option value="SANDRA">
                    <option value="SANTA BARBARA">
                    <option value="SISALTLANTICO">
                    <option value="SOL DA LAGOA">
                    <option value="SOLAR 435 (3574-8133)">
                    <option value="S. B. MINAS GERAIS">
                    <option value="S. PRINC. PATRICIA">
                    <option value="THEMIS">
                    <option value="TOULON (2249-7442)">
                    <option value="URARY">
                    <option value="VESTA">
                    <option value="VIVENDAS DA PRAÇA">
                    <option value="WATKINS">
                    <option value="W. P. ALMEIDA">
                </datalist>
            </input>

            <label for="residencia">Residência</label>
            <input type="text" name="data[residencia]" id="residencia" maxlength="60" placeholder="Exemplo:Apart. 301, bloco 2">

            <label for="nome">Nome Completo</label>
            <input type="text" name="nome" id="nome" placeholder="Exemplo: leo da silva" maxlength="125">

            <label for="cpf">CPF</label>
            <input type="text" name="data[cpf]" id="cpf" maxlength="14" placeholder="000.000.000-00">
            <small id="cpf-erro" style="color: red; display: none;">CPF inválido</small>

            <label for="whatsapp">Whatsapp</label>
            <input type="text" name="data[whatsapp]" id="whatsapp" maxlength="16" placeholder="(00) 9 0000-0000">
            
            <label for="email">E-mail</label>
            <input type="email" name="data[email]" id="email">
            <small id="email-erro" style="color: red; display: none;">E-mail inválido</small>

            <button type="submit" id="enviar" disabled>Enviar</button>
        </form>
    </div>
    <div class="faixaI corF"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/awesomplete/1.1.5/awesomplete.min.js"></script>
    <script>

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
    </script>
    <script>
        const scriptGoogle = "https://sheetdb.io/api/v1/yyx16sbmdsyzi";
        const dadosFormulario = document.forms['formulario'];

        dadosFormulario.addEventListener('submit', function(e) {
            e.preventDefault();

            // Captura e converte todos os valores para string
            const condominio = String(document.getElementById('condominio').value);
            const residencia = String(document.getElementById('residencia').value);
            const nome = String(document.getElementById('nome').value);
            const cpf = String(document.getElementById('cpf').value);
            const whatsapp = String(document.getElementById('whatsapp').value);
            const email = String(document.getElementById('email').value);

            // Cria objeto com os valores convertidos
            const dadosConvertidos = {
                condominio: condominio,
                residencia: residencia,
                nome: nome,
                cpf: cpf,
                whatsapp: whatsapp,
                email: email
            };

            // Exibe no console para verificação
            //console.log('Dados convertidos para envio:', dadosConvertidos);

                    // ALERTA ADICIONADO AQUI (única modificação)
            //alert(`Dados que serão enviados:\n\nCondomínio: ${condominio}\nResidência: ${residencia}\nNome: ${nome}\nCPF: ${cpf}\nWhatsApp: ${whatsapp}\nEmail: ${email}`);


            fetch(scriptGoogle, {
                method: 'POST',
                headers: {
                    //'Content-Type': 'application/x-www-form-urlencoded',
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ data: [dadosConvertidos] })//new URLSearchParams(dadosConvertidos)
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`Erro HTTP: ${response.status}`);//return response.json();
                }
                return response.json()//throw new Error('Erro na resposta do servidor');
            })
            .then(data => {
                /*
                if(data.status === 'sucesso') {
                    //alert('Dados enviados com sucesso!');
                    dadosFormulario.reset();
                } else {
                    //alert('Erro: ' + (data.mensagem || 'Erro desconhecido'));
                }*/
                if (data.created === 1) {
                    alert('✅ Dados enviados com sucesso!');
                    //document.forms['formulario'].reset();
                    window.location.href = "https://indik.com.br/home/";
                } else {
                throw new Error('Falha ao criar registro na planilha');
                }
            })
            .catch(error => {
                console.error('Erro ao enviar:', error);
                alert(`❌ Erro ao enviar dados: ${error.message}`);
                //alert('Erro ao conectar com o servidor: ' + error.message);
            });
        });
    </script>
</body>
</html>