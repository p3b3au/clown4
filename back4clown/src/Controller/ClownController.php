<?php

namespace App\Controller;

use App\Entity\Clown;
use App\Form\ClownType;
use App\Repository\ClownRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/clown')]
class ClownController extends AbstractController
{
    #[Route('/', name: 'app_clown_index', methods: ['GET'])]
    public function index(ClownRepository $clownRepository): Response
    {
        return $this->render('clown/index.html.twig', [
            'clowns' => $clownRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_clown_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ClownRepository $clownRepository): Response
    {
        $clown = new Clown();
        $form = $this->createForm(ClownType::class, $clown);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $clownRepository->add($clown, true);

            return $this->redirectToRoute('app_clown_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('clown/new.html.twig', [
            'clown' => $clown,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_clown_show', methods: ['GET'])]
    public function show(Clown $clown): Response
    {
        return $this->render('clown/show.html.twig', [
            'clown' => $clown,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_clown_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Clown $clown, ClownRepository $clownRepository): Response
    {
        $form = $this->createForm(ClownType::class, $clown);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $clownRepository->add($clown, true);

            return $this->redirectToRoute('app_clown_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('clown/edit.html.twig', [
            'clown' => $clown,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_clown_delete', methods: ['POST'])]
    public function delete(Request $request, Clown $clown, ClownRepository $clownRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$clown->getId(), $request->request->get('_token'))) {
            $clownRepository->remove($clown, true);
        }

        return $this->redirectToRoute('app_clown_index', [], Response::HTTP_SEE_OTHER);
    }
}
