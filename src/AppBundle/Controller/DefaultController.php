<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $crimes = $this->getDoctrine()->getRepository('AppBundle:Crime')->findBy([], null, 500);

        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $crimesArray = $this->serializeCrimesArray($crimes);

        return $this->render('AppBundle:Default:index.html.twig', array(
            'crimes' => $serializer->serialize($crimesArray, 'json'),
        ));
    }

    protected function serializeCrimesArray($crimes)
    {
        $crimesArray = [];
        foreach ($crimes as $crime) {
            $crimesArray[] = [
                'lat' => $crime->getLatitude(),
                'lng' => $crime->getLongitude(),
                'count' => 1,
            ];
        }

        return $crimesArray;
    }
}
