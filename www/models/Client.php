<?php

class Client extends BaseModel
{

    private ?string $created_at = null;
    private ?string $updated_at = null;

    /**
     * @param  ?int $categorie_id
     * @param  ?string $name
     * @return void
     */
    public function __construct(
        private ?int $client_id = null,
        private ?string $firstname = null,
        private ?string $lastname = null,
        private ?string $email = null,
        private ?string $birthdate = null,
        private ?string $phone = null,
        private ?string $city = null,
        private ?string $zip_code = null,
    ) {
        parent::__construct();
    }


    public function insert(): bool
    {
        $sql = "INSERT INTO 
        `clients`(`lastname`, `firstname`, `email`, `birthdate`, `phone`, `city`, `zip_code`) 
        VALUES (:lastname, :firstname, :email, :birthdate, :phone, :city, :zip_code)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $stmt->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $stmt->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $stmt->bindValue(':city', $this->city, PDO::PARAM_STR);
        $stmt->bindValue(':zip_code', $this->zip_code, PDO::PARAM_STR);
        return $stmt->execute();
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
     * Get the value of updated_at
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     */
    public function setUpdatedAt(?string $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * Get the value of client_id
     */
    public function getClientId(): ?int
    {
        return $this->client_id;
    }

    /**
     * Set the value of client_id
     */
    public function setClientId(?int $client_id): self
    {
        $this->client_id = $client_id;

        return $this;
    }

    /**
     * Get the value of firstname
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     */
    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     */
    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of birthdate
     */
    public function getBirthdate(): ?string
    {
        return $this->birthdate;
    }

    /**
     * Set the value of birthdate
     */
    public function setBirthdate(?string $birthdate): self
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get the value of phone
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     */
    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of city
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * Set the value of city
     */
    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of zip_code
     */
    public function getZipCode(): ?string
    {
        return $this->zip_code;
    }

    /**
     * Set the value of zip_code
     */
    public function setZipCode(?string $zip_code): self
    {
        $this->zip_code = $zip_code;

        return $this;
    }
}
