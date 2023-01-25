<?php

class QuizController extends BaseController
{
    public function question()
    {
        $requestMethod = $_SERVER["REQUEST_METHOD"];

        $responseData = [];
        $strErrorDesc = '';
        $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';

        if (strtoupper($requestMethod) == 'POST') {
            try {
                $encodedJSON = file_get_contents('php://input');
                $json = json_decode($encodedJSON);

                $usedQuotes = isset($json->questions) ? $json->questions : [];

                $questionModel = new Question();

                //get all quotes ids from the DB
                $allQuestion = array_column($questionModel->getAllQuestionIds(), 'id');

                // get all unused quotes ids
                $availableQuestionIds = array_diff($allQuestion, $usedQuotes);

                // get the data from a random quote from the unused ones
                $question = $questionModel->getQuestion($this->getRandomItem($availableQuestionIds));

                $peopleController = new PeopleController();
                $people = $peopleController->getThreePeopleData($question[0]['person_id']);

                $responseData = ['question' => $question[0], 'people' => $people];
            } catch (Exception $e) {
                $strErrorDesc = $e->getMessage() . ' Something went wrong!';
                $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
            }
        } else {
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        }

        // send output
        if (!strlen($strErrorDesc) && sizeof($responseData) > 1) {
            $this->sendOutput(
                $responseData,
                ['Content-Type: application/json', 'HTTP/1.1 200 OK']
            );
        } else {
            $this->sendOutput(['error' => $strErrorDesc],
                ['Content-Type: application/json', $strErrorHeader]
            );
        }
    }
}