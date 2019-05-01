<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SiteRepository")
 */
class Site
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
    
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\SiteType", inversedBy="sites")
     * @ORM\JoinColumn(nullable=false)
     */
    private $siteType;
    
    /**
     * @ORM\Column(type="decimal", precision=20, scale=15)
     */
    private $latitude;

    /**
     * @ORM\Column(type="decimal", precision=20, scale=15)
     */
    private $longitude;

    /**
     * @ORM\Column(type="integer")
     */
    private $zoom;

    /**
     * @ORM\Column(type="decimal", precision=20, scale=15)
     */
    private $nlatitude;

    /**
     * @ORM\Column(type="decimal", precision=20, scale=15)
     */
    private $slatitude;

    /**
     * @ORM\Column(type="decimal", precision=20, scale=15)
     */
    private $elongitude;

    /**
     * @ORM\Column(type="decimal", precision=20, scale=15)
     */
    private $wlongitude;

    /**
     * @ORM\Column(type="integer")
     */
    private $position;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function setSiteType(SiteType $siteType)
    {
        $this->siteType = $siteType;
        return $this;
    }
    
    public function getSiteType()
    {
        return $this->siteType;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function setLatitude($latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function setLongitude($longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getZoom(): ?int
    {
        return $this->zoom;
    }

    public function setZoom(int $zoom): self
    {
        $this->zoom = $zoom;

        return $this;
    }

    public function getNlatitude()
    {
        return $this->nlatitude;
    }

    public function setNlatitude($nlatitude): self
    {
        $this->nlatitude = $nlatitude;

        return $this;
    }

    public function getSlatitude()
    {
        return $this->slatitude;
    }

    public function setSlatitude($slatitude): self
    {
        $this->slatitude = $slatitude;

        return $this;
    }

    public function getElongitude()
    {
        return $this->elongitude;
    }

    public function setElongitude($elongitude): self
    {
        $this->elongitude = $elongitude;

        return $this;
    }

    public function getWlongitude()
    {
        return $this->wlongitude;
    }

    public function setWlongitude($wlongitude): self
    {
        $this->wlongitude = $wlongitude;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;

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
}
