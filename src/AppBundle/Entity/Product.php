<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductRepository")
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="deger", type="string", length=255)
     */
    private $deger;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set deger
     *
     * @param string $deger
     *
     * @return Product
     */
    public function setDeger($deger)
    {
        $this->deger = $deger;

        return $this;
    }

    /**
     * Get deger
     *
     * @return string
     */
    public function getDeger()
    {
        return $this->deger;
    }
}

