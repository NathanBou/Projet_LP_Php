<?php


namespace mvc\model\manager;

use mvc\model\entities\SecteursStructures;
use mvc\model\entities\Entity;
use \PDOStatement;

require_once(__DIR__ . '/../entities/SecteursStructures.php');
require_once(__DIR__.'/../entities/Entity.php');
require_once('PDOManager.php');

class SecteursStructuresManager extends PDOManager
{

    public function findById(int $id): ?Entity
    {
        $stmt = $this->executePrepare("select * from secteurs_structures where id=:id", [ "id" => $id]);
        $secteursStructures = $stmt->fetch();
        if (!$secteursStructures) return null;
        return new SecteursStructures($secteursStructures["ID"],$secteursStructures["ID_STRUCTURE"],$secteursStructures["ID_SECTEUR"]);
    }

    public function find(): PDOStatement
    {
        $stmt=$this->executePrepare("select * from secteurs_structures",[]);
        return $stmt;
    }

    public function findAll(int $pdoFecthMode): array
    {
        $stmt=$this->find();
        $secteursStructuresAll = $stmt->fetchAll($pdoFecthMode);
        $secteursStructuresEntities=[];
        foreach($secteursStructuresAll as $secteursStructures) {
            $secteursStructuresEntities[] = new SecteursStructures($secteursStructures["ID"],$secteursStructures["ID_STRUCTURE"],$secteursStructures["ID_SECTEUR"]);
        }
        return $secteursStructuresEntities;
    }

    public function insert(Entity $e): PDOStatement
    {
        $req = "insert into secteurs_structures(id, id_structure, id_secteur) values (:id, :id_structure, :id_secteur)";
        $params = array("id" => $e->getId(), "id_structure" => $e->getIdStructure(), "id_secteur" => $e->getIdSecteur());
        $res=$this->executePrepare($req,$params);
        return $res;
    }

    public function delete(int $id): PDOStatement
    {
        $stmt = $this->executePrepare("delete from secteurs_structures where id=:id", [ "id" => $id]);
        return $stmt;
    }

    public function update(Entity $e): PDOStatement
    {
        $req = "update secteurs_structures set id_structure=:id_structure, id_secteur=:id_secteur  where id=:id";
        $params = array("id" => $e->getId(), "id_structure" => $e->getIdStructure(), "id_secteur" => $e->getIdSecteur());
        $res=$this->executePrepare($req,$params);
        return $res;
    }

}