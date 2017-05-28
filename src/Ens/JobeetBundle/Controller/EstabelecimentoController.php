<?php

namespace Ens\JobeetBundle\Controller;
use Ens\JobeetBundle\Entity\Comentario;
use Ens\JobeetBundle\Entity\Estabelecimento;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Estabelecimento controller.
 *
 */
class EstabelecimentoController extends Controller
{
    /**
     * Lists all estabelecimento entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $cidade = $request->get('search_cidade');
        $tipo = $request->get('search_tipo');
        $nota = $request->get('search_nota');

    //----------------Filtros de estabelecimentos------------------
    if (!empty($cidade) && !empty($tipo) && !empty($nota) && $nota == 4) {
        $query_filter = $em->createQuery('SELECT e.id,e.nome_estabelecimento,AVG(c.nota) as nota_media,
        e.descricao,e.tipo_estabelecimento, e.url_img,e.cidade
         FROM EnsJobeetBundle:Estabelecimento e LEFT JOIN e.comentario c 
        WHERE e.cidade = :cidade AND e.tipo_estabelecimento = :tipo AND nota_media >= 3
         GROUP BY e.id ORDER BY nota_media DESC')
        ->setParameter('cidade', $cidade)->setParameter('tipo', $tipo);
        $estabelecimentos = $query_filter->getResult();
    }elseif (!empty($cidade) && !empty($tipo)) {
        $query_filter = $em->createQuery('SELECT e.id,e.nome_estabelecimento,AVG(c.nota) as nota_media,
        e.descricao,e.tipo_estabelecimento, e.url_img,e.cidade
         FROM EnsJobeetBundle:Estabelecimento e LEFT JOIN e.comentario c 
        WHERE e.cidade = :cidade AND e.tipo_estabelecimento = :tipo
         GROUP BY e.id ORDER BY nota_media DESC')
        ->setParameter('cidade', $cidade)->setParameter('tipo', $tipo);
        $estabelecimentos = $query_filter->getResult();
    }elseif (!empty($cidade)) {
        $query_filter = $em->createQuery('SELECT e.id,e.nome_estabelecimento,AVG(c.nota) as nota_media,
        e.descricao,e.tipo_estabelecimento, e.url_img,e.cidade
         FROM EnsJobeetBundle:Estabelecimento e LEFT JOIN e.comentario c 
        WHERE e.cidade = :cidade
         GROUP BY e.id ORDER BY nota_media DESC')
        ->setParameter('cidade', $cidade);
        $estabelecimentos = $query_filter->getResult();
    }else{
        //$estabelecimentos = $em->getRepository('EnsJobeetBundle:Estabelecimento')->findAll();
        $query = $em->createQuery('SELECT e.id,e.nome_estabelecimento,AVG(c.nota) as nota_media,
                e.descricao, e.url_img,e.cidade,e.tipo_estabelecimento FROM EnsJobeetBundle:Estabelecimento e LEFT JOIN e.comentario c GROUP BY e.id ORDER BY nota_media DESC');
        $estabelecimentos = $query->getResult();
    }
    //--------------------------------------------------------------
        return $this->render('estabelecimento/index.html.twig', array(
            'estabelecimentos' => $estabelecimentos,
        ));
    }

    /**
     * Creates a new estabelecimento entity.
     *
     */
    public function newAction(Request $request)
    {
        $estabelecimento = new Estabelecimento();
        $form = $this->createForm('Ens\JobeetBundle\Form\EstabelecimentoType', $estabelecimento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($estabelecimento);
            $em->flush();

            return $this->redirectToRoute('estabelecimento_show', array('id' => $estabelecimento->getId()));
        }

        return $this->render('estabelecimento/new.html.twig', array(
            'estabelecimento' => $estabelecimento,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a estabelecimento entity.
     *
     */
    public function showAction(Request $request,Estabelecimento $estabelecimento)
    {
        $deleteForm = $this->createDeleteForm($estabelecimento);

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT AVG(c.nota) FROM EnsJobeetBundle:Comentario c
            JOIN c.estabelecimentos e
            WHERE e.id = :id'
        )->setParameter('id', $estabelecimento->getId());

        $media = $query->setMaxResults(1)->getOneOrNullResult();
        $first_value = reset($media);

        $comentario = new Comentario();
        $form = $this->createForm('Ens\JobeetBundle\Form\ComentarioType', $comentario);
        $comentario->setEstabelecimentos($estabelecimento);
        //$form->get('estabelecimentos')->setData($estabelecimento->getId());
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comentario);
            $em->flush();

            return $this->redirectToRoute('estabelecimento_show', array('id' => $estabelecimento->getId()));
        }

        return $this->render('estabelecimento/show.html.twig', array(
            'estabelecimento' => $estabelecimento,
            'comentario' => $comentario,
            'media' => $first_value,
            'form' => $form->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing estabelecimento entity.
     *
     */
    public function editAction(Request $request, Estabelecimento $estabelecimento)
    {
        $deleteForm = $this->createDeleteForm($estabelecimento);
        $editForm = $this->createForm('Ens\JobeetBundle\Form\EstabelecimentoType', $estabelecimento);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('estabelecimento_edit', array('id' => $estabelecimento->getId()));
        }

        return $this->render('estabelecimento/edit.html.twig', array(
            'estabelecimento' => $estabelecimento,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a estabelecimento entity.
     *
     */
    public function deleteAction(Request $request, Estabelecimento $estabelecimento)
    {
        $form = $this->createDeleteForm($estabelecimento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($estabelecimento);
            $em->flush();
        }

        return $this->redirectToRoute('estabelecimento_index');
    }

    /**
     * Creates a form to delete a estabelecimento entity.
     *
     * @param Estabelecimento $estabelecimento The estabelecimento entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Estabelecimento $estabelecimento)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('estabelecimento_delete', array('id' => $estabelecimento->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
