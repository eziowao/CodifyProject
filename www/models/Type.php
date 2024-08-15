<?php

class Type extends BaseModel
{
    private ?int $type_id = null;

    private ?string $created_at = null;
    private ?string $updated_at = null;

    public function __construct(
        private ?string $type = null,
    ) {
        parent::__construct(); // sans ça, pas de connexion avec la BDD
    }
    // Getters and Setters

    public function getTypeId(): ?int
    {
        return $this->type_id;
    }

    public function setTypeId(?int $type_id): self
    {
        $this->type_id = $type_id;
        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;
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

    public function getAllTypes(): array
    {
        $sql = "SELECT * FROM `types`";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function addType(): bool
    {
        $sql = "INSERT INTO `types` (type) VALUES (:type)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':type', $this->getType(), PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function getTypeById(?int $type_id = null): ?array
    {

        if ($type_id !== null) {
            $this->setTypeId($type_id);
        }

        $sql = "SELECT * FROM `types` WHERE type_id = :type_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':type_id', $this->getTypeId(), PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateType(): bool
    {
        $sql = "UPDATE `types` SET type = :type WHERE type_id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $this->getTypeId(), PDO::PARAM_INT);
        $stmt->bindValue(':type', $this->getType(), PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function deleteType(): bool
    {
        $sql = "DELETE FROM `types` WHERE type_id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $this->getTypeId(), PDO::PARAM_INT);

        return $stmt->execute();
    }
}
