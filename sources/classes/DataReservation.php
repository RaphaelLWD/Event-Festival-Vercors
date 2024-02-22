<?php
final class DataReservation
{
    private $_DataR;
    public function __construct()
    {
        $this->_DataR = __DIR__ . "./csv/reservation.csv";
    }

    public function enregistrerTicketR(Reservation $reservation)
    {
        $fichier = fopen($this->_DataR, "ab");
        $retour = fputcsv($fichier, $reservation->getObjectToTicket());
        fclose($fichier);
        return $retour;
    }

    public function getTicketR(): array
    {
        $fichier = fopen($this->_DataR, "r");
        $ticket = [];
        while (($ligne = fgetcsv($fichier, 500)) != false) {
            $ticket[] = new Reservation($ligne[2], $ligne[3], $ligne[4], $ligne[5], $ligne[6], $ligne[7], $ligne[8], $ligne[9], $ligne[10], $ligne[17], $ligne[12], $ligne[13], $ligne[14], $ligne[15], $ligne[0]);
        }
        fclose($fichier);
        return $ticket;
    }
}
