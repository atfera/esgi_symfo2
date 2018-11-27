<?php

namespace App\Controller;

use App\Entity\AssocIssueNotation;
use App\Form\AssocIssueNotationType;
use App\Repository\AssocIssueNotationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/assoc/issue/notation")
 */
class AssocIssueNotationController extends AbstractController
{
    /**
     * @Route("/", name="assoc_issue_notation_index", methods="GET")
     */
    public function index(AssocIssueNotationRepository $assocIssueNotationRepository): Response
    {
        return $this->render('assoc_issue_notation/index.html.twig', ['assoc_issue_notations' => $assocIssueNotationRepository->findAll()]);
    }

    /**
     * @Route("/new", name="assoc_issue_notation_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $assocIssueNotation = new AssocIssueNotation();
        $form = $this->createForm(AssocIssueNotationType::class, $assocIssueNotation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($assocIssueNotation);
            $em->flush();

            return $this->redirectToRoute('assoc_issue_notation_index');
        }

        return $this->render('assoc_issue_notation/new.html.twig', [
            'assoc_issue_notation' => $assocIssueNotation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="assoc_issue_notation_show", methods="GET")
     */
    public function show(AssocIssueNotation $assocIssueNotation): Response
    {
        return $this->render('assoc_issue_notation/show.html.twig', ['assoc_issue_notation' => $assocIssueNotation]);
    }

    /**
     * @Route("/{id}/edit", name="assoc_issue_notation_edit", methods="GET|POST")
     */
    public function edit(Request $request, AssocIssueNotation $assocIssueNotation): Response
    {
        $form = $this->createForm(AssocIssueNotationType::class, $assocIssueNotation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('assoc_issue_notation_index', ['id' => $assocIssueNotation->getId()]);
        }

        return $this->render('assoc_issue_notation/edit.html.twig', [
            'assoc_issue_notation' => $assocIssueNotation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="assoc_issue_notation_delete", methods="DELETE")
     */
    public function delete(Request $request, AssocIssueNotation $assocIssueNotation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$assocIssueNotation->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($assocIssueNotation);
            $em->flush();
        }

        return $this->redirectToRoute('assoc_issue_notation_index');
    }
}
