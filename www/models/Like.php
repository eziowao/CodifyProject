<?php

class Like extends BaseModel
{
    private ?int $like_id = null;

    private ?string $created_at = null;


    public function __construct(
        private ?int $like_count = 1,
        private ?int $contribution_id = null,
        private ?int $user_id = null
    ) {
        parent::__construct(); // sans ça, pas de connexion avec la BDD
    }

    /**
     * Get the value of like_id
     */
    public function getLikeId(): ?int
    {
        return $this->like_id;
    }

    /**
     * Set the value of like_id
     */
    public function setLikeId(?int $like_id): self
    {
        $this->like_id = $like_id;

        return $this;
    }

    /**
     * Get the value of like_count
     */
    public function getLikeCount(): ?int
    {
        return $this->like_count;
    }

    /**
     * Set the value of like_count
     */
    public function setLikeCount(?int $like_count): self
    {
        $this->like_count = $like_count;

        return $this;
    }

    /**
     * Get the value of contribution_id
     */
    public function getContributionId(): ?int
    {
        return $this->contribution_id;
    }

    /**
     * Set the value of contribution_id
     */
    public function setContributionId(?int $contribution_id): self
    {
        $this->contribution_id = $contribution_id;

        return $this;
    }

    /**
     * Get the value of user_id
     */
    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     */
    public function setUserId(?int $user_id): self
    {
        $this->user_id = $user_id;

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

    public function getAllLikes(): array
    {
        $sql = "SELECT * FROM `likes`";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // récuperer l'ID d'une contribution en particulier 

    //     SELECT 
    //     COUNT(l.like_id) AS total_likes
    // FROM 
    //     likes l
    // WHERE 
    //     l.contribution_id = 5;

}
