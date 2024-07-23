<?php

class Challenge extends BaseModel
{
    private ?int $challenge_id;

    private Datetime $published_at;

    public function __construct(
        private ?string $name,
        private ?string $description,
        private ?string $picture = null,
        private ?string $file_url = null,
        private ?int $type_id = null,
        private ?int $user_id = null
    ) {
        parent::__construct(); // sans ça, pas de connexion avec la BDD
    }

    // Getters and Setters

    public function getChallengeId(): ?int
    {
        return $this->challenge_id;
    }

    public function setChallengeId(?int $challenge_id): self
    {
        $this->challenge_id = $challenge_id;
        return $this;
    }

    public function getPublished_at(): DateTime
    {
        return $this->published_at;
    }

    public function setPublished_at(DateTime $published_at): ?self
    {
        $this->published_at = $published_at;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getPicture(): string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): ?self
    {
        $this->picture = $picture;
        return $this;
    }

    public function getFile_url(): ?string
    {
        return $this->file_url;
    }

    public function setFile_url(?string $file_url): self
    {
        $this->file_url = $file_url;
        return $this;
    }

    public function getType_id(): ?int
    {
        return $this->type_id;
    }

    public function setType_id(?int $type_id): self
    {
        $this->type_id = $type_id;
        return $this;
    }

    public function getUser_id(): ?int
    {
        return $this->user_id;
    }

    public function setUser_id(?int $user_id): self
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function getAllChallenges(): array
    {
        $sql = "SELECT * FROM `challenges`";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
