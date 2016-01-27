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
 * @ORM\Table(name="users")
 */
class User
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
    protected $phoneNumber;

    /**
     * @ORM\OneToMany(targetEntity="Crime", mappedBy="reporter")
     */
    protected $reportedCrimes;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return mixed
     */
    public function getReportedCrimes()
    {
        return $this->reportedCrimes;
    }

    /**
     * @param mixed $reportedCrimes
     */
    public function setReportedCrimes($reportedCrimes)
    {
        $this->reportedCrimes = $reportedCrimes;
    }
}