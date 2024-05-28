# formulariodjobb
**Formulário para Resgate de Depósitos Judiciais do Banco do Brasil**

Este formulário tem o objetivo de auxiliar os funcionários do Banco do Brasil que trabalham com o acolhimento da documentação para Resgate de Depósitos Judiciais e Precatórios. A sua principal função é substituir o arquivo PDF "Formulário de Resgate DJO" e o documento de texto "Declaração de Isenção IRRF" usados no acolhimento.

Problema: Para cada conta judicial em que um beneficiário solicita resgate no atendimento do Banco do Brasil, é necessário o preenchimento de um arquivo PDF e se o cliente solicitar isenção, um documento de texto. Em alguns casos, quando o cliente é advogado por exemplo, o mesmo cliente solicita o resgate de várias contas judiciais, demandando muito tempo no atendimento.

Solução proposta por este sistema: Simplificar e reaproveitar o preenchimento dos dados para solicitação de resgate com os campos obrigatórios do formulário (listados abaixo), e automatizar a geração dos documentos de solicitação de resgate e dclaração de isenção.

Campos obrigatórios:
 * Nome do beneficiário;
 * CPF/CNPJ do beneficiário;
 * Banco, agência e conta;
 * Tipo de conta e tipo de valor a resgatar;
 * Telefone, local e data.


**Informações sobre o desenvolvimento**

Foi utilizado HTML, CSS e Javascript no frontend da aplicação para otimizar e estilizar a página, além de formatar os campos de dados como CPF, Agência, Conta e telefone. Impedindo a inserção de dados inválidos.
O sistema usa o método POST do protocolo HTTP para enviar os dados para o script gerarPDF.php a ser executado do lado do servidor, que gera os arquivos solicitados e abre em uma nova aba disponibilizando o download ou impressão direto pelo navegador.
A opção de rodar o script do lado do servidor foi necessária devido aos computadores utilizados no atendimento das agências não serem capazes de rodar um código em javascript do lado do cliente para gerar o PDF.

Próximos passos:
Este desenvolvedor tem o objetivo de melhorar os seguintes aspectos do sistema:
 * Formatar o campo Número do processo;
 * Otimizar o CSS para mobile;
 * Implementar a validação dos códigos verificadores para CPF e CNPJ;

No entanto acredito que o estado atual do sistema, exceto sua hospedagem, já permite a utilização no atendimento.

