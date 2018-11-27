<?php

namespace App\Controller;

use App\Entity\AssocIssueCommentaire;
use App\Form\AssocIssueCommentaireType;
use App\Repository\AssocIssueCommentaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/assoc/issue/commentaire")
 */
class AssocIssueCommentaireController extends AbstractController
{
    /**
     * @Route("/", name="assoc_issue_commentaire_index", methods="GET")
     */
    public function index(AssocIssueCommentaireRepository $assocIssueCommentaireRepository): Response
    {
        return $this->render('assoc_issue_commentaire/index.html.twig', ['assoc_issue_commentaires' => $assocIssueCommentaireRepository->findAll()]);
    }

    /**
     * @Route("/new", name="assoc_issue_commentaire_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $assocIssueCommentaire = new AssocIssueCommentaire();
        $form = $this->createForm(AssocIssueCommentaireType::class, $assocIssueCommentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($assocIssueCommentaire);
            $em->flush();

            return $this->redirectToRoute('assoc_issue_commentaire_index');
        }

        return $this->render('assoc_issue_commentaire/new.html.twig', [
            'assoc_issue_commentaire' => $assocIssueCommentaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="assoc_issue_commentaire_show", methods="GET")
     */
    public function show(AssocIssueCommentaire $assocIssueCommentaire): Response
    {
        return $this->render('assoc_issue_commentaire/show.html.twig', ['assoc_issue_commentaire' => $assocIssueCommentaire]);
    }

    /**
     * @Route("/{id}/edit", name="assoc_issue_commentaire_edit", methods="GET|POST")
     */
    public function edit(Request $request, AssocIssueCommentaire $assocIssueCommentaire): Response
    {
        $form = $this->createForm(AssocIssueCommentaireType::class, $assocIssueCommentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('assoc_issue_commentaire_index', ['id' => $assocIssueCommentaire->getId()]);
        }

        return $this->render('assoc_issue_commentaire/edit.html.twig', [
            'assoc_issue_commentaire' => $assocIssueCommentaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="assoc_issue_commentaire_delete", methods="DELETE")
     */
    public function delete(Request $request, AssocIssueCommentaire $assocIssueCommentaire): Response
    {
        if ($this->isCsrfTokenValid('delete'.$assocIssueCommentaire->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($assocIssueCommentaire);
            $em->flush();
        }

        return $this->redirectToRoute('assoc_issue_commentaire_index');
    }
}
