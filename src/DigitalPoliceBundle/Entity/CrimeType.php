<?php
/**
 * Created by PhpStorm.
 * User: dchabanenko
 * Date: 27.01.16
 * Time: 13:39
 */

namespace DigitalPoliceBundle\Entity;


/**
 * @ORM\Entity
 * @ORM\Table(name="crime_types")
 */
class CrimeType
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="text", length=255)
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(type="text", length=255)
     */
    protected $icon;

    /**
     * @ORM\OneToMany(targetEntity="Crime", mappedBy="crimeType")
     */
    protected $crimes;

}