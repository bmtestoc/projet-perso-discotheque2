<?php

namespace App\Entity;

use App\Repository\ListeRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Table(name="Liste")
 * @ORM\Entity(repositoryClass=ListeRepository::class)
*/
#[ApiResource(
    normalizationContext: ['groups' => ['read:collection']],
    collectionOperations: ['get'],
    itemOperations: ['get']
)]
class Liste
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    #[Groups(['read:collection'])]
    private $artist;

    /**
     * @ORM\Column(type="text")
     */
    #[Groups(['read:collection'])]
    private $album;

    /**
     * @ORM\Column(type="text")
     * @Groups({"read:collection"})
     */
    #[Groups(['read:collection'])]
    private $format;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArtist(): ?string
    {
        return $this->artist;
    }

    public function setArtist(string $artist): self
    {
        $this->artist = $artist;

        return $this;
    }

    public function getAlbum(): ?string
    {
        return $this->album;
    }

    public function setAlbum(string $album): self
    {
        $this->album = $album;

        return $this;
    }

    public function getFormat(): ?string
    {
        return $this->format;
    }

    public function setFormat(string $format): self
    {
        $this->format = $format;

        return $this;
    }
}
