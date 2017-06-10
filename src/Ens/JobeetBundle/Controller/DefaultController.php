<?php

namespace Ens\JobeetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Ens\JobeetBundle\Entity\Comentario;
use Ens\JobeetBundle\Entity\Estabelecimento;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Collections\ArrayCollection;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            ('SELECT 
                e.id,e.nome_estabelecimento,AVG(c.nota) as nota_media,
                e.descricao,e.tipo_estabelecimento, e.url_img,e.cidade,COUNT(c.texto_comentario) as qtd_notas,
                e.tipo_estabelecimento,e.telefone
                 FROM EnsJobeetBundle:Estabelecimento e 
                 LEFT JOIN e.comentario c 
                 WHERE c.nota IS NOT NULL
                 GROUP BY e.id ORDER BY nota_media DESC'))->setMaxResults(4);
        $estabelecimentos = $query->getResult();
        //shuffle($estabelecimentos);

        return $this->render('main/main.html.twig', array(
            'estabelecimentos' => $estabelecimentos,
        ));
    }
}