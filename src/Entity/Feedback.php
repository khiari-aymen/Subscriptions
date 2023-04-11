<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Feedback
 *
 * @ORM\Table(name="feedback", indexes={@ORM\Index(name="UserID", columns={"UserID"})})
 * @ORM\Entity
 */
class Feedback
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
     * @ORM\Column(name="FeedbackType", type="string", length=0, nullable=false)
     */
    private $feedbacktype;

    /**
     * @var int
     *
     * @ORM\Column(name="TargetID", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $targetid;

    /**
     * @var string
     *
     * @ORM\Column(name="Category", type="string", length=0, nullable=false)
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="SubmittedAt", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $submittedat = 'current_timestamp()';

    /**
     * @var string
     *
     * @ORM\Column(name="Status", type="string", length=0, nullable=false, options={"default"="'open'"})
     */
    private $status = '\'open\'';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ResolutionDescription", type="text", length=65535, nullable=true, options={"default"="NULL"})
     */
    private $resolutiondescription = 'NULL';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="ResolvedAt", type="datetime", nullable=true, options={"default"="NULL"})
     */
    private $resolvedat = 'NULL';

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
