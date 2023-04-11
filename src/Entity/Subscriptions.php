<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;



/**
 * Subscriptions
 *
 * @ORM\Table(name="subscriptions")
 * @ORM\Entity
 */
class Subscriptions
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="Duration", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $duration;

    /**
     * @var string
     *
     * @ORM\Column(name="Price", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $price;

    /**
     * @var int
     *
     * @ORM\Column(name="LoyaltyPointCost", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $loyaltypointcost;
    
    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="App\Entity\Usersubscriptions", mappedBy="subscriptionid")
     */
    private $usersubscriptions;

    public function __construct()
    {
        $this->usersubscriptions = new ArrayCollection();
    }

    public function addUsersubscription(Usersubscriptions $usersubscription): self
    {
        if (!$this->usersubscriptions->contains($usersubscription)) {
            $this->usersubscriptions[] = $usersubscription;
            $usersubscription->setSubscriptionid($this);
        }

        return $this;
    }

    public function removeUsersubscription(Usersubscriptions $usersubscription): self
    {
        if ($this->usersubscriptions->contains($usersubscription)) {
            $this->usersubscriptions->removeElement($usersubscription);
            // set the owning side to null (unless already changed)
            if ($usersubscription->getSubscriptionid() === $this) {
                $usersubscription->setSubscriptionid(null);
            }
        }

        return $this;
    }

    public function getUsersubscriptions(): Collection
    {
        return $this->usersubscriptions;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getLoyaltyPointCost(): ?int
    {
        return $this->loyaltypointcost;
    }

    public function setLoyaltyPointCost(int $loyaltypointcost): self
    {
        $this->loyaltypointcost = $loyaltypointcost;

        return $this;
    }

    public function getUsers()
    {
        return $this->usersubscriptions;
    }



}
