<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

final class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product')]
    #[IsGranted('ROLE_USER')]
    public function index(ProductRepository $pr): Response
    {
        $products = $pr->findAll();
        
        return $this->render('product/index.html.twig', [
            'products' => $products,
        ]);
    }
}
