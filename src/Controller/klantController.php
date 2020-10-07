<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Klant;

class klantController extends Controller
{
    /**
     * @Route("/")
     *@Method({"GET"})
     */

    /**
     * @Route("Customer\save")
     */
    public function save()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist();
    }
}
