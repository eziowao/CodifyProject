<?php

class Challenge extends BaseModel
{
    private ?int $challenge_id = null;

    public function __construct(
        private ?string $name = null,
        private ?DateTime $published_at = null,
        private ?string $description = null,
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

    public function addChallenge(): bool
    {
        $sql = "INSERT INTO `challenges` (`name`, `published_at`, `description`, `type_id`, `user_id`, `picture`, `file_url`) 
                VALUES (:name, :published_at, :description, :type_id, :user_id, :picture, :file_url)";
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':name', $this->getName(), PDO::PARAM_STR);
        $stmt->bindValue(':published_at', $this->getPublished_at()->format('Y-m-d H:i:s'), PDO::PARAM_STR);
        $stmt->bindValue(':description', $this->getDescription(), PDO::PARAM_STR);
        $stmt->bindValue(':type_id', $this->getType_id(), PDO::PARAM_INT);
        $stmt->bindValue(':user_id', $this->getUser_id(), PDO::PARAM_INT);
        $stmt->bindValue(':picture', $this->getPicture(), PDO::PARAM_STR);
        $stmt->bindValue(':file_url', $this->getFile_url(), PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function getChallengeById(?int $challenge_id = null): ?array
    {
        if ($challenge_id !== null) {
            $this->setChallengeId($challenge_id);
        }
        $sql = "SELECT * FROM `challenges` WHERE challenge_id = :challenge_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':challenge_id', $this->getChallengeId(), PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateChallenge(): bool
    {
        $sql = "UPDATE `challenges` SET `name`= :name, `published_at`= :published_at, `description`= :description, `picture`= :picture, `file_url`= :file_url, `type_id`= :type_id, `user_id` = :user_id WHERE challenge_id = :id";

        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':name', $this->getName(), PDO::PARAM_STR);
        $stmt->bindValue(':published_at', $this->getPublished_at()->format('Y-m-d H:i:s'), PDO::PARAM_STR);
        $stmt->bindValue(':description', $this->getDescription(), PDO::PARAM_STR);
        $stmt->bindValue(':picture', $this->getPicture(), PDO::PARAM_STR);
        $stmt->bindValue(':file_url', $this->getFile_url(), PDO::PARAM_STR);
        $stmt->bindValue(':type_id', $this->getType_id(), PDO::PARAM_INT);
        $stmt->bindValue(':user_id', $this->getUser_id(), PDO::PARAM_INT);
        $stmt->bindValue(':id', $this->getChallengeId(), PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function deleteChallenge(): bool
    {
        $sql = "DELETE FROM `challenges` WHERE challenge_id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $this->getChallengeId(), PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function getCurrentChallenge(): ?array
    {
        $today = new DateTime();
        $sql = "SELECT * FROM `challenges` WHERE `published_at` <= :today ORDER BY `published_at` DESC LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':today', $today->format('Y-m-d H:i:s'), PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
