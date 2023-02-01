
## Project Overview

taptic Backend assessment TASK 2

This application implements a part of the functionality for users to display profiles of other users and like or dislike them. If both users like each other, a pair is created.

## Models and Relationships
The following models with relationships are needed to cover the functional description:

- User: A simple model with name and ID, representing a user. 
- Swipe: A model representing a like action from one user to another user.
- Pair: A model representing a pair between two users who like each other.

The User model has a one-to-many relationship with the Swipe model, where a user can have multiple swipes. The Pair model has a many-to-many relationship with the User model, where a pair consists of two users.

## Installation and Requirements
The project was built with Laravel 9.5 and PHP 8.0

Installed composer is required.

Default database is sqlite, but feel free to change the database connection in the .env file

### Installation steps:
- Pull the project repository
- Rename `.env.example` file to `.env `
- Run `composer install` in the project directory
- Run `php artisan migrate` for database init
- Run `php artisan db:seed` to seed users

## Usage 
Run `php artisan serve` to start the server on http://127.0.0.1:8000   
**OR**   
Use any web server like **nginx** or **apache**. `public/index.php` file is the entry point
###  Endpoint
POST `/api/swipe`

### Request Body Parameters
`user_id`
`swiped_user_id`
`action`

#### Validation rules
A user can swipe another user only once   
`user_id` and `swiped_user_id` : required, integer, existing identifier in the database   
`action` : required, enum: **like**, **dislike**"

## Test
Run the `php artisan test` command to run the tests
