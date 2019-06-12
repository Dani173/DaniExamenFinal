<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PackRepository")
 */
class Pack
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="datetime")
     */
    private $picked_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $delivered_at;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Employee", inversedBy="packs")
     */
    private $employee_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPickedAt(): ?\DateTimeInterface
    {
        return $this->picked_at;
    }

    public function setPickedAt(\DateTimeInterface $picked_at): self
    {
        $this->picked_at = $picked_at;

        return $this;
    }

    public function getDeliveredAt(): ?\DateTimeInterface
    {
        return $this->delivered_at;
    }

    public function setDeliveredAt(\DateTimeInterface $delivered_at): self
    {
        $this->delivered_at = $delivered_at;

        return $this;
    }

    public function getEmployeeId(): ?Employee
    {
        return $this->employee_id;
    }

    public function setEmployeeId(?Employee $employee_id): self
    {
        $this->employee_id = $employee_id;

        return $this;
    }
}
