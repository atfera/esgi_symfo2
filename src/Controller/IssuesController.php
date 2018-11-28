<?php

namespace App\Controller;

use App\Entity\Issues;
use App\Form\IssuesType;
use App\Repository\IssuesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/issues")
 * @Route(name="app_issues_")
 */
class IssuesController extends AbstractController
{
    /**
     * @Route("/", name="index", methods="GET")
     */
    public function index(IssuesRepository $issuesRepository): Response
    {
        return $this->render('issues/index.html.twig', ['issues' => $issuesRepository->findAll()]);
    }

    /**
     * @Route("/new", name="issues_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $issue = new Issues();
        $form = $this->createForm(IssuesType::class, $issue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($issue);
            $em->flush();

            return $this->redirectToRoute('issues_index');
        }

        return $this->render('issues/new.html.twig', [
            'issue' => $issue,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="issues_show", methods="GET")
     */
    public function show(Issues $issue): Response
    {
        return $this->render('issues/show.html.twig', ['issue' => $issue]);
    }

    /**
     * @Route("/{id}/edit", name="issues_edit", methods="GET|POST")
     */
    public function edit(Request $request, Issues $issue): Response
    {
        $form = $this->createForm(IssuesType::class, $issue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('issues_index', ['id' => $issue->getId()]);
        }

        return $this->render('issues/edit.html.twig', [
            'issue' => $issue,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="issues_delete", methods="DELETE")
     */
    public function delete(Request $request, Issues $issue): Response
    {
        if ($this->isCsrfTokenValid('delete'.$issue->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($issue);
            $em->flush();
        }

        return $this->redirectToRoute('issues_index');
    }
}
