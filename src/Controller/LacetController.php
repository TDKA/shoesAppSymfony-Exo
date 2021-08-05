<?php

namespace App\Controller;

use App\Entity\Lacet;
use App\Entity\Chaussure;
use App\Repository\LacetRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LacetController extends AbstractController
{
    /**
     * @Route("/lacet", name="lacet", methods={"GET"})
     */
    public function index(LacetRepository $repo): Response
    {
        $lacets = $repo->findAll();

        return $this->json($lacets, 200, [], ['groups' => 'lacetsApi']);
    }
    /**
     * 
     * @Route("/lacet/create/{id}", name="lacet_create", methods={"POST"})
     */
    public function create(Request $req, SerializerInterface $serialize, EntityManagerInterface $manager, Chaussure $chaussure)
    {

        $json = $req->getContent();

        $lacet = $serialize->deserialize($json, Lacet::class, 'json');

        $lacet->setChaussure($chaussure);

        $manager->persist($lacet);
        $manager->flush();

        return $this->json($lacet, 200, [], ['groups' => 'lacetsApi']);

        // dd($chaussure);
    }
}
