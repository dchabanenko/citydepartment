<?php

namespace DigitalPoliceBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Crime extends Point
{
    /**
     * @var string
     *
     * @ORM\Column(type="text", length=255)
     */
    protected $description;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="reportedCrimes")
     * @ORM\JoinColumn(name="reporter_id", referencedColumnName="id")
     */
    protected $reporter;

    /**
     * @ORM\ManyToOne(targetEntity="CrimeType", inversedBy="crimes")
     * @ORM\JoinColumn(name="crime_type_id", referencedColumnName="id")
     */
    protected $crimeType;

}