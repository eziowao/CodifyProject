<?php

class Contribution extends BaseModel
{
    private ?int $contribution_id = null;

    private ?string $created_at = null;
    private ?string $updated_at = null;

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

    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    public function setCreatedAt(?string $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?string $updated_at): self
    {
        $this->updated_at = $updated_at;

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

    public function getContributionById($contribution_id): ?array
    {
        if ($contribution_id !== null) {
            $this->setContributionId($contribution_id);
        }

        $sql = "SELECT * FROM `contributions` WHERE contribution_id = :contribution_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':contribution_id', $this->getContributionId(), PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateContribution(): bool
    {
        $sql = "UPDATE contributions 
                SET link = :link, user_id = :user_id, challenge_id = :challenge_id 
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

        $sql = "DELETE FROM contributions WHERE contribution_id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $this->getContributionId(), PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function getContributionsWithChallengeByUserId(int $user_id): array
    {
        $sql = "SELECT contributions.*, challenges.picture AS challenge_picture
                FROM contributions
                JOIN challenges ON contributions.challenge_id = challenges.challenge_id
                WHERE contributions.user_id = :user_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getContributionsByChallengeId(int $challenge_id): array
    {
        // Requête SQL pour trier par date de création en ordre décroissant
        $sql = "SELECT c.*, u.pseudo, u.picture, 
                   (SELECT COUNT(*) FROM likes l WHERE l.contribution_id = c.contribution_id) as like_count 
            FROM contributions c
            JOIN users u ON c.user_id = u.user_id
            WHERE c.challenge_id = :challenge_id
            ORDER BY c.created_at DESC"; // Tri par date de création en ordre décroissant
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':challenge_id', $challenge_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }



    public function isOwnedByUser(int $user_id): bool
    {
        $sql = "SELECT COUNT(*) FROM contributions WHERE contribution_id = :contribution_id AND user_id = :user_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':contribution_id', $this->getContributionId(), PDO::PARAM_INT);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        $count = $stmt->fetchColumn();

        return $count > 0;
    }

    public function hasUserContributedToChallenge(int $user_id, int $challenge_id): bool
    {
        $sql = "SELECT COUNT(*) FROM contributions WHERE user_id = :user_id AND challenge_id = :challenge_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindValue(':challenge_id', $challenge_id, PDO::PARAM_INT);
        $stmt->execute();

        $count = $stmt->fetchColumn();

        return $count > 0;
    }
}
