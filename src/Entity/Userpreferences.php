<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Userpreferences
 *
 * @ORM\Table(name="userpreferences", indexes={@ORM\Index(name="UserID", columns={"UserID"})})
 * @ORM\Entity
 */
class Userpreferences
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
     * @ORM\Column(name="PreferenceKey", type="string", length=255, nullable=false)
     */
    private $preferencekey;

    /**
     * @var string
     *
     * @ORM\Column(name="PreferenceValue", type="string", length=255, nullable=false)
     */
    private $preferencevalue;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="UserID", referencedColumnName="ID")
     * })
     */
    private $userid;


}
