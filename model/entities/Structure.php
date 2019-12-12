<?php


namespace mvc\model\entities;


require_once('Entity.php');

class Structure extends Entity
{
    private $id;
    private $nom;
    private $rue;
    private $cp;
    private $ville;
    private $estAsso;
    private $nb_donateurs;
    private $nb_actionnaires;

    public function __construct($id, $nom, $rue, $cp, $ville, $estAsso, $nb_donateurs, $nb_actionnaires)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->rue = $rue;
        $this->cp = $cp;
        $this->ville = $ville;
        $this->estAsso = $estAsso;
        $this->nb_donateurs = $nb_donateurs;
        $this->nb_actionnaires = $nb_actionnaires;
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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getRue()
    {
        return $this->rue;
    }

    /**
     * @param mixed $rue
     */
    public function setRue($rue): void
    {
        $this->rue = $rue;
    }

    /**
     * @return mixed
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * @param mixed $cp
     */
    public function setCp($cp): void
    {
        $this->cp = $cp;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville): void
    {
        $this->ville = $ville;
    }

    /**
     * @return mixed
     */
    public function getEstAsso()
    {
        return $this->estAsso;
    }

    /**
     * @param mixed $estAsso
     */
    public function setEstAsso($estAsso): void
    {
        $this->estAsso = $estAsso;
    }

    /**
     * @return mixed
     */
    public function getNbDonateurs()
    {
        return $this->nb_donateurs;
    }

    /**
     * @param mixed $nb_donateurs
     */
    public function setNbDonateurs($nb_donateurs): void
    {
        $this->nb_donateurs = $nb_donateurs;
    }

    /**
     * @return mixed
     */
    public function getNbActionnaires()
    {
        return $this->nb_actionnaires;
    }

    /**
     * @param mixed $nb_actionnaires
     */
    public function setNbActionnaires($nb_actionnaires): void
    {
        $this->nb_actionnaires = $nb_actionnaires;
    }


}