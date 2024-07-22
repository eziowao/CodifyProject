<?php

class Rent extends BaseModel
{

    private ?string $created_at = null;

    /**
     * @param  ?int $categorie_id
     * @param  ?string $name
     * @return void
     */
    public function __construct(
        private ?int $rent_id = null,
        private ?string $start_date = null,
        private ?string $end_date = null,
        private ?string $confirm_at = null,
        private ?string $vehicle_id = null,
        private ?string $client_id = null,
    ) {
        parent::__construct();
    }

    /**
     * Get the value of created_at
     */
    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     */
    public function setCreatedAt(?string $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of rent_id
     */
    public function getRentId(): ?int
    {
        return $this->rent_id;
    }

    /**
     * Set the value of rent_id
     */
    public function setRentId(?int $rent_id): self
    {
        $this->rent_id = $rent_id;

        return $this;
    }

    /**
     * Get the value of start_date
     */
    public function getStartDate(): ?string
    {
        return $this->start_date;
    }

    /**
     * Set the value of start_date
     */
    public function setStartDate(?string $start_date): self
    {
        $this->start_date = $start_date;

        return $this;
    }

    /**
     * Get the value of end_date
     */
    public function getEndDate(): ?string
    {
        return $this->end_date;
    }

    /**
     * Set the value of end_date
     */
    public function setEndDate(?string $end_date): self
    {
        $this->end_date = $end_date;

        return $this;
    }

    /**
     * Get the value of confirm_at
     */
    public function getConfirmAt(): ?string
    {
        return $this->confirm_at;
    }

    /**
     * Set the value of confirm_at
     */
    public function setConfirmAt(?string $confirm_at): self
    {
        $this->confirm_at = $confirm_at;

        return $this;
    }

    /**
     * Get the value of vehicle_id
     */
    public function getVehicleId(): ?string
    {
        return $this->vehicle_id;
    }

    /**
     * Set the value of vehicle_id
     */
    public function setVehicleId(?string $vehicle_id): self
    {
        $this->vehicle_id = $vehicle_id;

        return $this;
    }

    /**
     * Get the value of client_id
     */
    public function getClientId(): ?string
    {
        return $this->client_id;
    }

    /**
     * Set the value of client_id
     */
    public function setClientId(?string $client_id): self
    {
        $this->client_id = $client_id;

        return $this;
    }

    public function insert(): bool
    {
        $sql = "INSERT INTO 
        `rents`(`start_date`, `end_date`, `vehicle_id`, `client_id`) 
        VALUES (:start_date, :end_date, :vehicle_id, :client_id)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':start_date', $this->start_date, PDO::PARAM_STR);
        $stmt->bindValue(':end_date', $this->end_date, PDO::PARAM_STR);
        $stmt->bindValue(':vehicle_id', $this->vehicle_id, PDO::PARAM_INT);
        $stmt->bindValue(':client_id', $this->client_id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
