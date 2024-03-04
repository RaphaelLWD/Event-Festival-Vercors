<?php
class Reservation
{
    private $_id;
    private $_nombreReservation;
    private $_formule;
    private $_formulePrix;
    private $_date;
    private $_tarifReduit;
    private $_tente;
    private $_tentePrix;
    private $_camion;
    private $_camionPrix;
    private $_enfants;
    private $_casques;
    private $_luge;
    private $_nom;
    private $_prenom;
    private $_mail;
    private $_tel;
    private $_adresse;
    private $_total;

    public function __construct(string $nombreReservation, bool $formule, bool $date, bool $tarifReduit, bool $tente, bool $camion, bool $enfants, string $casques, string $luge, string $nom, string $prenom, string $mail, string $tel, int|string $adresse, string $total = "à calculer", string $id = "à créer")
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
        $this->definirPrix();
        $this->setTotal($total);
        $this->definirAffichage();
    }

    // Set/Get total
    public function getTotal()
    {
        return $this->_total;
    }

    public function setTotal(int|string $total): void
    {
        if ($total == "à calculer") {
            $this->_total = $this->calculePrix();
        } else {
            $this->_total = $total;
        }
    }

    // Methode définition prix
    public function definirPrix()
    {
        if (isset($_POST['passSelection1'])) {
            $this->_formulePrix = 40;
        } elseif (isset($_POST['passSelection2'])) {
            $this->_formulePrix = 70;
        } elseif (isset($_POST['passSelection3'])) {
            $this->_formulePrix = 100;
        }

        if (isset($_POST['passjourReduit1'])) {
            $this->_formulePrix = 25;
        } elseif (isset($_POST['passjourReduit2'])) {
            $this->_formulePrix = 50;
        } elseif (isset($_POST['passjourReduit3'])) {
            $this->_formulePrix = 65;
        }

        if (isset($_POST["tenteNuit1"]) || isset($_POST["tenteNuit2"]) || isset($_POST["tenteNuit3"])) {
            $this->_tentePrix = 5;
        } elseif (isset($_POST["tente3Nuits"])) {
            $this->_tentePrix = 12;
        } else {
            $this->_tentePrix = 0;
        }

        if (isset($_POST["vanNuit1"]) || isset($_POST["vanNuit2"]) || isset($_POST["vanNuit3"])) {
            $this->_camionPrix = 5;
        } elseif (isset($_POST["van3Nuits"])) {
            $this->_camionPrix = 12;
        } else {
            $this->_camionPrix = 0;
        }
    }

    // Methode calcule du $total
    public function calculePrix()
    {
        $this->_total = $this->_nombreReservation * ($this->_formulePrix + $this->_camionPrix + $this->_tentePrix) + $this->_luge * 5;
        return $this->_total;
    }

    // Get/set prix
    public function getCamionPrix(): int
    {
        return $this->_camionPrix;
    }
    public function setCamionPrix(int $camionPrix): void
    {
        $this->_camionPrix = $camionPrix;
    }

    public function getTentePrix(): int
    {
        return $this->_tentePrix;
    }
    public function setTentePrix(int $tentePrix): void
    {
        $this->_tentePrix = $tentePrix;
    }

    public function getFormulePrix(): int
    {
        return $this->_formulePrix;
    }
    public function setFormulePrix(int $formulePrix): void
    {
        $this->_formulePrix = $formulePrix;
    }

    // Get/Set généraux
    public function getId()
    {
        return $this->_id;
    }
    public function setId(int|string $id): void
    {
        if (is_string($id) && $id == "à créer") {
            $this->_id = rand(1, 1000);
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

    // Methode affiché les information au lieu de 0 et 1
    public function definirAffichage()
    {
        $this->_nombreReservation = $_POST['nombrePlaces'];

        if (isset($_POST['tarifReduit'])) {
            $this->_tarifReduit = "Oui";
        } else {
            $this->_tarifReduit = "Non";
        }

        if (isset($_POST['passSelection1'])) {
            $this->_formule = "Pass 1 jour";
        } elseif (isset($_POST['passSelection2'])) {
            $this->_formule = "Pass 2 jours";
        } elseif (isset($_POST['passSelection3'])) {
            $this->_formule = "Pass 3 jours";
        }

        if (isset($_POST['passjourReduit1'])) {
            $this->_formule = "Pass 1 jour réduit";
        } elseif (isset($_POST['passjourReduit2'])) {
            $this->_formule = "Pass 2 jours réduit";
        } elseif (isset($_POST['passjourReduit3'])) {
            $this->_formule = "Pass 3 jours réduit";
        }

        if (isset($_POST["choixJour1"])) {
            $this->_date = "Pass pour le 01/07";
        } elseif (isset($_POST["choixJour2"])) {
            $this->_date = "Pass pour le 02/07";
        } elseif (isset($_POST["choixJour3"])) {
            $this->_date = "Pass pour le 03/07";
        } elseif (isset($_POST["passSelection3"]) || isset($_POST['passjourReduit3'])) {
            $this->_date = "Pass du 01/07 au 03/07";
        } elseif (isset($_POST["choixJour12"])) {
            $this->_date = "Pass du 01/07 au 02/07";
        } elseif (isset($_POST["choixJour23"])) {
            $this->_date = "Pass du 02/07 au 03/07";
        }

        if (isset($_POST["tenteNuit1"])) {
            $this->_camion = "Le 01/07";
        } elseif (isset($_POST["tenteNuit2"])) {
            $this->_camion = "Le 02/07";
        } elseif (isset($_POST["tenteNuit3"])) {
            $this->_camion = "Le 03/07";
        } elseif (isset($_POST["tente3Nuits"])) {
            $this->_camion = "Du 01/07 au 03/07";
        } else {
            $this->_camion = "Pas de reservation";
        }

        if (isset($_POST["vanNuit1"])) {
            $this->_tente = "Le 01/07";
        } elseif (isset($_POST["vanNuit2"])) {
            $this->_tente = "Le 02/07";
        } elseif (isset($_POST["vanNuit3"])) {
            $this->_tente = "Le 03/07";
        } elseif (isset($_POST["van3Nuits"])) {
            $this->_tente = "Du 01/07 au 03/07";
        } else {
            $this->_tente = "Pas de reservation";
        }

        if (isset($_POST['enfantsOui'])) {
            $this->_enfants = "Oui";
        } elseif (isset($_POST["enfants"])) {
            $this->_enfants = "Non";
        } else {
            $this->_enfants = "Non";
        }

        if (empty($_POST['nombreCasquesEnfants'])) {
            $this->_casques = 0;
        }
    }

    // Methode transformation infos en ticket
    public function getObjectToTicket()
    {
        return [
            "id" =>  $this->_id,
            "nom" =>   $this->_nom,
            "prenom" =>  $this->_prenom,
            "mail" =>  $this->_mail,
            "tel" =>  $this->_tel,
            "adresse" =>  $this->_adresse,
            "nombreReservation" =>  $this->_nombreReservation,
            "tarifReduit" =>  $this->_tarifReduit,
            "formule" =>  $this->_formule,
            "date" =>  $this->_date,
            "tente" =>  $this->_tente,
            "camion" =>  $this->_camion,
            "enfants" => $this->_enfants,
            "casques" =>  $this->_casques,
            "luge" =>  $this->_luge,
            "total" =>  $this->_total . "€",
        ];
    }

    // Methode créer id
    //     public function creerNouvelleId(): int
    //     {
    //         $datareservation = new Datareservation();
    //         $reservations = $datareservation->getTicketR();

    //         $IDs = [];

    //         foreach ($reservations as $reservation) {
    //             $IDs[] = $reservation->getId();
    //         }

    //         $i = 1;
    //         $unique = false;
    //         while ($unique === false) {
    //             if (in_array($i, $IDs)) {
    //                 $i++;
    //             } else {
    //                 $unique = true;
    //             }
    //         }

    //         return $i;
    //     }
}
