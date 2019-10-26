<h1 align="center">Software de Gestão de Oficina Mecânica</h1><p align="center"> <img src="{{ asset('/img/logo.png') }}" style="width:200px!important;"></p>

## Sobre o Projeto

<p align="justify">O Software de Gestão de Oficina é um projeto de conclusão de curso de Sistemas de Informação da FHO | Fundação Hermínio Ometto. Trata-se de um sistema para ajudar a gerir a gestão de uma oficina mecânica, onde foi desenvolvido modulos de cadastro de clientes, produtos, fornecedores, ordens de serviços, automoveis, e usuarios e controle de estoque. Os pontos positivos de sistema é o envio de notificação para o cliente via SMS a cada alteração no Status de sua ordem de serviço ou mesmo na tentiva de um contato com o mesmo. Disponibilizamos para o cliente um modulo para o cliente estar acompanhando a sua orden de serviço.</p>

## Para Testar o sistema (Localmente)
<h3>Softwares Necessários</h3>
<ul>
  <li>Composer</li>
  <li>XAMPP/WAMP</li>
  <li>Nexmo</li>
</ul>

<h3>Passos</h3>
<ul>
  <li>Na raiz do projeto há um arquivo chamado .env, entre nele e configure o banco de dados, com o nome do banco vazio criado, o nome de usuário e senha para acesso aos BDs</li>
  <li>Abra o terminal de comando(cmd)</li>
  <li>Entre na pasta do projeto</li>
  <li>Rode os seguintes comandos</li>
  <li>composer install (em caso de erro, rode o comando composer update)</li>
  <li>php artisan key:generate</li>
  <li>php artisan migrate --seed</li>
  <li>php artisan serve</li>
  <li>Um usuário administrador e um usuário normal já estão cadastrados previamente no sistema</li>
  <li><h3>Administrador</h3></li>
  <li>Login: admin@admin.com</li>
  <li>Senha: 123123</li>
  <li><h3>Observações</h3></li>
  <li>Para a funcionalidade de envio de SMS você vai precisar de criar uma conta Nexmo</li>
</ul>
