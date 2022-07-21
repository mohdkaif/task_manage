


## About Task Manage

Task is to create a simple todo list application that persists the data in a database of your choosing using PHP and Laravel. You should be able to add new entries, mark entries as completed, and delete entries as well. Each entry should show a date when it was added to the list.


## Setup Project
### Dependencies software and installation


- Mysql Server

- PHP7.4 installation with required all extension

- Composer 

```
git clone https://github.com/mohdkaif/task_manage.git
```
- go to directory
```
cd task_manage
```
- Run Composer Install
```
composer install && composer dump-autoload
```
- create new .env file and copy data from .env.example and paste in new .env file

```
cp .env.example .env
```

- For Generate Key

```
php artisan key:generate
```
- change .env file database configuration

- Permission to directories
```
chgrp -R www-data /var/www/project_dir_name
chown -R www-data:www-data /var/www/project_dir_name
chmod -R 775 /var/www/project_dir_name/storage
chown -R www-data.www-data /var/www/project_dir_name/storage
```

```
php artisan migrate
```

```
php artisan serve

```
```
http://localhost:8000/
```

- Click on Register Button right corner
- Register user
- Now you Will redirect dashboard
- Add tasks
- Or Click go to Task list button
- Change status (pending,progress and completed)
- Delete Tasks (It will be soft delete)
- For Pending Title color will be orange
- For Progress Title color will be Green
- For Completed Title  will be line through

