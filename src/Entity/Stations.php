<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stations
 *
 * @ORM\Table(name="stations")
 * @ORM\Entity
 */
class Stations
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
     * @var point
     *
     * @ORM\Column(name="Location", type="point", nullable=false)
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Column(name="Status", type="string", length=0, nullable=false)
     */
    private $status;

    /**
     * @var array|null
     *
     * @ORM\Column(name="AccessibilityFeatures", type="simple_array", length=0, nullable=true, options={"default"="'none'"})
     */
    private $accessibilityfeatures = '\'none\'';

    /**
     * @var array|null
     *
     * @ORM\Column(name="Facilities", type="simple_array", length=0, nullable=true, options={"default"="'none'"})
     */
    private $facilities = '\'none\'';

    /**
     * @var string|null
     *
     * @ORM\Column(name="OperatingHours", type="string", length=255, nullable=true, options={"default"="NULL"})
     */
    private $operatinghours = 'NULL';


}
