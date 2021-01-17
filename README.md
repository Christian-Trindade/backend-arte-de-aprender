<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>


<h3>
The project is one Laravel 7.x, the project is using only for <a href="http://ccr.berap.com.br/" _blank="_target">API</a> for connect frontend application with MySQL database and AWS S3.<br>
</h3>
<h1>Getting started</h1>

<h2>Installation</h2>

<p>Please check the official laravel installation guide for server requirements before you start.&nbsp;<a href="https://laravel.com/docs/5.4/installation#installation" rel="nofollow">Official Documentation</a></p>

<p>Alternative installation is possible without local dependencies relying on&nbsp;<a href="https://github.com/gothinkster/laravel-realworld-example-app/blob/master/readme.md#docker">Docker</a>.</p>

<p>Clone the repository</p>

<pre>
<code>git clone https://github.com/Christian-Trindade/backend-arte-de-aprender.git
</code></pre>

<p>Switch to the repo folder</p>

<pre>
<code>cd arte-aprender
</code></pre>

<p>Install all the dependencies using composer</p>

<pre>
<code>composer install
</code></pre>

<p>Copy the example env file and make the required configuration changes in the .env file</p>

<pre>
<code>cp .env.example .env
</code></pre>

<p>Generate a new application key</p>

<pre>
<code>php artisan key:generate
</code></pre>

<p>Generate a new JWT authentication secret key</p>

<pre>
<code>php artisan jwt:generate
</code></pre>

<p>Run the database migrations (<strong>Set the database connection in .env before migrating</strong>)</p>

<pre>
<code>php artisan migrate
</code></pre>

<p>&nbsp;</p>
