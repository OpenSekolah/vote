## Install
	- git clone .....
	- cd vote
    - composer install
	- cp .env.example .env
    - php artisan key:generate
    - Kuncinya akan ditulis secara otomatis di file .env Anda.
## Database
    - buat database laravel9_vote
    - php artisan storage:link
## Running Seeders
    - php artisan migrate --seed
    - atau
    - php artisan migrate:refresh --seed
## Database Config
    - config/database.php
```
    edit .env
    
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel9_vote
    DB_USERNAME=root
    DB_PASSWORD=
```

## Admin panel Laravel
```
    username : admin@gmail.com
    password : 12345678

```

## Tools
```
    Php framework 	: Laravel 9.x, Jetstream, Inertia (Vue)
    Php 			: >= 8.0 
    editor 			: Visual Studio Code
    webserver		: Nginx
	
```
# Node
####node Version
#node -> stable (-> v18.14.0)

# IMG
![Alt text](https://github.com/OpenSekolah/vote/blob/main/public/images/screenshot1.png)
![Alt text](https://github.com/OpenSekolah/vote/blob/main/public/images/screenshot2.png)
![Alt text](https://github.com/OpenSekolah/vote/blob/main/public/images/screenshot3.png)