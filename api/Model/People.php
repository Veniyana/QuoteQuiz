<?php


class People extends Database
{
    public function getPerson($personId) {
        return $this->select("SELECT * FROM `people` WHERE `id` = ?", ["i", $personId]);
    }

    public function getPeopleIds() {
        return $this->select("SELECT `id` FROM `people`");
    }
}