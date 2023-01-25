<?php

class PeopleController extends BaseController
{

    public function getThreePeopleData(int $personId): array
    {
        $peopleModel = new People();
        $peopleIds = array_column($peopleModel->getPeopleIds(), 'id');
        $availablePeopleId = array_diff($peopleIds, [$personId]);

        $responsePeopleIds[] = $personId;
        $responsePeopleIds[] = $this->getRandomItem($availablePeopleId);
        unset($availablePeopleId[array_search($responsePeopleIds[1], $availablePeopleId)]);
        $responsePeopleIds[] = $this->getRandomItem($availablePeopleId);

        shuffle($responsePeopleIds);

        $response = [];
        foreach ($responsePeopleIds as $id) {
            $response[] = $peopleModel->getPerson($id)[0];
        }

        return $response;
    }
}