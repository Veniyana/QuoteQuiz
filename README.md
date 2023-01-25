# Quote Quiz

##Description
Single page application (SPA) with Vue representing the famous quote
quiz where the user will see a quote with 3 people as answers and have to pick
the correct one.

## How does the quiz work
By default, a single session consists of 10 quotes.

If the user chooses the correct answer, the displayed message is “Correct!
The right answer is …”. In case of a wrong answer, the message should be
“Sorry, you are wrong! The right answer is …”.

After session completion, a statistics screen with the results should be shown
with a Restart button.

## Setup
- Run the MySQL script in folder database
- In file `api/inc/config.php` provide the right DB configuration data
- in folder `frontend` run `npm install` command
## How to run 
- api - runs on port 8000

`cd ./api && php -S localhost:8000`
- frontend - runs on port 8080

`cd ./frontend && npm run serve`

## Technologies
- REST API - PHP
- Frontend - VueJS