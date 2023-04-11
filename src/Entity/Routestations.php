<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Routestations
 *
 * @ORM\Table(name="routestations", indexes={@ORM\Index(name="RouteID", columns={"RouteID"}), @ORM\Index(name="StationID", columns={"StationID"})})
 * @ORM\Entity
 */
class Routestations
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
     * @var int
     *
     * @ORM\Column(name="SequenceNumber", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $sequencenumber;

    /**
     * @var \Routes
     *
     * @ORM\ManyToOne(targetEntity="Routes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="RouteID", referencedColumnName="ID")
     * })
     */
    private $routeid;

    /**
     * @var \Stations
     *
     * @ORM\ManyToOne(targetEntity="Stations")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="StationID", referencedColumnName="ID")
     * })
     */
    private $stationid;


}
