# RESTful API Laravel

A very simple RESTful API in Laravel 7 with Authorization via Token.

## Setup

After cloning the repository go to the project directory and ...

### Install Composer Dependencies

`composer install`

### Set Environment

Create your .env file based on the .env.example file.

### Set Application Key

`php artisan key:generate`

### Set Authorization Token

In the .env file fill in the API_TOKEN with your secret.

### Set Database

In the .env file fill in the DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD options to match the credentials of the database you just created.

### Run Migrations

`php artisan migrate`

### Run Server

`php artisan serve`


## Usage

All requests require an authorization header with the bearer token.

### Show Users

  Returns a json array with all users data.

* **Method:**

  `GET`

* **URL**

  /users

  
* **URL Params**

  None

* **Body Params**

  None


### Create User

  Store a single user and returns json data.

* **Method:**

  `POST`

* **URL**

  /users
  
* **URL Params**

  None

* **Body Params**

   **Required:**
 
   `name=[text]`

   `email=[text]`


### Show User

  Returns json data about a single user.

* **Method:**

  `GET`

* **URL**

  /users/:id
  
*  **URL Params**

   **Required:**
 
   `id=[integer]`

* **Body Params**

  None

### Edit User

  Update a single user and returns json data.

* **Method:**

  `PUT`

* **URL**

  /users/:id
  
*  **URL Params**

   **Required:**
 
   `id=[integer]`

* **Body Params**

   **Required:**
 
   `name=[text]`

   `email=[text]`

### Delete User

  Delete a single user.

* **Method:**

  `DELETE`

* **URL**

  /users/:id
  
*  **URL Params**

   **Required:**
 
   `id=[integer]`

* **Body Params**

  None
