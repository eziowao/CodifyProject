<?php

class User extends BaseModel
{
    private ?int $user_id = null;

    public function __construct(
        private ?string $pseudo = null,
        private ?string $email = null,
        private ?string $password = null,
        private ?string $biography = null,
        private ?string $social_networks = null,
        private ?int $classement_id = null,
        private ?int $classement_id_2 = null,
        private ?int $classement_id_3 = null
    ) {
        parent::__construct(); // sans ça, pas de connexion avec la BDD
    }

    // Getters and Setters

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(?int $user_id): self
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(?string $pseudo): self
    {
        $this->pseudo = $pseudo;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function getBiography(): ?string
    {
        return $this->biography;
    }

    public function setBiography(?string $biography): self
    {
        $this->biography = $biography;
        return $this;
    }

    public function getSocialNetworks(): ?string
    {
        return $this->social_networks;
    }

    public function setSocialNetworks(?string $social_networks): self
    {
        $this->social_networks = $social_networks;
        return $this;
    }

    public function getClassementId(): ?int
    {
        return $this->classement_id;
    }

    public function setClassementId(?int $classement_id): self
    {
        $this->classement_id = $classement_id;
        return $this;
    }

    public function getClassementId2(): ?int
    {
        return $this->classement_id_2;
    }

    public function setClassementId2(?int $classement_id_2): self
    {
        $this->classement_id_2 = $classement_id_2;
        return $this;
    }

    public function getClassementId3(): ?int
    {
        return $this->classement_id_3;
    }

    public function setClassementId3(?int $classement_id_3): self
    {
        $this->classement_id_3 = $classement_id_3;
        return $this;
    }

    public function getAllUsers(): array
    {
        $sql = "SELECT * FROM `users`";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
