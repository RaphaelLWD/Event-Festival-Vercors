<?php
final class DataReservation
{
    private $_DataR;
    public function __construct()
    {
        $this->_DataR = __DIR__ . "../csv/reservation.csv";
    }
    //  Fonction qui enregristre le ticket dans le fichier csv //
    public function enregistrerTicketR(Reservation $reservation)
    {
        $fichier = fopen($this->_DataR, "ab");
        $retour = fputcsv($fichier, $reservation->getObjectToTicket());
        fclose($fichier);
        return $retour;
    }
    //  Recupère le ticket depuis le csv pour renvoyer les informations sur une page (type page de recupération) //
    public function getTicketR(): array
    {
        $fichier = fopen($this->_DataR, "r");
        $ticket = [];
        while (($ligne = fgetcsv($fichier, 500)) != false) {
            $ticket[] = new Reservation($ligne[1], $ligne[2], $ligne[3], $ligne[4], $ligne[5], $ligne[6], $ligne[7], $ligne[8], $ligne[9], $ligne[10], $ligne[11], $ligne[12], $ligne[13], $ligne[14], $ligne[0]);
        }
        fclose($fichier);
        return $ticket;
    }
}
