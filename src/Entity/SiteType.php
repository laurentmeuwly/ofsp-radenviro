<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SiteTypeRepository")
 */
class SiteType
{
    use ORMBehaviors\Translatable\Translatable;
    use TimestampableEntity;
    
    public function __call($method, $args)
    {
        if (!method_exists(self::getTranslationEntityClass(), $method)) {
            $method = 'get' . ucfirst($method);
        }
        
        return $this->proxyCurrentLocaleTranslation($method, $args);
    }
    
    public function __toString()
    {
        return (string) $this->getName();
    }
    
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $position;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $color;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;
    
    /**
     * Sites of the SiteType.
     *
     * @var Site[]
     * @ORM\OneToMany(targetEntity="Site", mappedBy="siteType")
     **/
    private $sites;
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(?int $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }
    
    /**
     * Return all sites associated to the siteType.
     *
     * @return Site[]
     */
    public function getSites()
    {
        return $this->sites;
    }
    
    /**
     * Set all sites in the siteType.
     *
     * @param Site[] $sites
     */
    public function setSites($sites)
    {
        $this->sites->clear();
        $this->sites = new ArrayCollection($sites);
    }
}
