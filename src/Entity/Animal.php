<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalRepository::class)]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column]
    private ?int $weight = null;

    #[ORM\Column]
    private ?bool $dangerous = null;

    #[ORM\ManyToOne(inversedBy: 'animals')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Family $family = null;

    /**
     * @var Collection<int, Continent>
     */
    #[ORM\ManyToMany(targetEntity: Continent::class, mappedBy: 'animals')]
    private Collection $continents;

    /**
     * @var Collection<int, Dispose>
     */
    #[ORM\OneToMany(targetEntity: Dispose::class, mappedBy: 'animal', orphanRemoval: true)]
    private Collection $disposes;

    public function __construct()
    {
        $this->continents = new ArrayCollection();
        $this->disposes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

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

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): static
    {
        $this->weight = $weight;

        return $this;
    }

    public function isDangerous(): ?bool
    {
        return $this->dangerous;
    }

    public function setDangerous(bool $dangerous): static
    {
        $this->dangerous = $dangerous;

        return $this;
    }

    public function getFamily(): ?Family
    {
        return $this->family;
    }

    public function setFamily(?Family $family): static
    {
        $this->family = $family;

        return $this;
    }

    /**
     * @return Collection<int, Continent>
     */
    public function getContinents(): Collection
    {
        return $this->continents;
    }

    public function addContinent(Continent $continent): static
    {
        if (!$this->continents->contains($continent)) {
            $this->continents->add($continent);
            $continent->addAnimal($this);
        }

        return $this;
    }

    public function removeContinent(Continent $continent): static
    {
        if ($this->continents->removeElement($continent)) {
            $continent->removeAnimal($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Dispose>
     */
    public function getDisposes(): Collection
    {
        return $this->disposes;
    }

    public function addDispose(Dispose $dispose): static
    {
        if (!$this->disposes->contains($dispose)) {
            $this->disposes->add($dispose);
            $dispose->setAnimal($this);
        }

        return $this;
    }

    public function removeDispose(Dispose $dispose): static
    {
        if ($this->disposes->removeElement($dispose)) {
            // set the owning side to null (unless already changed)
            if ($dispose->getAnimal() === $this) {
                $dispose->setAnimal(null);
            }
        }

        return $this;
    }
}
