<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Versões utilizadas
* PHP 8.2
* Laravel 8

## Passo a passo para instalação do projeto
* Realizar o download do Xampp
* Executar o comando
```git clone https://github.com/FPMachado/projetoApi.git ```
* Realizar o download do Composer
* Executar o comando
```composer update ```
* Copiar o arquivo .envexample e salvar uma cópia com o nove .env
* Criar um banco de dados no phpmyadmin (xampp) com o nome portifolioFilipePires
* Executar o comando
```php artisan migrate```
* Realizar o download do cacert.pem
* Certifique-se de que a linha "curl.cainfo" e "openssl.cafile" estejam descomentadas
* Nessas linhas que foram descomentadas colocar o caminho do arquivo cacert.pem. Ex: C:\php\extras\ssl\cacert.pem
* Criar uma conta no site mailtrap.io
* Executar o comando 
```php artisan storage:link```
* Utilize um terminal para rodar o comando:
```php artisan serve```
* Utilize outro terminal para rodar o comando:
```php artisan queue:work```