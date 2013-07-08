laravel4-UrlShortener
=====================

a Url Shortener app build on top of the laravel 4 framework. 


##How to install

### Step 1: Get the code

#### Option 1: Git Clone

    git clone https://github.com/summerblue/laravel4-url-shortener.git

### Step 2: Use Composer to install dependencies

#### Option 1: Composer is not installed globally

    cd laravel4-url-shortener
	curl -s http://getcomposer.org/installer | php
	php composer.phar install --dev

#### Option 2: Composer is installed globally

    cd laravel
	composer install

If you haven't already, you might want to make [composer be installed globally](http://andrewelkins.com/programming/php/setting-up-composer-globally-for-laravel-4/) for future ease of use.

### Step 3: Configure Database

Now that you have the environment configured, you need to create a database configuration for it. Copy the file ***app/config/database.php*** in ***app/config/local*** and edit it to match your local database settings. You can remove all the parts that you have not changed as this configuration file will be loaded over the initial one.

### Step 4: Populate Database
Run these commands to create and populate table:

	php artisan migrate
	php artisan db:seed

### Step 5: Make sure app/storage is writable by your web server.

If permissions are set correctly:

    chmod -R 775 app/storage

Should work, if not try

    chmod -R 777 app/storage
