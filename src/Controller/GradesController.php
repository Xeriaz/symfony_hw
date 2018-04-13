<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GradesController extends Controller
{
    /**
     * @Route("/grades/{team}/{mentor}/{student}", name="grades")
     */
    public function index()
    {
        return $this->render('grades/index.html.twig', [
            'controller_name' => 'GradesController',
            'team'         => '',
            'mentor'       => '',
            'luckyStudent' => 'Airidas',
        ]);
    }
}
