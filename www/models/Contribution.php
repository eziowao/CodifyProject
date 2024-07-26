<?php

class Contribution extends BaseModel
{
    private ?int $contribution_id = null;

    public function __construct(
        private ?string $link = null,
        private ?DateTime $date = null,
        private ?int $user_id = null,
        private ?int $challenge_id = null,
    ) {
        parent::__construct(); // sans ça, pas de connexion avec la BDD
    }
    // Getters and Setters

    public function getContributionId(): ?int
    {
        return $this->contribution_id;
    }

    public function setContributionId(?int $contribution_id): self
    {
        $this->contribution_id = $contribution_id;
        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;
        return $this;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function setDate(DateTime $date): ?self
    {
        $this->date = $date;
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

    public function getChallenge_id(): ?int
    {
        return $this->challenge_id;
    }

    public function setChallenge_id(?int $challenge_id): self
    {
        $this->challenge_id = $challenge_id;
        return $this;
    }

    public function getAllContributions(): array
    {
        $sql = "SELECT * FROM contributions";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function addContribution(): bool
    {
        $sql = "INSERT INTO contributions(link, user_id, challenge_id) 
        VALUES (:link, :user_id, :challenge_id)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':link', $this->getLink(), PDO::PARAM_STR);
        $stmt->bindValue(':user_id', $this->getUser_id(), PDO::PARAM_STR);
        $stmt->bindValue(':challenge_id', $this->getChallenge_id(), PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function getContributionById(): ?array
    {
        $sql = "SELECT * FROM `contributions` WHERE contribution_id = :contribution_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':contribution_id', $this->getContributionId(), PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function updateContribution(): bool
    {
        $sql = "UPDATE contributions 
                SET link = :link, date = :date, user_id = :user_id, challenge_id = :challenge_id 
                WHERE contribution_id = :contribution_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':link', $this->getLink(), PDO::PARAM_STR);
        $stmt->bindValue(':user_id', $this->getUser_id(), PDO::PARAM_INT);
        $stmt->bindValue(':challenge_id', $this->getChallenge_id(), PDO::PARAM_INT);
        $stmt->bindValue(':contribution_id', $this->getContributionId(), PDO::PARAM_INT);

        return $stmt->execute();
    }


    public function deleteContribution(): bool
    {
        $id = $this->getContributionId();
        if ($id === null) {
            throw new Exception('Contribution ID is not set.');
        }

        $sql = "DELETE FROM contributions WHERE contribution_id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }
}
