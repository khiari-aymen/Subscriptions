<?php

namespace App\Entity;

use App\Entity\Users;
use DateTimeInterface;
use App\Entity\Subscriptions;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Usersubscriptions
 *
 * @ORM\Table(name="usersubscriptions", indexes={@ORM\Index(name="UserID", columns={"UserID"}), @ORM\Index(name="SubscriptionID", columns={"SubscriptionID"})})
 * @ORM\Entity
 */
class Usersubscriptions
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id = 'NULL' ;

    /**
     *
     * @ORM\Column(name="StartDate", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $startdate = null;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="EndDate", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $enddate = null;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="UserID", referencedColumnName="ID")
     * })
     */
    private $userid;
    

    /**
     * @var \Subscriptions
     *
     * @ORM\ManyToOne(targetEntity="Subscriptions")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="SubscriptionID", referencedColumnName="ID")
     * })
     */
    private $subscriptionid;

    /**
     * @var Users
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Users", inversedBy="usersubscriptions")
     * @ORM\JoinColumn(name="UserID", referencedColumnName="ID")
     */
    private $user;
    

    public function setUser(Users $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getUser(): ?Users
    {
        return $this->user;
    }
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartDate(): ?DateTimeInterface
    {
        return $this->startdate;
    }

    public function setStartDate(?DateTimeInterface $startdate): self
    {
        $this->startdate = $startdate;

        return $this;
    }

    public function getEndDate(): ?DateTime
    {
        return $this->enddate;
    }

    public function setEndDate(?\DateTimeInterface $enddate): self
    {
        $this->enddate = $enddate;

        return $this;
    }

    public function getUserid(): ?Users
    {
        return $this->userid;
    }

    public function setUserid(?Users $userid): self
    {
        $this->userid = $userid;

        return $this;
    }

    public function getSubscriptionid(): ?Subscriptions
    {
        return $this->subscriptionid;
    }
    
    public function setSubscriptionid(?Subscriptions $subscriptionid): self
    {
        $this->subscriptionid = $subscriptionid;

        return $this;
    }
}
