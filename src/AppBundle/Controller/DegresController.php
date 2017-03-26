<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Degres;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Degres controller.
 *
 * @Route("Degres")
 */
class DegresController extends Controller
{
    /**
     * Lists all Degres entities.
     *
     * @Route("/", name="Degres_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $Degress = $em->getRepository('AppBundle:Degres')->findAll();
        return $this->render('AppBundle:Degres:index.html.twig', array(
            'Degress' => $Degress,
        ));
    }
    /**
     * Creates a new Degres entity.
     *
     * @Route("/new", name="Degres_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $Degres = new Degres();
        $form = $this->createForm('AppBundle\Form\DegresType', $Degres);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Degres);
            $em->flush($Degres);
            return $this->redirectToRoute('Degres_show', array('id' => $Degres->getId()));
        }
        return $this->render('AppBundle:Degres:new.html.twig', array(
            'Degres' => $Degres,
            'form' => $form->createView(),
        ));
    }
    /**
     * Finds and displays a Degres entity.
     *
     * @Route("/{id}", name="Degres_show")
     * @Method("GET")
     */
    public function showAction(Degres $Degres)
    {
        $deleteForm = $this->createDeleteForm($Degres);
        return $this->render('AppBundle:Degres:show.html.twig', array(
            'Degres' => $Degres,
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Displays a form to edit an existing Degres entity.
     *
     * @Route("/{id}/edit", name="Degres_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Degres $Degres)
    {
        $deleteForm = $this->createDeleteForm($Degres);
        $editForm = $this->createForm('AppBundle\Form\DegresType', $Degres);
        $editForm->handleRequest($request);
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('Degres_edit', array('id' => $Degres->getId()));
        }
        return $this->render('AppBundle:Degres:edit.html.twig', array(
            'Degres' => $Degres,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Degres entity.
     *
     * @Route("/{id}", name="Degres_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Degres $Degres)
    {
        $form = $this->createDeleteForm($Degres);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($Degres);
            $em->flush($Degres);
        }
        return $this->redirectToRoute('Degres_index');
    }
    /**
     * Creates a form to delete a Degres entity.
     *
     * @param Degres $Degres The Degres entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Degres $Degres)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Degres_delete', array('id' => $Degres->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
