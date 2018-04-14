# Moinho Cultural

Site de gestão para o Moinho Cultural

### Pré-requisitos


```
Laravel 5.5
PHP 7
Composer
```

### Instalando

Para conseguir executar o projeto

Faça uma copia do repositório

```
git clone https://github.com/ladesp/moinho.git
```

Instale as dependencias do composer

```
composer install
```

Crie uma cópia do arquivo .env.example e chame-o de .env

> Dentro do .env, altere os campos correspondentes ao banco de dados

Gere uma nova chave
```
php artisan key:generate
```

, inicie o servidor
```
php artisan serve
```

E para gerar o banco de dados
```
php artisan migrate --seed
```
