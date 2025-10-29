<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $asin = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $brand = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column(length: 255)]
    private ?string $display_price = null;

    #[ORM\Column]
    private array $savings = [];

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column]
    private array $features = [];

    #[ORM\Column]
    private ?int $ranking = null;

    #[ORM\Column(length: 255)]
    private ?string $url = null;

    #[ORM\Column]
    private ?bool $free_shipping = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAsin(): ?string
    {
        return $this->asin;
    }

    public function setAsin(string $asin): static
    {
        $this->asin = $asin;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getDisplayPrice(): ?string
    {
        return $this->display_price;
    }

    public function setDisplayPrice(string $display_price): static
    {
        $this->display_price = $display_price;

        return $this;
    }

    public function getSavings(): array
    {
        return $this->savings;
    }

    public function setSavings(array $savings): static
    {
        $this->savings = $savings;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getFeatures(): array
    {
        return $this->features;
    }

    public function setFeatures(array $features): static
    {
        $this->features = $features;

        return $this;
    }

    public function getRanking(): ?int
    {
        return $this->ranking;
    }

    public function setRanking(int $ranking): static
    {
        $this->ranking = $ranking;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): static
    {
        $this->url = $url;

        return $this;
    }

    public function isFreeShipping(): ?bool
    {
        return $this->free_shipping;
    }

    public function setFreeShipping(bool $free_shipping): static
    {
        $this->free_shipping = $free_shipping;

        return $this;
    }
}
