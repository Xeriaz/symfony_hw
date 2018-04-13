<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GradingController extends Controller
{
    /**
     * @Route("/grading", name="grading")
     */
    public function index()
    {
        return $this->render('grading/index.html.twig', [
            'controller_name' => 'GradingController',
        ]);
    }
}
