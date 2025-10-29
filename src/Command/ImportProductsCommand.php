<?php

namespace App\Command;

use App\Entity\Product;
use App\Service\ProductProcessor;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:import-products',
    description: 'Importa productos desde un JSON y los guarda en la base de datos.',
)]
class ImportProductsCommand extends Command
{
    private $em;
    private $processor;

    public function __construct(EntityManagerInterface $em, ProductProcessor $processor)
    {
        parent::__construct();
        $this->em = $em;
        $this->processor = $processor;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // Limpiar la tabla products
        $connection = $this->em->getConnection();
        $platform = $connection->getDatabasePlatform();
        $connection->executeStatement($platform->getTruncateTableSQL('product', true));

        // Cargar y procesar JSON
        $jsonPath = __DIR__ . '/../../assets/data/amazon.json';
        $jsonData = file_get_contents($jsonPath);
        $products = json_decode($jsonData, true);

        $processedProducts = $this->processor->processProducts($products['SearchResult']['Items']);

        // Guardar productos en la base de datos
        foreach ($processedProducts as $data) {
            $product = new Product();
            $product->setAsin($data['asin']);
            $product->setTitle($data['title']);
            $product->setBrand($data['brand']);
            $product->setPrice($data['price']);
            $product->setDisplayPrice($data['displayPrice']);
            $product->setSavings($data['savings']);
            $product->setImage($data['image']);
            $product->setFeatures($data['features']);
            $product->setRanking($data['ranking']);
            $product->setUrl($data['url']);
            $product->setFreeShipping($data['freeShipping']);

            $this->em->persist(object: $product);
        }

        $this->em->flush();

        $output->writeln('Productos importados correctamente.');
        return Command::SUCCESS;
    }
}
