<?php

namespace App\Controller;

use App\Entity\Interv;
use App\Form\Interv1Type;
use App\Repository\IntervRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/interv')]
class IntervController extends AbstractController
{
    #[Route('/', name: 'app_interv_index', methods: ['GET'])]
    public function index(IntervRepository $intervRepository): Response
    {
        return $this->render('interv/index.html.twig', [
            'intervs' => $intervRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_interv_new', methods: ['GET', 'POST'])]
    public function new(Request $request, IntervRepository $intervRepository): Response
    {
        $interv = new Interv();
        $form = $this->createForm(Interv1Type::class, $interv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $intervRepository->add($interv, true);

            return $this->redirectToRoute('app_interv_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('interv/new.html.twig', [
            'interv' => $interv,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_interv_show', methods: ['GET'])]
    public function show(Interv $interv): Response
    {
        return $this->render('interv/show.html.twig', [
            'interv' => $interv,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_interv_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Interv $interv, IntervRepository $intervRepository): Response
    {
        $form = $this->createForm(Interv1Type::class, $interv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $intervRepository->add($interv, true);

            return $this->redirectToRoute('app_interv_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('interv/edit.html.twig', [
            'interv' => $interv,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_interv_delete', methods: ['POST'])]
    public function delete(Request $request, Interv $interv, IntervRepository $intervRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$interv->getId(), $request->request->get('_token'))) {
            $intervRepository->remove($interv, true);
        }

        return $this->redirectToRoute('app_interv_index', [], Response::HTTP_SEE_OTHER);
    }
}
