<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
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
        $crimeTypes = $this->getDoctrine()->getRepository('AppBundle:CrimeType')->findAll();

        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $crimesArray = $this->serializeCrimesArray($crimes);

        return $this->render('AppBundle:Default:index.html.twig', array(
            'crimes' => $serializer->serialize($crimesArray, 'json'),
            'crime_types' => $crimeTypes,
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


    /**
     * @Route("/crimes", name="crimes")
     */
    public function crimesAction(Request $request)
    {
        $crimeTypeIds = $request->get('type');

        if ($crimeTypeIds) {
            $crimes = $this->getDoctrine()->getRepository('AppBundle:Crime')->findBy(['crime_type' => $crimeTypeIds], null, 500);
        } else {
            $crimes = $this->getDoctrine()->getRepository('AppBundle:Crime')->findBy([], null, 500);
        }


        return new JsonResponse($this->serializeCrimesArray($crimes));

    }
}
