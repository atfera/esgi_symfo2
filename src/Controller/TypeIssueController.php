<?php

namespace App\Controller;

use App\Entity\TypeIssue;
use App\Form\TypeIssueType;
use App\Repository\TypeIssueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/type/issue")
 */
class TypeIssueController extends AbstractController
{
    /**
     * @Route("/", name="type_issue_index", methods="GET")
     */
    public function index(TypeIssueRepository $typeIssueRepository): Response
    {
        return $this->render('type_issue/index.html.twig', ['type_issues' => $typeIssueRepository->findAll()]);
    }

    /**
     * @Route("/new", name="type_issue_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $typeIssue = new TypeIssue();
        $form = $this->createForm(TypeIssueType::class, $typeIssue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeIssue);
            $em->flush();

            return $this->redirectToRoute('type_issue_index');
        }

        return $this->render('type_issue/new.html.twig', [
            'type_issue' => $typeIssue,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_issue_show", methods="GET")
     */
    public function show(TypeIssue $typeIssue): Response
    {
        return $this->render('type_issue/show.html.twig', ['type_issue' => $typeIssue]);
    }

    /**
     * @Route("/{id}/edit", name="type_issue_edit", methods="GET|POST")
     */
    public function edit(Request $request, TypeIssue $typeIssue): Response
    {
        $form = $this->createForm(TypeIssueType::class, $typeIssue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_issue_index', ['id' => $typeIssue->getId()]);
        }

        return $this->render('type_issue/edit.html.twig', [
            'type_issue' => $typeIssue,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="type_issue_delete", methods="DELETE")
     */
    public function delete(Request $request, TypeIssue $typeIssue): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeIssue->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($typeIssue);
            $em->flush();
        }

        return $this->redirectToRoute('type_issue_index');
    }
}
