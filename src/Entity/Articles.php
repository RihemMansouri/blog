<?php

namespace App\Entity;

use App\Repository\ArticlesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticlesRepository::class)
 */
class Articles
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_date;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="articles")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Commentaires::class, inversedBy="articles")
     */
    private $commentaire;

    /**
     * @ORM\ManyToMany(targetEntity=Categories::class, inversedBy="articles")
     */
    private $categorie;

    public function __construct()
    {
        $this->categorie = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getCreatedDate(): ?\DateTimeInterface
    {
        return $this->created_date;
    }

    public function setCreatedDate(\DateTimeInterface $created_date): self
    {
        $this->created_date = $created_date;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getCommentaire(): ?Commentaires
    {
        return $this->commentaire;
    }

    public function setCommentaire(?Commentaires $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * @return Collection|Categories[]
     */
    public function getCategorie(): Collection
    {
        return $this->categorie;
    }

    public function addCategorie(Categories $categorie): self
    {
        if (!$this->categorie->contains($categorie)) {
            $this->categorie[] = $categorie;
        }

        return $this;
    }

    public function removeCategorie(Categories $categorie): self
    {
        $this->categorie->removeElement($categorie);

        return $this;
    }
}
