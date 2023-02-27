# Steps to run the project
### I. Clone the project into your PC
`git clone git@github.com:vasyldutchak/test-infinite-plus.git`

### II. Run docker
Go into the project folder and run a command `docker compose up`

### III. Check endpoints
If everything went well you should see the Laravel home page by visiting the address `http://localhost:8080`
___
Next step is to visit `http:://localhost:8080/api/company` || `http:://localhost:8080/api/employee` || `http:://localhost:8080/api/project` 
___
In order to have an ability to Create/Update/Delete one of items you should use a token as a Bearer Token in HTTP header.

The token you can find in the DB table **users**, column **_remember_token_**
