# Füber
An on call taxi service.

Built using Yii2 PHP framework making use of MySQL database.

## Requirement
* PHP 7.0
* Composer Package Manager
* MySQL

## Running the project
* Clone project: `git clone https://github.com/cyberinferno/fuber-api.git`
* Install dependencies: `composer install`
* Run the command `./init` to initialize the project
* Update `.env` file with proper database name and credentials
* Run database migrations using the command `./yii migrate`
* Run dev server: `./yii serve --docroot=api/web`

## API Endpoints

| Endpoint | HTTP Verb | Payload | Explanation |
|:----------:|:-----------:|:--------:|:--------|
| /oauth2/token| POST | {"grant_type": "password", "username": "fubertest1", "password": "fubertest1", "client_id":"testclient", "client_secret":"testpass"} | Get access token |
| /car | GET | - | List all available cars |
| /booking | POST | {"type": 10, "currentLocationX": 10, "currentLocationY": 15, "destinationLocationX": 30, "destinationLocationY": 15} | Book a ride |
| /booking/:id | PUT | {} | End a ride |
| /booking/:id | GET | - | Check ride details |
