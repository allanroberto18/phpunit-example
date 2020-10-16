<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route(path="/", methods={"GET"})
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('default/index.html.twig', [ 'race' => '' ]);
    }

    /**
     * @Route(path="/race", methods={"GET"})
     * @return Response
     * @throws \Doctrine\ORM\ORMException
     */
    public function generateRace(): Response
    {
        $service = $this->container->get('app.services.race');
        $i = 0;
        while($i < 3) {
            $details = $service->getListOfHorsesOnRace();
            $race = $details[0]->getRace();
            $raceDetails[] = [
                'race' => $race,
                'details' => $service->getListOfHorsesOnRace()
            ];
            $i++;
        }

        return $this->render('default/race.html.twig', [ 'results' => $raceDetails ]);
    }
}
