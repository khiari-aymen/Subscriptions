<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users", uniqueConstraints={@ORM\UniqueConstraint(name="Email", columns={"Email"}), @ORM\UniqueConstraint(name="CIN", columns={"CIN"})})
 * @ORM\Entity
 */
class Users
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
     * @var string|null
     *
     * @ORM\Column(name="CIN", type="string", length=20, nullable=true, options={"default"="NULL"})
     */
    private $cin = 'NULL';

    /**
     * @var string
     *
     * @ORM\Column(name="Email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="Password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="Role", type="string", length=0, nullable=false, options={"default"="'user'"})
     */
    private $role = '\'user\'';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="Birthdate", type="date", nullable=true, options={"default"="NULL"})
     */
    private $birthdate = 'NULL';

    /**
     * @var point|null
     *
     * @ORM\Column(name="CurrentPosition", type="point", nullable=true, options={"default"="NULL"})
     */
    private $currentposition = 'NULL';

    /**
     * @var point|null
     *
     * @ORM\Column(name="PreviousLocation", type="point", nullable=true, options={"default"="NULL"})
     */
    private $previouslocation = 'NULL';

    /**
     * @var string|null
     *
     * @ORM\Column(name="PreferredMode", type="string", length=0, nullable=true, options={"default"="NULL"})
     */
    private $preferredmode = 'NULL';

    /**
     * @var array
     *
     * @ORM\Column(name="NotificationSettings", type="simple_array", length=0, nullable=false, options={"default"="'push_notifications'"})
     */
    private $notificationsettings = '\'push_notifications\'';

    /**
     * @var array|null
     *
     * @ORM\Column(name="AccessibilityRequirements", type="simple_array", length=0, nullable=true, options={"default"="'none'"})
     */
    private $accessibilityrequirements = '\'none\'';

    /**
     * @var int|null
     *
     * @ORM\Column(name="LoyaltyPoints", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $loyaltypoints = '0';


}
