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

    public function __construct(string $nombreReservation, bool $formule, bool $date, bool $tarifReduit, bool $tente, bool $camion, bool $enfants, string $casques, string $luge, string $nom, string $prenom, string $mail, string $tel, int|string $adresse, string $id = "à créer")
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

    public function getTarifReduit(): bool
    {
        return $this->_tarifReduit;
    }
    public function setTarifReduit(bool $tarifReduit): void
    {
        $this->_tarifReduit = $tarifReduit;
    }

    public function getFormule(): bool
    {
        return $this->_formule;
    }
    public function setFormule(bool $formule): void
    {
        $this->_formule = $formule;
    }

    public function getDate(): bool
    {
        return $this->_date;
    }
    public function setDate(bool $date): void
    {
        $this->_date = $date;
    }

    public function getTente(): bool
    {
        return $this->_tente;
    }
    public function setTente(bool $tente): void
    {
        $this->_tente = $tente;
    }

    public function getCamion(): bool
    {
        return $this->_camion;
    }
    public function setCamion(bool $camion): void
    {
        $this->_camion = $camion;
    }

    public function getEnfants(): bool
    {
        return $this->_enfants;
    }
    public function setEnfants(bool $enfants): void
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
            "id" =>  $this->_id,
            "nom" => "Nom : " . $this->_nom,
            "prenom" => "Prénom : " . $this->_prenom,
            "mail" => "Mail : " . $this->_mail,
            "tel" => "Téléphone : " . $this->_tel,
            "adresse" => "Adresse : " . $this->_adresse,
            "nombreReservation" => "Nombre de places : " . $this->_nombreReservation,
            "tarifReduit" => "Tarif réduit : " . $this->_tarifReduit,
            "formule" => "Choix de la formule : " . $this->_formule,
            "date" => "Date : " . $this->_date,
            "tente" => "Tente : " . $this->_tente,
            "camion" => "Camion : " . $this->_camion,
            "enfants" => "Présence d'enfants : " . $this->_enfants,
            "casques" => "Nombre de casques : " . $this->_casques,
            "luge" => "Nombre de luges : " . $this->_luge,
        ];
    }
    public function creerNouvelleId(): int
    {
        $datareservation = new Datareservation();
        $reservations = $datareservation->getTicketR();

        $IDs = [];

        foreach ($reservations as $reservation) {
            $IDs[] = $reservation->getId();
        }

        $i = 1;
        $unique = false;
        while ($unique === false) {
            if (in_array($i, $IDs)) {
                $i++;
            } else {
                $unique = true;
            }
        }

        return $i;
    }
}
