<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StudentsController extends Controller
{

    private $jsonData = '{"Po pamok\u0173":{"mentor":"Tomas","members":["Elena","Just\u0117","Deimantas"]},
        "Tech Guide":{"mentor":"Sergej","members":["Matas","Martynas"]},
        "Kelion\u0117s draugas":{"mentor":"Rokas","members":["Zbignev","Aist\u0117"]},
        "Wish A Gift":{"mentor":"Aistis","members":["Nerijus","Olga"]},
        "Mums pakeliui":{"mentor":"Paulius","members":["Egl\u0117","Svetlana"]},
        "Motyvacin\u0117 platforma":{"mentor":"Audrius","members":["Viktoras","Airidas"]}}';


    /**
     * @Route("/students", name="students")
     */
    public function index()
    {
        $this->getStudentsFromTeams();
        return $this->render('students/index.html.twig', [
            'controller_name' => 'StudentsController',
            'students' => $this->academyInfo(),
        ]);
    }

    public function academyInfo() : array
    {
        return json_decode($this->jsonData, true);
    }

    public function getStudentsFromTeams()
    {
        var_dump($this->academyInfo());
    }
}
