<?php

namespace App\Controller;

use App\Entity\Chaussure;
use App\Repository\ChaussureRepository;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Util\Json;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

class ChaussureController extends AbstractController
{
    /**
     * @Route("/chaussure", name="chaussure", methods = {"GET"})
     */
    public function index(ChaussureRepository $repo): Response
    {

        $chaussures = $repo->findAll();

        return $this->json($chaussures, 200, [], ['groups' => 'shoesApi']);
    }
    /**
     * 
     * @Route("/chaussure/create", name="chaussure_create", methods={"POST"})
     */
    public function create(Request $req, SerializerInterface $serialize, EntityManagerInterface $manager)
    {

        $json = $req->getContent();

        $chaussure = $serialize->deserialize($json, Chaussure::class, 'json');

        $manager->persist($chaussure);
        $manager->flush();

        return $this->json($chaussure, 200, [], ['groups' => 'shoesApi']);
    }
}
