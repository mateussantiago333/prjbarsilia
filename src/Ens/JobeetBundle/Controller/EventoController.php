<?php

namespace Ens\JobeetBundle\Controller;

use Ens\JobeetBundle\Entity\Evento;
use Ens\JobeetBundle\Entity\Comentario_Evento;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Evento controller.
 *
 */
class EventoController extends Controller
{
    /**
     * Lists all evento entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        //$eventos = $em->getRepository('EnsJobeetBundle:Evento')->findAll();

        return $this->render('evento/index.html.twig', array(
            'eventos' => $eventos,
        ));
    }

    /**
     * Creates a new evento entity.
     *
     */
    public function newAction(Request $request)
    {
        $evento = new Evento();
        $form = $this->createForm('Ens\JobeetBundle\Form\EventoType', $evento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($evento);
            $em->flush();

            return $this->redirectToRoute('evento_show', array('id' => $evento->getId()));
        }

        return $this->render('evento/new.html.twig', array(
            'evento' => $evento,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a evento entity.
     *

    public function showAction(Evento $evento)
    {
        $deleteForm = $this->createDeleteForm($evento);

        return $this->render('evento/show.html.twig', array(
            'evento' => $evento,
            'delete_form' => $deleteForm->createView(),
        ));
    }
     */
        public function showAction(Request $request,Evento $evento)
    {
        $deleteForm = $this->createDeleteForm($evento);

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery(
            'SELECT AVG(c.nota) FROM EnsJobeetBundle:Comentario_Evento c
            JOIN c.eventos e
            WHERE e.id = :id'
        )->setParameter('id', $evento->getId());

        $media = $query->setMaxResults(1)->getOneOrNullResult();
        $first_value = reset($media);

        $comentario_Evento = new Comentario_evento();
        $form = $this->createForm('Ens\JobeetBundle\Form\Comentario_EventoType', $comentario_Evento);
        $comentario_Evento->setEventos($evento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comentario_Evento);
            $em->flush();

            return $this->redirectToRoute('evento_show', array('id' => $evento->getId()));
        }

        return $this->render('evento/show.html.twig', array(
            'evento' => $evento,
            'comentario_Evento' => $comentario_Evento,
            'media' => $first_value,
            'form' => $form->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing evento entity.
     *
     */
    public function editAction(Request $request, Evento $evento)
    {
        $deleteForm = $this->createDeleteForm($evento);
        $editForm = $this->createForm('Ens\JobeetBundle\Form\EventoType', $evento);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('evento_edit', array('id' => $evento->getId()));
        }

        return $this->render('evento/edit.html.twig', array(
            'evento' => $evento,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a evento entity.
     *
     */
    public function deleteAction(Request $request, Evento $evento)
    {
        $form = $this->createDeleteForm($evento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($evento);
            $em->flush();
        }

        return $this->redirectToRoute('evento_index');
    }

    /**
     * Creates a form to delete a evento entity.
     *
     * @param Evento $evento The evento entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Evento $evento)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('evento_delete', array('id' => $evento->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}