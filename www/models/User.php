<?php

class User extends BaseModel
{
    private ?int $user_id;

    public function __construct(
        private ?string $pseudo = null,
        private ?string $email = null,
        private ?string $password = null,
        private ?string $picture = null,
        private ?string $biography = null,
        private ?string $website = null,
        private ?string $github = null,
        private ?string $twitter = null,
        private ?string $linkedin = null,
        private ?string $discord = null,
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

    public function getPicture(): string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): ?self
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

    public function addUser(): bool
    {
        $sql = "INSERT INTO `users`(`pseudo`, `email`, `password`) 
                VALUES (:pseudo, :email, :password)";
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':pseudo', $this->getPseudo(), PDO::PARAM_STR);
        $stmt->bindValue(':email', $this->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':password', $this->getPassword(), PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function getUserById($user_id)
    {
        $sql = "SELECT * FROM `users` WHERE user_id = :user_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUser($id, $pseudo, $email, $biography, $picture, $website, $github, $twitter, $linkedin, $discord)
    {
        $sql = "UPDATE `users` SET `pseudo`= :pseudo, `email`= :email,`biography`= :biography,`picture`= :picture, `website`= :website, `github`= :github, `twitter`= :twitter, `linkedin`= :linkedin, `discord`= :discord WHERE user_id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':biography', $biography, PDO::PARAM_STR);
        $stmt->bindValue(':picture', $picture, PDO::PARAM_STR);
        $stmt->bindValue(':website', $website, PDO::PARAM_STR);
        $stmt->bindValue(':github', $github, PDO::PARAM_STR);
        $stmt->bindValue(':twitter', $twitter, PDO::PARAM_STR);
        $stmt->bindValue(':linkedin', $linkedin, PDO::PARAM_STR);
        $stmt->bindValue(':discord', $discord, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function deleteUser($user_id)
    {
        $sql = "DELETE FROM `users` WHERE `user_id` = :user_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
