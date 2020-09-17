# XastreMarket

![Documentação v0_16-09-2020](/doc/XastreMarket.png)<br />

# Misc

Comando usado para criar o projeto do laravel:<br />
composer -vvv create-project laravel/laravel --prefer-dist XastreMarket --no-secure-http

# Tasks

OK - Projetar BD<br />
OK - Criar BD<br />
OK - Criar ambiente laravel<br />
TD - Criar interface da home utilizando bootstrap<br />
TD - Criar rota para cadastrar produto<br />
TD - Criar rota para atualizar a localização de um produto<br />
TD - Criar rota para listar produtos<br />
TD - Criar rota para verificar se o BD foi atualizado<br />
TD - Conectar a interface com as rotas usando o laravel<br />

# API

GET api/cadastrarProduto<br />
GET api/atualizarLocalizacaoProduto<br />
GET api/listarProdutos<br />
GET api/ultimaAtualizacao<br />

# Controllers

php artisan make:controller HomeController<br />
HomeController - app/Http/HomeController.php<br />
<br />

# Views

HomeView - resources/views/home.blade.php<br />
