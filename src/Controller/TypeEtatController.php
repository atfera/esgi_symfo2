<?php

namespace App\Controller;

use App\Entity\TypeEtat;
use App\Form\TypeEtatType;
use App\Repository\TypeEtatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/type/etat")
 */
class TypeEtatController extends AbstractController
{
    /**
     * @Route("/", name="type_etat_index", methods="GET")
     */
    public function index(TypeEtatRepository $typeEtatRepository): Response
    {
        return $this->render('type_etat/index.html.twig', ['type_etats' => $typeEtatRepository->findAll()]);
    }

    /**
     * @Route("/new", name="type_etat_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $typeEtat = new TypeEtat();
        $form = $this->createForm(TypeEtatType::class, $typeEtat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeEtat);
            $em->flush();

            return $this->redirectToRoute('type_etat_index');
        }

        return $this->render('type_etat/new.html.twig', [
            'type_etat' => $typeEtat,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_etat_show", methods="GET")
     */
    public function show(TypeEtat $typeEtat): Response
    {
        return $this->render('type_etat/show.html.twig', ['type_etat' => $typeEtat]);
    }

    /**
     * @Route("/{id}/edit", name="type_etat_edit", methods="GET|POST")
     */
    public function edit(Request $request, TypeEtat $typeEtat): Response
    {
        $form = $this->createForm(TypeEtatType::class, $typeEtat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_etat_index', ['id' => $typeEtat->getId()]);
        }

        return $this->render('type_etat/edit.html.twig', [
            'type_etat' => $typeEtat,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_etat_delete", methods="DELETE")
     */
    public function delete(Request $request, TypeEtat $typeEtat): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeEtat->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($typeEtat);
            $em->flush();
        }

        return $this->redirectToRoute('type_etat_index');
    }
}
