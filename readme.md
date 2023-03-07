# e-Library Web Application

This application is only for study. Built using Laravel and Vuejs.

## Instalation

Please make sure you have installed PHP and mysql beforehand. This application need to make sure your server meets the following requirements:
```
1. PHP >= 7.0.0
2. OpenSSL PHP Extension
3. PDO PHP Extension
4. Mbstring PHP Extension
5. Tokenizer PHP Extension
6. XML PHP Extension
```

Then clone this application.

via https
```
git clone https://github.com/wisnuvb/e-Library-Web-Application.git
```
or via ssh
```
git clone git@github.com:wisnuvb/e-Library-Web-Application.git
```

Then change the .env.example file to .env and adjust the database connection in it. The default database (MySQL) uses the name "perpus". Please create a database first before installing other dependencies.

After the database has been created, proceed to install dependencies, migrate the DB structure and seed the dummy user data.
```
composer install
php artisan migrate
php artisan db:seed
```

Next, please check the database for the email created, the default password is 'secret'.
