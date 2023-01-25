<?php
require_once('Database.php');

class Question extends Database
{
    public function getQuestion($questionId)
    {
        return $this->select("SELECT * FROM `quotes` WHERE id=?", ["i", $questionId]);
    }

    public function checkQuestionAnswer($questionId, $personId)
    {
        return $this->select("SELECT COUNT(`quotes`.*) FROM `quotes` 
                                LEFT JOIN `people` ON `quotes`,`person` = `people`.`id` 
                                WHERE `quotes`.`id` = ? AND `people`.`id` = ? ",
                                ["i", $questionId, $personId]);
    }

    public function getAllQuestionIds()
    {
        return $this->select("SELECT `id` FROM `quotes`");
    }
}