<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PeopleController extends Controller
{
    private $jsonData = '{"Po pamok\u0173":{"mentor":"Tomas","members":["Elena","Just\u0117","Deimantas"]},
        "Tech Guide":{"mentor":"Sergej","members":["Matas","Martynas"]},
        "Kelion\u0117s draugas":{"mentor":"Rokas","members":["Zbignev","Aist\u0117"]},
        "Wish A Gift":{"mentor":"Aistis","members":["Nerijus","Olga"]},
        "Mums pakeliui":{"mentor":"Paulius","members":["Egl\u0117","Svetlana"]},
        "Motyvacin\u0117 platforma":{"mentor":"Audrius","members":["Viktoras","Airidas"]}}';

    /**
     * @Route("/people", name="people")
     */
    public function index()
    {
        return $this->render('people/index.html.twig', [
            'controller_name' => 'PeopleController',
            'students' => $this->getStorage()
        ]);
    }

    /**
     * @Route("/validate/{element}", name="validate")
     */
    public function validate(Request $request, string $element)
    {
        try {
            $input = json_decode($request->getContent(), true)['input'];
        } catch (\Exception $e) {
            return new JsonResponse(['error' => 'Invalid method'], Response::HTTP_BAD_REQUEST);
        }

        switch($element) {
            case 'name':
                $students = $this->getStudents();
                return new JsonResponse(['valid' => in_array(strtolower($input), $students)]);
                break;
            case 'team':
                $teams = $this->getTeams();
                return new JsonResponse(['valid' => in_array(strtolower($input), $teams)]);
                break;
        }

        return new JsonResponse(['error' => 'Invalid method'], Response::HTTP_BAD_REQUEST);
    }

    /**
     * @return array
     */
    private function getStorage(): array
    {
        return json_decode($this->jsonData, true);
    }

    /**
     * @return array
     */
    private function getStudents(): array
    {
        $students = [];
        $storage = $this->getStorage();
        foreach ($storage as $teamData) {
            foreach ($teamData['members'] as $student) {
                $students[] = strtolower($student);
            }
        }
        return $students;
    }

    private function getTeams(): array
    {
        $teams = [];
        $jsonArray = $this->getStorage();
        foreach ($jsonArray as $key=>$team){
            $teams[] = strtolower($key);
        }
        return $teams;
    }
}
