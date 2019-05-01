<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NetworkRepository")
 */
class Network
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
     * @ORM\Column(type="string", length=30)
     */
    private $code;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active=false;
    
    public function __call($method, $args)
    {
        if (!method_exists(self::getTranslationEntityClass(), $method)) {
            $method = 'get' . ucfirst($method);
        }
        
        return $this->proxyCurrentLocaleTranslation($method, $args);
    }
    
    public function __toString()
    {
        return (string)$this->getName();
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
