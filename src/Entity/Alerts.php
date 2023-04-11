<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alerts
 *
 * @ORM\Table(name="alerts")
 * @ORM\Entity
 */
class Alerts
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
     * @ORM\Column(name="AlertType", type="string", length=0, nullable=false)
     */
    private $alerttype;

    /**
     * @var string
     *
     * @ORM\Column(name="Title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="StartTime", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $starttime = 'current_timestamp()';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="EndTime", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $endtime = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="AffectedRoutes", type="text", length=65535, nullable=false)
     */
    private $affectedroutes;

    /**
     * @var string
     *
     * @ORM\Column(name="AffectedStations", type="text", length=65535, nullable=false)
     */
    private $affectedstations;


}
