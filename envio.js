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
                mode: 'cors',
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
                document.forms['formulario'].reset();
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