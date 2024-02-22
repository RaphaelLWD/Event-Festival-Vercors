<?php
class Reservation
{
    private $_id;
    private $_nombreReservation;
    private $_formule;
    private $_date;
    private $_tarifReduit;
    private $_tente;
    private $_camion;
    private $_enfants;
    private $_casques;
    private $_luge;
    private $_nom;
    private $_prenom;
    private $_mail;
    private $_tel;
    private $_adresse;

    public function __construct(string $nombreReservation, string $formule, string $date, string $tarifReduit, string $tente, string $camion, string $enfants, string $casques, string $luge, string $nom, string $prenom, string $mail, string $tel, int|string $adresse, string $id = "à créer")
    {
        $this->setId($id);
        $this->setNombreReservation($nombreReservation);
        $this->setFormule($formule);
        $this->setDate($date);
        $this->setTarifReduit($tarifReduit);
        $this->setTente($tente);
        $this->setCamion($camion);
        $this->setEnfants($enfants);
        $this->setCasques($casques);
        $this->setLuge($luge);
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setMail($mail);
        $this->setTel($tel);
        $this->setAdresse($adresse);
    }

    public function getId()
    {
        return $this->_id;
    }
    public function setId(int|string $id): void
    {
        if (is_string($id) && $id == "à créer") {
            $this->_id = $this->creerNouvelleId();
        } else {
            $this->_id = $id;
        }
    }

    public function getNombreReservation(): string
    {
        return $this->_nombreReservation;
    }
    public function setNombreReservation(string $nombreReservation): void
    {
        $this->_nombreReservation = $nombreReservation;
    }

    public function getTarifReduit(): string
    {
        return $this->_tarifReduit;
    }
    public function setTarifReduit(string $tarifReduit): void
    {
        $this->_tarifReduit = $tarifReduit;
    }

    public function getFormule(): string
    {
        return $this->_formule;
    }
    public function setFormule(string $formule): void
    {
        $this->_formule = $formule;
    }

    public function getDate(): string
    {
        return $this->_date;
    }
    public function setDate(string $date): void
    {
        $this->_date = $date;
    }

    public function getTente(): string
    {
        return $this->_tente;
    }
    public function setTente(string $tente): void
    {
        $this->_tente = $tente;
    }

    public function getCamion(): string
    {
        return $this->_camion;
    }
    public function setCamion(string $camion): void
    {
        $this->_camion = $camion;
    }

    public function getEnfants(): string
    {
        return $this->_enfants;
    }
    public function setEnfants(string $enfants): void
    {
        $this->_enfants = $enfants;
    }

    public function getCasques(): string
    {
        return $this->_casques;
    }
    public function setCasques(string $casques): void
    {
        $this->_casques = $casques;
    }

    public function getLuge(): string
    {
        return $this->_luge;
    }
    public function setLuge(string $luge): void
    {
        $this->_luge = $luge;
    }

    public function getNom(): string
    {
        return $this->_nom;
    }
    public function setNom(string $nom): void
    {
        $this->_nom = $nom;
    }

    public function getPrenom(): string
    {
        return $this->_prenom;
    }
    public function setPrenom(string $prenom): void
    {
        $this->_prenom = $prenom;
    }

    public function getMail(): string
    {
        return $this->_mail;
    }
    public function setMail(string $mail): void
    {
        $this->_mail = $mail;
    }

    public function getTel(): string
    {
        return $this->_tel;
    }
    public function setTel(string $tel): void
    {
        $this->_tel = $tel;
    }

    public function getAdresse(): string
    {
        return $this->_adresse;
    }
    public function setAdresse(string $adresse): void
    {
        $this->_adresse = $adresse;
    }

    public function getObjectToTicket()
    {
        return [
            "id" => $this->_id,
            "nom" => $this->_nom,
            "prenom" => $this->_prenom,
            "mail" => $this->_mail,
            "tel" => $this->_tel,
            "adresse" => $this->_adresse,
            "nombreReservation" => $this->_nombreReservation,
            "tarifReduit" => $this->_tarifReduit,
            "formule" => $this->_formule,
            "date" => $this->_date,
            "tente" => $this->_tente,
            "camion" => $this->_camion,
            "enfants" => $this->_enfants,
            "casques" => $this->_casques,
            "luge" => $this->_luge,
        ];
    }
}
