# Desafio 3: Perfil de Usuário com Banco de Dados e Sessões Dinâmicas

Este projeto consiste em um sistema de login integrado a um banco de dados MySQL que permite ao usuário validar seu acesso e personalizar a experiência visual da sua área restrita escolhendo uma cor de fundo.

## 🚀 Funcionalidades

* **Autenticação:** Validação de usuário e senha diretamente na tabela `usuarios` do banco de dados `exercicio`.
* **Persistência de Sessão:** Armazenamento dos dados do usuário logado e de suas preferências visuais através de `$_SESSION`.
* **Personalização Dinâmica:** Aplicação em tempo real da cor de fundo escolhida no formulário de login dentro da página de perfil.
* **Segurança de Acesso:** Bloqueio de páginas restritas caso o usuário não esteja devidamente autenticado.
* **Acessibilidade Visual (Contraste Inteligente):** Mudança automática da cor dos textos e links para claro ou escuro dependendo da intensidade da cor de fundo escolhida.

## 📂 Estrutura de Arquivos

* `15d_login.php`: Tela de login contendo o formulário de credenciais, o seletor de cores nativo (`type="color"`) e a lógica de verificação no banco.
* `15d_perfil.php`: Página restrita que recebe e renderiza dinamicamente as preferências salvas na sessão do usuário.
* `15d_logout.php`: Destrói a sessão ativa e limpa os dados de navegação, redirecionando o usuário com segurança de volta para o login.

## 💡 Nota de Pesquisa e Desenvolvimento

> ⚠️ **Aviso de Colaboração e Pesquisa:**
> Durante o desenvolvimento deste desafio, foi realizada uma pesquisa com o auxílio de IA (assistente virtual) para implementar o **cálculo de contraste automatizado**. 
> 
> A fórmula matemática baseada em luminosidade (RGB YUV) foi pesquisada e integrada ao bloco PHP de login para identificar se o valor hexadecimal enviado pelo `<input type="color">` representa uma cor clara ou escura. Com base nessa validação externa, o sistema define se a cor do texto e dos links deve ser preta (`#000000`) ou branca (`#ffffff`), garantindo que o conteúdo da página permaneça legível independente da escolha do usuário.

## 🛠️ Tecnologias Utilizadas

* HTML5 (Estruturação e elementos de formulário nativos)
* CSS3 (Estilização inline dinâmica)
* PHP 8.x (Gerenciamento de sessões, lógica de backend e manipulação de strings/hexadecimais)
* MySQL / Extension `mysqli` (Persistência e consulta de dados)
