# Füber
An on call taxi service.

Built using Yii2 PHP framework making use of MySQL database.

## Requirement
* PHP 7.1
* Composer Package Manager
* MySQL

## Running the project
* Clone project: `git clone https://github.com/cyberinferno/fuber-api.git`
* Install dependencies: `composer install`
* Run the command `./init` to initialize the project
* Update `.env` file with proper database name and credentials
* Run database migrations using the command `./yii migrate`
* Run dev server: `./yii serve --docroot=api/web`