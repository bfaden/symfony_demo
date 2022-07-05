<?php
namespace App\Controller;

use App\Entity\Bicycle;
use App\Form\BicycleType;
use App\Service\BicycleService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BicycleController extends AbstractController
{
    private BicycleService $bicycleService;

    public function __construct(BicycleService $bicycleService)
    {
        $this->bicycleService = $bicycleService;
    }

    /**
     * @Route("/", name="index")
     * @Route("/bicycle/list", name="list_bicycle")
     */
    public function list() : Response
    {
        $bicycles = $this->bicycleService->findAll();

        return $this->render("bicycle.list.html.twig", [
            'bicycles' => $bicycles
        ]);
    }

    /**
     * @Route("/bicycle/edit/{id}", name="edit_bicycle")
     */
    public function edit(Request $request, int $id) : Response
    {
        $bicycle = $this->bicycleService->find($id);
        $form = $this->createForm(BicycleType::class, $bicycle);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $bicycle = $form->getData();
            $this->bicycleService->flush();
            return $this->redirectToRoute('list_bicycle');
        }

        return $this->renderForm("bicycle.edit.html.twig", [
            'form' => $form
        ]);
    }

    /**
     * @Route("/bicycle/create", name="create_bicycle")
     */
    public function create(Request $request) : Response
    {
        $bicycle = new Bicycle();
        $form = $this->createForm(BicycleType::class, $bicycle);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $bicycle = $form->getData();
            $this->bicycleService->create($bicycle);
            return $this->redirectToRoute('list_bicycle');
        }

        return $this->renderForm("bicycle.create.html.twig", [
            'form' => $form
        ]);
    }

    /**
     * @Route("/bicycle/delete{id}", name="delete_bicycle")
     */
    public function delete(Request $request, int $id) : Response
    {
        $bicycle = $this->bicycleService->find($id);

        return $this->render("bicycle.delete.html.twig", [
            'bicycle' => $bicycle
        ]);
    }

    /**
     * @Route("/bicycle/confirmDelete/{id}", name="confirm_delete_bicycle")
     */
    public function confirmDelete(Request $request, int $id) : Response
    {
        $bicycle = $this->bicycleService->find($id);
        $this->bicycleService->delete($bicycle);
        return $this->redirectToRoute('list_bicycle');
    }
}