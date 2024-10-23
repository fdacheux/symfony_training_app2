<?php

namespace App\Entity;

use App\Repository\PersonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonRepository::class)]
class Person
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, Dispose>
     */
    #[ORM\OneToMany(targetEntity: Dispose::class, mappedBy: 'person')]
    private Collection $disposes;

    public function __construct()
    {
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
            $dispose->setPerson($this);
        }

        return $this;
    }

    public function removeDispose(Dispose $dispose): static
    {
        if ($this->disposes->removeElement($dispose)) {
            // set the owning side to null (unless already changed)
            if ($dispose->getPerson() === $this) {
                $dispose->setPerson(null);
            }
        }

        return $this;
    }
}
