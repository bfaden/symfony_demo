<?php

namespace App\Service;

use App\Entity\Bicycle;
use App\Repository\BicycleRepository;
use Doctrine\ORM\EntityManagerInterface;

class BicycleService
{
    public function __construct(
        BicycleRepository $bicycleRepository
        , EntityManagerInterface $entityManager
    )
    {
        $this->entityManager = $entityManager;
        $this->bicycleRepository = $bicycleRepository;
    }

    public function create(Bicycle $bicycle)
    {
        $this->bicycleRepository->add($bicycle, true);
    }
    
    public function delete(Bicycle $bicycle)
    {
        $this->bicycleRepository->remove($bicycle, true);
    }

    public function flush()
    {
        $this->entityManager->flush();
    }

    public function findAll() : array
    {
        return $this->bicycleRepository->findAll();
    }

    public function find($id) : Bicycle
    {
        return $this->bicycleRepository->find($id);
    }
}