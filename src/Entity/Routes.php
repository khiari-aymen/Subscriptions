<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Routes
 *
 * @ORM\Table(name="routes", indexes={@ORM\Index(name="Origin", columns={"Origin"}), @ORM\Index(name="Destination", columns={"Destination"})})
 * @ORM\Entity
 */
class Routes
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
     * @ORM\Column(name="Mode", type="string", length=0, nullable=false)
     */
    private $mode;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="RouteDuration", type="time", nullable=false)
     */
    private $routeduration;

    /**
     * @var string
     *
     * @ORM\Column(name="Fare", type="decimal", precision=10, scale=2, nullable=false)
     */
    private $fare;

    /**
     * @var array|null
     *
     * @ORM\Column(name="AccessibilityFeatures", type="simple_array", length=0, nullable=true, options={"default"="'none'"})
     */
    private $accessibilityfeatures = '\'none\'';

    /**
     * @var \Stations
     *
     * @ORM\ManyToOne(targetEntity="Stations")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Origin", referencedColumnName="ID")
     * })
     */
    private $origin;

    /**
     * @var \Stations
     *
     * @ORM\ManyToOne(targetEntity="Stations")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Destination", referencedColumnName="ID")
     * })
     */
    private $destination;


}
