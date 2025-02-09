<?php

class User extends BaseModel
{
    private ?int $user_id = null;

    private ?string $created_at = null;
    private ?string $updated_at = null;
    private ?string $deleted_at = null;

    public function __construct(
        private ?string $pseudo = null,
        private ?string $email = null,
        private ?string $password = null,
        private ?int $role = 1,
        private ?string $picture = null,
        private ?string $biography = null,
        private ?string $website = null,
        private ?string $github = null,
        private ?string $twitter = null,
        private ?string $linkedin = null,
        private ?string $discord = null,
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

    public function getRole(): ?int
    {
        return $this->role;
    }

    public function setRole(?int $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;
        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): ?self
    {
        $this->picture = $picture;
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

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;
        return $this;
    }
    public function getGithub(): ?string
    {
        return $this->github;
    }

    public function setGithub(?string $github): self
    {
        $this->github = $github;
        return $this;
    }
    public function getTwitter(): ?string
    {
        return $this->twitter;
    }

    public function setTwitter(?string $twitter): self
    {
        $this->twitter = $twitter;
        return $this;
    }
    public function getLinkedin(): ?string
    {
        return $this->linkedin;
    }

    public function setLinkedin(?string $linkedin): self
    {
        $this->linkedin = $linkedin;
        return $this;
    }
    public function getDiscord(): ?string
    {
        return $this->discord;
    }

    public function setDiscord(?string $discord): self
    {
        $this->discord = $discord;
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

    /**
     * Get the value of deleted_at
     */
    public function getDeletedAt(): ?string
    {
        return $this->deleted_at;
    }

    /**
     * Set the value of deleted_at
     */
    public function setDeletedAt(?string $deleted_at): self
    {
        $this->deleted_at = $deleted_at;

        return $this;
    }

    public function getAllUsers(?string $orderBy = 'user_id', ?string $orderDirection = 'DESC', int $limit = 10, int $offset = 0): array
    {
        $validColumns = ['user_id', 'created_at', 'updated_at', 'pseudo'];
        $orderBy = in_array($orderBy, $validColumns) ? $orderBy : 'user_id';
        $orderDirection = strtoupper($orderDirection) === 'ASC' ? 'ASC' : 'DESC';

        $offset = max(0, $offset);

        $sql = "SELECT * FROM `users` WHERE `deleted_at` IS NULL ORDER BY $orderBy $orderDirection LIMIT :limit OFFSET :offset";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function addUser(): bool
    {
        $sql = "INSERT INTO `users`(`pseudo`, `email`, `password`) 
                VALUES (:pseudo, :email, :password);";
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $stmt->bindValue(':email', $this->email, PDO::PARAM_STR);
        $stmt->bindValue(':password', $this->password, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function getUserById(?int $user_id = null): ?array
    {
        if ($user_id !== null) {
            $this->setUserId($user_id);
        }

        $sql = "SELECT * FROM `users` WHERE user_id = :user_id;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':user_id', $this->getUserId(), PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUser(): bool
    {
        $sql = "UPDATE `users` SET 
                `pseudo` = :pseudo, 
                `email` = :email, 
                `biography` = :biography, 
                `picture` = :picture, 
                `website` = :website, 
                `github` = :github, 
                `twitter` = :twitter, 
                `linkedin` = :linkedin, 
                `discord` = :discord 
                WHERE user_id = :id;";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $this->getUserId(), PDO::PARAM_INT);
        $stmt->bindValue(':pseudo', $this->getPseudo(), PDO::PARAM_STR);
        $stmt->bindValue(':email', $this->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':biography', $this->getBiography(), PDO::PARAM_STR);
        $stmt->bindValue(':picture', $this->getPicture(), PDO::PARAM_STR);
        $stmt->bindValue(':website', $this->getWebsite(), PDO::PARAM_STR);
        $stmt->bindValue(':github', $this->getGithub(), PDO::PARAM_STR);
        $stmt->bindValue(':twitter', $this->getTwitter(), PDO::PARAM_STR);
        $stmt->bindValue(':linkedin', $this->getLinkedin(), PDO::PARAM_STR);
        $stmt->bindValue(':discord', $this->getDiscord(), PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function deleteUser(): bool
    {
        $sql = "UPDATE `users` 
                SET `deleted_at` = NOW()
                WHERE `user_id` = :user_id;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':user_id', $this->getUserId(), PDO::PARAM_INT);
        return $stmt->execute();
    }

    public static function isMailExist(string $email): bool
    {
        $sql = 'SELECT `email` FROM `users` 
            WHERE `email` = :email 
              AND `deleted_at` IS NULL;';
        $stmt = Database::connect()->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetch() ? true : false;
    }

    public static function isPseudoExist(string $pseudo): bool
    {
        $sql = 'SELECT `pseudo` FROM `users` 
            WHERE `pseudo` = :pseudo 
              AND `deleted_at` IS NULL;';
        $stmt = Database::connect()->prepare($sql);
        $stmt->bindValue(':pseudo', $pseudo);
        $stmt->execute();
        return $stmt->fetch() ? true : false;
    }

    public static function getUserByEmail(string $email): object|false
    {
        $sql = 'SELECT * FROM `users` 
            WHERE `email` = :email 
              AND `deleted_at` IS NULL;';
        $stmt = Database::connect()->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function isAdmin(): bool
    {
        if (isset($_SESSION['user']) && $_SESSION['user']->role === 2) {
            return true;
        } else {
            return false;
        }
    }

    public static function isUser(): bool
    {
        if (isset($_SESSION['user']) && $_SESSION['user']->role === 1) {
            return true;
        } else {
            return false;
        }
    }
    // pagination & search 

    public function getUsersCount(?string $search = null): int
    {
        if ($search) {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM users WHERE user_id LIKE :search OR pseudo LIKE :search");
            $stmt->execute(['search' => '%' . $search . '%']);
        } else {
            $stmt = $this->db->query("SELECT COUNT(*) FROM users");
        }

        return $stmt->fetchColumn();
    }

    public function searchUsers(string $search, string $orderBy, string $direction, int $limit, int $offset): array
    {
        $searchPattern = $search . '%';

        $sql = "SELECT * FROM users 
            WHERE (pseudo LIKE :search 
               OR user_id LIKE :search)
              AND deleted_at IS NULL
            ORDER BY $orderBy $direction 
            LIMIT :limit OFFSET :offset";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':search', $searchPattern, PDO::PARAM_STR);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
