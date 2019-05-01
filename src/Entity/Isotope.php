<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * @ORM\Entity(repositoryClass="App\Repository\IsotopeRepository")
 */
class Isotope
{
    use ORMBehaviors\Translatable\Translatable;
    use TimestampableEntity;
    
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=10)
     */
    private $code;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $z;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $a;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $decayMode;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $halfLife;

    /**
     * @ORM\Column(type="float", precision=10, scale=0, nullable=true)
     */
    private $seconds;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;
    
    /**
     * @param $method
     * @param $args
     *
     * @return mixed
     */
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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getZ(): ?int
    {
        return $this->z;
    }

    public function setZ(int $z): self
    {
        $this->z = $z;

        return $this;
    }

    public function getA(): ?int
    {
        return $this->a;
    }

    public function setA(?int $a): self
    {
        $this->a = $a;

        return $this;
    }

    public function getDecayMode(): ?string
    {
        return $this->decayMode;
    }

    public function setDecayMode(?string $decayMode): self
    {
        $this->decayMode = $decayMode;

        return $this;
    }

    public function getHalfLife(): ?string
    {
        return $this->halfLife;
    }

    public function setHalfLife(?string $halfLife): self
    {
        $this->halfLife = $halfLife;

        return $this;
    }

    public function getSeconds(): ?float
    {
        return $this->seconds;
    }

    public function setSeconds(?float $seconds): self
    {
        $this->seconds = $seconds;

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
