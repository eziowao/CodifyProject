<?php

class Vehicle extends Category
{
    private int $vehicle_id;

    private ?DateTime $updated_at = null;

    private Datetime $created_at;
    private DateTime $deleted_at;
    public function __construct(
        private ?string $brand = null,
        private ?string $model = null,
        private ?string $registration = null,
        private ?string $mileage = null,
        private ?string $picture = null,
        private ?int $categorie_id = null
    ) {
        parent::__construct(); // sans ça, pas de connexion avec la BDD
    }

    public function getId_vehicles(): int
    {
        return $this->vehicle_id;
    }

    public function setId_vehicles(int $vehicle_id): ?self
    {
        $this->vehicle_id = $vehicle_id;
        return $this;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): ?self
    {
        $this->brand = $brand;
        return $this;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setModel(string $model): ?self
    {
        $this->model = $model;
        return $this;
    }

    public function getRegistration(): string
    {
        return $this->registration;
    }

    public function setRegistration(string $registration): ?self
    {
        $this->registration = $registration;
        return $this;
    }

    public function getMileage()
    {
        return $this->mileage;
    }

    public function setMileage(int $mileage): ?self
    {
        $this->mileage = $mileage;
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
    public function getCreated_at(): DateTime
    {
        return $this->created_at;
    }

    public function setCreated_at(DateTime $created_at): ?self
    {
        $this->created_at = $created_at;
        return $this;
    }
    public function getUpdated_at(): DateTime
    {
        return $this->updated_at;
    }

    public function setUpdated_at(DateTime $updated_at): ?self
    {
        $this->updated_at = $updated_at;
        return $this;
    }
    public function getDeleted_at(): DateTime
    {
        return $this->deleted_at;
    }

    public function setDeleted_at(DateTime $deleted_at): ?self
    {
        $this->deleted_at = $deleted_at;
        return $this;
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

    public function getAll(string $sortColumn = 'vehicle_id', string $sortOrder = 'ASC'): array
    {
        $allowedSortColumns = ['vehicle_id', 'categorie_id', 'brand', 'model', 'mileage', 'created_at'];
        $allowedSortOrder = ['ASC', 'DESC'];

        if (!in_array($sortColumn, $allowedSortColumns)) {
            $sortColumn = 'vehicle_id';
        }
        if (!in_array($sortOrder, $allowedSortOrder)) {
            $sortOrder = 'ASC';
        }

        $sql = "SELECT 
        /* Vehicles */
        `vehicles`.`brand`,
        `vehicles`.`model`,
        `vehicles`.`registration`,
        `vehicles`.`picture`,
        `vehicles`.`mileage`,
        `vehicles`.`vehicle_id`,
        `vehicles`.`categorie_id`,
        `vehicles`.`created_at`,
        /*Categorie */
        `categories`.`name`
        FROM vehicles
        LEFT JOIN categories ON  `categories`.`categorie_id` = `vehicles`.`categorie_id`
        ORDER BY $sortColumn $sortOrder";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }

    public function getAllWithLimit(int $limit, int $offset): array
    {
        $sql = "SELECT 
    /* Vehicles */
    `vehicles`.`brand`,
    `vehicles`.`model`,
    `vehicles`.`registration`,
    `vehicles`.`picture`,
    `vehicles`.`mileage`,
    `vehicles`.`vehicle_id`,
    `vehicles`.`categorie_id`,
    `vehicles`.`created_at`,
    /*Categorie */
    `categories`.`name`
    FROM `vehicles`
    LEFT JOIN `categories` ON  `categories`.`categorie_id` = `vehicles`.`categorie_id`
    LIMIT :limit OFFSET :offset";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function countAll(): int
    {
        $sql = "SELECT COUNT(*) FROM `vehicles`";
        $stmt = $this->db->query($sql);
        return (int)$stmt->fetchColumn();
    }

    public function add(): bool
    {
        $sql = "INSERT INTO vehicles (brand, model, registration, mileage, picture, categorie_id) VALUES (:brand, :model, :registration, :mileage, :picture, :categorie_id)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':brand', $this->getBrand(), PDO::PARAM_STR);
        $stmt->bindValue(':model', $this->getModel(), PDO::PARAM_STR);
        $stmt->bindValue(':registration', $this->getRegistration(), PDO::PARAM_STR);
        $stmt->bindValue(':mileage', $this->getMileage(), PDO::PARAM_INT);
        $stmt->bindValue(':picture', $this->getPicture(), PDO::PARAM_STR);
        $stmt->bindValue(':categorie_id', $this->getId_category(), PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function checkPicture(): bool
    {
        $sql = "SELECT 
        `vehicles`.`picture`,
        FROM `vehicles`
        WHERE `vehicles`.`vehicle_id`";
        return false;
    }

    public function getById($vehicle_id)
    {
        $sql = "SELECT * FROM vehicles WHERE vehicle_id = :vehicle_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':vehicle_id', $vehicle_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateVehicle($id, $brand, $model, $registration, $mileage, $picture, $categorie_id)
    {
        $sql = "UPDATE `vehicles` SET `brand`= :brand, `model`= :model,`registration`= :registration,`mileage`= :mileage,`picture`= :picture,`categorie_id`= :categorie_id WHERE vehicle_id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':brand', $brand, PDO::PARAM_STR);
        $stmt->bindValue(':model', $model, PDO::PARAM_STR);
        $stmt->bindValue(':registration', $registration, PDO::PARAM_STR);
        $stmt->bindValue(':mileage', $mileage, PDO::PARAM_INT);
        $stmt->bindValue(':picture', $picture, PDO::PARAM_STR);
        $stmt->bindValue(':categorie_id', $categorie_id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function deleteVehicle($id)
    {
        $sql = "DELETE FROM `vehicles` WHERE `vehicle_id` = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function searchVehicles(string $searchTerm, string $category, int $limit = 10, int $offset = 0): array
    {
        $sql = "SELECT 
            `vehicles`.`brand`,
            `vehicles`.`model`,
            `vehicles`.`registration`,
            `vehicles`.`picture`,
            `vehicles`.`mileage`,
            `vehicles`.`vehicle_id`,
            `vehicles`.`categorie_id`,
            `vehicles`.`created_at`,
            `categories`.`name`
            FROM `vehicles`
            LEFT JOIN `categories` ON `categories`.`categorie_id` = `vehicles`.`categorie_id`
            WHERE (`vehicles`.`brand` LIKE :searchTerm OR `vehicles`.`model` LIKE :searchTerm)";

        if ($category) {
            $sql .= " AND `vehicles`.`categorie_id` = :category";
        }

        $sql .= " LIMIT :limit OFFSET :offset";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':searchTerm', $searchTerm . '%', PDO::PARAM_STR);

        if ($category) {
            $stmt->bindValue(':category', $category, PDO::PARAM_INT);
        }

        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function countSearchResults(string $searchTerm, string $category): int
    {
        $sql = "SELECT COUNT(*) FROM vehicles 
                WHERE (brand LIKE :searchTerm OR model LIKE :searchTerm)";

        if ($category) {
            $sql .= " AND `vehicles`.categorie_id = :category";
        }

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':searchTerm', $searchTerm . '%', PDO::PARAM_STR);

        if ($category) {
            $stmt->bindValue(':category', $category, PDO::PARAM_INT);
        }

        $stmt->execute();

        return (int)$stmt->fetchColumn();
    }
}
