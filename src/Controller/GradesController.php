<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GradesController extends Controller
{
    /**
     * @Route("/grades", name="grades")
     */
    public function index(Request $request)
    {
        return $this->render('grades/index.html.twig', [
            'controller_name' => 'GradesController',
            'akademija' => $request->get('utm_source'),
            'team'         => $request->get('utm_content'),
            'mentor'       => $request->get('utm_campaign'),
            'luckyStudent' => $request->get('utm_term'),
        ]);
    }
}
