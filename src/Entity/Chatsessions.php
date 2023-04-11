<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chatsessions
 *
 * @ORM\Table(name="chatsessions", indexes={@ORM\Index(name="UserID", columns={"UserID"})})
 * @ORM\Entity
 */
class Chatsessions
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
     * @ORM\Column(name="Status", type="string", length=0, nullable=false, options={"default"="'active'"})
     */
    private $status = '\'active\'';

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
