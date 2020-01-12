<?php


namespace mvc\model\manager;

use mvc\model\entities\Secteur;
use mvc\model\entities\Entity;
use \PDOStatement;

require_once(__DIR__ . '/../entities/Secteur.php');
require_once(__DIR__.'/../entities/Entity.php');
require_once('PDOManager.php');


class SecteurManager extends PDOManager
{

    public function findById(int $id): ?Entity
    {
        $stmt = $this->executePrepare("select * from secteur where id=:id", [ "id" => $id]);
        $secteur = $stmt->fetch();
        if (!$secteur) return null;
        return new Secteur($secteur["ID"],$secteur["LIBELLE"]);
    }

    public function find(): PDOStatement
    {
        $stmt=$this->executePrepare("select * from secteur",[]);
        return $stmt;
    }

    public function findAll(int $pdoFecthMode): array
    {
        $stmt=$this->find();
        $secteurs = $stmt->fetchAll($pdoFecthMode);
        $secteurEntities=[];
        foreach($secteurs as $secteur) {
            $secteurEntities[] = new Secteur($secteur["ID"],$secteur["LIBELLE"]);
        }
        return $secteurEntities;
    }

    public function insert(Entity $e): PDOStatement
    {
        $req = "insert into secteur(id, libelle) values (:id, :libelle)";
        $params = array("id" => $e->getId(), "libelle" => $e->getLibelle());
        $res=$this->executePrepare($req,$params);
        return $res;
    }

    public function delete(int $id): PDOStatement
    {
        $stmt = $this->executePrepare("delete from secteur where id=:id", [ "id" => $id]);
        return $stmt;
    }

    public function update(Entity $e): PDOStatement
    {
        $req = "update secteur set libelle=:libelle where id=:id";
        $params = array("id" => $e->getId(), "libelle" => $e->getLibelle());
        $res=$this->executePrepare($req,$params);
        return $res;
    }

}