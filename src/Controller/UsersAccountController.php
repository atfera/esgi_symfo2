<?php

namespace App\Controller;

use App\Entity\UsersAccount;
use App\Form\UsersAccount1Type;
use App\Repository\UsersAccountRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/users")
 */
class UsersAccountController extends AbstractController
{
    /**
     * @Route("/", name="users_account_index", methods="GET")
     */
    public function index(UsersAccountRepository $usersAccountRepository): Response
    {
        return $this->render('users_account/index.html.twig', ['users_accounts' => $usersAccountRepository->findAll()]);
    }

    /**
     * @Route("/new", name="users_account_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $usersAccount = new UsersAccount();
        $form = $this->createForm(UsersAccount1Type::class, $usersAccount);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($usersAccount);
            $em->flush();

            return $this->redirectToRoute('users_account_index');
        }

        return $this->render('users_account/new.html.twig', [
            'users_account' => $usersAccount,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="users_account_show", methods="GET")
     */
    public function show(UsersAccount $usersAccount): Response
    {
        return $this->render('users_account/show.html.twig', ['users_account' => $usersAccount]);
    }

    /**
     * @Route("/{id}/edit", name="users_account_edit", methods="GET|POST")
     */
    public function edit(Request $request, UsersAccount $usersAccount): Response
    {
        $form = $this->createForm(UsersAccount1Type::class, $usersAccount);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('users_account_index', ['id' => $usersAccount->getId()]);
        }

        return $this->render('users_account/edit.html.twig', [
            'users_account' => $usersAccount,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="users_account_delete", methods="DELETE")
     */
    public function delete(Request $request, UsersAccount $usersAccount): Response
    {
        if ($this->isCsrfTokenValid('delete'.$usersAccount->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($usersAccount);
            $em->flush();
        }

        return $this->redirectToRoute('users_account_index');
    }
}
