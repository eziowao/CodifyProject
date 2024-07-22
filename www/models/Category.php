<?php

class Category extends BaseModel
{
    private int $categorie_id;
    public function __construct(
        private ?string $name = null
    ) {
        parent::__construct(); // sans ça, pas de connexion avec la BDD
    }

    public function getId_category(): int
    {
        return $this->categorie_id;
    }

    public function setId_category(int $categorie_id): ?self
    {
        $this->categorie_id = $categorie_id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): ?self
    {
        $this->name = $name;
        return $this;
    }

    public function getAll(): array
    {
        $sql = "SELECT `categorie_id`, `name` FROM `categories`";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function add(): bool
    {
        $sql = "INSERT INTO categories (name) VALUES (:name)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':name', $this->getName(), PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function getById($categorie_id)
    {
        $sql = "SELECT * FROM categories WHERE categorie_id = :categorie_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':categorie_id', $categorie_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $name)
    {
        $sql = "UPDATE categories SET name = :name WHERE categorie_id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `categories` WHERE categorie_id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function exists()
    {
        $sql = "SELECT * FROM `categories` WHERE `name`= :name";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->rowCount();
    }
}
