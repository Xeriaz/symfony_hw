<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GradesController extends Controller
{
    /**
     * @Route("/grades/{team}/{mentor}/{student}", name="grades")
     */
    public function index($team, $mentor, $student)
    {
        return $this->render('grades/index.html.twig', [
            'controller_name' => 'GradesController',
            'team'         => $team,
            'mentor'       => $mentor,
            'luckyStudent' => $student,
        ]);
    }
}
