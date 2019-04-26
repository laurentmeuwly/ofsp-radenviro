<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CountryRepository")
 */
class Country
{
    use ORMBehaviors\Translatable\Translatable;
    
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $createdAt;
    
    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $code;
    
    
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
    
    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    
    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
    
    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Country
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        
        return $this;
    }
    
    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Country
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        
        return $this;
    }
}
