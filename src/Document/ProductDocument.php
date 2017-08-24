<?php

declare(strict_types=1);

namespace Sylius\ElasticSearchPlugin\Document;

use ONGR\ElasticsearchBundle\Annotation as ElasticSearch;
use ONGR\ElasticsearchBundle\Collection\Collection;

/**
 * @ElasticSearch\Document(type="product")
 */
class ProductDocument
{
    /**
     * @var string
     *
     * @ElasticSearch\Id()
     */
    private $uuid;

    /**
     * @var int
     *
     * @ElasticSearch\Property(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ElasticSearch\Property(type="keyword")
     */
    private $code;

    /**
     * @var string
     *
     * @ElasticSearch\Property(
     *    type="text",
     *    name="name",
     *    options={
     *        "fielddata"=true,
     *        "analyzer"="standard",
     *        "fields"={
     *            "raw"={"type"="keyword"},
     *            "standard"={"type"="text", "analyzer"="standard"}
     *        }
     *    }
     * )
     */
    private $name;

    /**
     * @var boolean
     *
     * @ElasticSearch\Property(type="boolean")
     */
    private $enabled;

    /**
     * @var string
     *
     * @ElasticSearch\Property(type="keyword")
     */
    private $slug;

    /**
     * @var string
     *
     * @ElasticSearch\Property(type="keyword")
     */
    private $channelCode;

    /**
     * @var string
     *
     * @ElasticSearch\Property(type="keyword")
     */
    private $localeCode;

    /**
     * @var string
     *
     * @ElasticSearch\Property(type="text")
     */
    private $description;

    /**
     * @var PriceDocument
     *
     * @ElasticSearch\Embedded(class="Sylius\ElasticSearchPlugin\Document\PriceDocument")
     */
    private $price;

    /**
     * @var TaxonDocument
     *
     * @ElasticSearch\Embedded(class="Sylius\ElasticSearchPlugin\Document\TaxonDocument")
     */
    private $mainTaxon;

    /**
     * @var Collection|TaxonDocument[]
     *
     * @ElasticSearch\Embedded(class="Sylius\ElasticSearchPlugin\Document\TaxonDocument", multiple=true)
     */
    private $taxons;

    /**
     * @var Collection|ProductTaxonDocument[]
     *
     * @ElasticSearch\Embedded(class="Sylius\ElasticSearchPlugin\Document\ProductTaxonDocument", multiple=true)
     */
    private $productTaxons;

    /**
     * @var Collection
     *
     * @ElasticSearch\Embedded(class="Sylius\ElasticSearchPlugin\Document\AttributeDocument", multiple=true)
     */
    private $attributes;

    /**
     * @var Collection
     *
     * @ElasticSearch\Embedded(class="Sylius\ElasticSearchPlugin\Document\ImageDocument", multiple=true)
     */
    private $images;

    /**
     * @var float
     */
    private $averageReviewRating;

    /**
     * @var \DateTimeInterface
     *
     * @ElasticSearch\Property(type="date")
     */
    private $createdAt;

    /**
     * @var Collection
     *
     * @ElasticSearch\Embedded(class="Sylius\ElasticSearchPlugin\Document\VariantDocument", multiple=true)
     */
    private $variants;

    /**
     * @var \DateTimeInterface
     *
     * @ElasticSearch\Property(type="date")
     */
    private $synchronisedAt;

    public function __construct()
    {
        $this->attributes = new Collection();
        $this->taxons = new Collection();
        $this->productTaxons = new Collection();
        $this->images = new Collection();
        $this->variants = new Collection();
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @param string $uuid
     */
    public function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     */
    public function setEnabled(bool $enabled): void
    {
        $this->enabled = $enabled;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }

    /**
     * @return string
     */
    public function getChannelCode(): string
    {
        return $this->channelCode;
    }

    /**
     * @param string $channelCode
     */
    public function setChannelCode(string $channelCode): void
    {
        $this->channelCode = $channelCode;
    }

    /**
     * @return string
     */
    public function getLocaleCode(): string
    {
        return $this->localeCode;
    }

    /**
     * @param string $localeCode
     */
    public function setLocaleCode(string $localeCode): void
    {
        $this->localeCode = $localeCode;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return PriceDocument
     */
    public function getPrice(): PriceDocument
    {
        return $this->price;
    }

    /**
     * @param PriceDocument $price
     */
    public function setPrice(PriceDocument $price): void
    {
        $this->price = $price;
    }

    /**
     * @return TaxonDocument
     */
    public function getMainTaxon(): ?TaxonDocument
    {
        return $this->mainTaxon;
    }

    /**
     * @param TaxonDocument $mainTaxon
     */
    public function setMainTaxon(TaxonDocument $mainTaxon): void
    {
        $this->mainTaxon = $mainTaxon;
    }

    /**
     * @return Collection|TaxonDocument[]
     */
    public function getTaxons(): Collection
    {
        return $this->taxons;
    }

    /**
     * @param Collection|TaxonDocument[] $taxons
     */
    public function setTaxons($taxons): void
    {
        $this->taxons = $taxons;
    }

    /**
     * @return Collection
     */
    public function getProductTaxons()
    {
        return $this->productTaxons;
    }

    /**
     * @param Collection $productTaxons
     */
    public function setProductTaxons(Collection $productTaxons)
    {
        $this->productTaxons = $productTaxons;
    }

    /**
     * @return Collection
     */
    public function getAttributes(): Collection
    {
        return $this->attributes;
    }

    /**
     * @param Collection $attributes
     */
    public function setAttributes(Collection $attributes): void
    {
        $this->attributes = $attributes;
    }

    /**
     * @return Collection
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    /**
     * @param Collection $images
     */
    public function setImages(Collection $images): void
    {
        $this->images = $images;
    }

    /**
     * @return float
     */
    public function getAverageReviewRating(): ?float
    {
        return $this->averageReviewRating;
    }

    /**
     * @param float $averageReviewRating
     */
    public function setAverageReviewRating(float $averageReviewRating): void
    {
        $this->averageReviewRating = $averageReviewRating;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTimeInterface $createdAt
     */
    public function setCreatedAt(\DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getSynchronisedAt(): \DateTimeInterface
    {
        return $this->synchronisedAt;
    }

    /**
     * @param \DateTimeInterface $synchronisedAt
     */
    public function setSynchronisedAt(\DateTimeInterface $synchronisedAt): void
    {
        $this->synchronisedAt = $synchronisedAt;
    }

    /**
     * @return Collection
     */
    public function getVariants(): Collection
    {
        return $this->variants;
    }

    /**
     * @param Collection $variants
     */
    public function setVariants(Collection $variants): void
    {
        $this->variants = $variants;
    }
}
