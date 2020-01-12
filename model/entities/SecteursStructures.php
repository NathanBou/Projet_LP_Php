<?php


namespace mvc\model\entities;

require_once('Entity.php');

class SecteursStructures extends Entity
{
    private $id;
    private $idStructure;
    private $idSecteur;

    /**
     * SecteursStructures constructor.
     * @param $id
     * @param $idStructure
     * @param $idSecteur
     */
    public function __construct($id, $idStructure, $idSecteur)
    {
        $this->id = $id;
        $this->idStructure = $idStructure;
        $this->idSecteur = $idSecteur;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIdStructure()
    {
        return $this->idStructure;
    }

    /**
     * @param mixed $idStructure
     */
    public function setIdStructure($idStructure): void
    {
        $this->idStructure = $idStructure;
    }

    /**
     * @return mixed
     */
    public function getIdSecteur()
    {
        return $this->idSecteur;
    }

    /**
     * @param mixed $idSecteur
     */
    public function setIdSecteur($idSecteur): void
    {
        $this->idSecteur = $idSecteur;
    }



}