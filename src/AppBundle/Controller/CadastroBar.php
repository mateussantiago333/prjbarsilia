<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CadastroBar extends Controller
{
    /**
     * @Route("/main/cadastro")
     */
    public function pageMain()
    {
        return $this->render('pages/inicio.html.twig');
    }
}
