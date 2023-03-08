# Steps to run the project
### I. Clone the project into your PC
`git clone git@github.com:vasyldutchak/test-infinite-plus.git`

### II. Prepare env file
Go into the project folder and copy `.env.example` into `.env`.

Then put values for `DB_PASSWORD` and `DB_DATABASE`. Save the changes you made.


### III. Run docker
Run the command `docker compose up`

### IV. Run migrations and seeders

`docker exec -it php-apache php artisan migrate:fresh --seed`

### V. Check endpoints
If everything went well you should see the Laravel home page by visiting the address `http://localhost:8080`
___
Next step is to visit `http:://localhost:8080/api/company` || `http:://localhost:8080/api/employee` || `http:://localhost:8080/api/project` 
___
In order to have an ability to Create/Update/Delete one of items you should use a token as a Bearer Token in HTTP header.

Also don't forget to add to HTTP header: _Accept:application/json_ to receive correct response


The token you can find in the DB table **users**, column **_remember_token_**
