<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 26.01.19.
 * Time: 13:22
 */

require "controls.php";

class Employee
{
    protected $id;
    protected $ime;
    protected $prezime;
    protected $datum;
    protected $spol;
    protected $primanja;


    function __construct($id,$ime,$prezime, $datum, $spol, $primanja)
    {

        $this->id=$id;
        $this->ime=$ime;
        $this->prezime=$prezime;
        $this->datum=$datum;
        $this->spol=$spol;
        $this->primanja=$primanja;
    }


    //gettere i settere koristim kada var u klasi nisu public! sad ovo ima smisla
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
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getIme()
    {
        return $this->ime;
    }

    /**
     * @param mixed $ime
     */
    public function setIme($ime)
    {
        $this->ime = $ime;
    }

    /**
     * @return mixed
     */
    public function getPrezime()
    {
        return $this->prezime;
    }

    /**
     * @param mixed $prezime
     */
    public function setPrezime($prezime)
    {
        $this->prezime = $prezime;
    }

    /**
     * @return mixed
     */
    public function getDatum()
    {
        return $this->datum;
    }

    /**
     * @param mixed $datum
     */
    public function setDatum($datum)
    {
        $this->datum = $datum;
    }

    /**
     * @return mixed
     */
    public function getSpol()
    {
        return $this->spol;
    }

    /**
     * @param mixed $spol
     */
    public function setSpol($spol)
    {
        $this->spol = $spol;
    }

    /**
     * @return mixed
     */
    public function getPrimanja()
    {
        return $this->primanja;
    }

    /**
     * @param mixed $primanja
     */
    public function setPrimanja($primanja)
    {
        $this->primanja = $primanja;
    }


}

$workers = [];



while( true ) {

		// Print the menu on console
		printMenu();

		// Read user choice
		$choice = trim( fgets(STDIN) );

		// Exit application
		if( $choice == 6 ) {

			break;
		}


	//choice
    switch ( $choice ) {

        case 1:
            {
                readEmployee($workers);
                break;
            }
        case 2:
            {
                $workers[] = insertEmployee($workers);
    //pitaj da li hoces jos jednoga unijeti ili zelis izaci na izbornik
                break;
            }
        case 3:
            {
                echo"Unesi ID korisnika za urediti podatke: ";
                $employeeId = readline();
                $workers = editEmployee($workers, $employeeId);
                break;
            }
        case 4:
            {
                echo"Unesi ID korisnika za brisanje: ";
                $employeeId = readline();
                deleteEmployee($workers, $employeeId);
                break;
            }
        case 5:
            {
                stats();
                break;
            }
    }

}

	function printMenu()
    {
		echo "************ Zaposlenik ******************\n";
		echo "1 - Pregled Zaposlenika\n";
		echo "2 - Unos novog Zaposlenika\n";
		echo "3 - Promjena podataka postojećem zaposleniku\n";
		echo "4 - Brisanje Zaposlenika\n";
		echo "5 - Statistika\n";
		echo "6 - Izlaz\n";
		echo "************ Zaposlenik ******************\n";
		echo "Odaberi 1 do 6 ::";
	}


/**
 * Pregled Zaposelnika
 * @param $array Employee[]
 */

	function readEmployee($array)
    {
        echo "\n";
        for ($i = 0; $i < count($array); $i++) {
            echo "========== Zaposlenici ==========\n";
            echo "Zaposlenik: " . $array[$i]->getId() . " \n";
            echo "ID: " . $array[$i]->getId() . " \n";
            echo "IME: " . $array[$i]->getIme() . " \n";
            echo "PREZIME: " . $array[$i]->getPrezime() . " \n";
            echo "DATUM ROĐENJA: " . $array[$i]->getDatum() . " \n";
            echo "SPOL: " . $array[$i]->getSpol() . " \n";
            echo "MJESEČNA PRIMANJA: " . $array[$i]->getPrimanja() . " \n";
            echo "========== Zaposlenici ==========\n";
        }
        echo "\n";
    }

/**
 * Unos novog Zaposlenika
 *
 */
    function insertEmployee($array = NULL)
    {
        echo "ID: ";
        $id = checkId(readline(), $array);
        echo "Ime: ";
        $ime = readline();
        echo "Prezime: ";
        $prezime = readline();
        echo "Datum rođenja (dd.mm.YYYY.) :";
        $datum = validateDate(readline());
        echo "Spol (M/Z): ";
        $spol = checkSpol(readline());
        echo "Mjesečna primanja: ";
        $primanja = checkPrimanja(readline());
        return new Employee($id, $ime, $prezime, $datum, $spol, $primanja);

    }

/**
 * //Promjena podataka postojećem zaposleniku
 * @param $array Employee[]
 * @param  $employeeId
 * @return mixed
 */
    function editEmployee($array, $employeeId)
    {
        for ($i=0; $i < count($array); $i++) {
            if ($array[$i]->getId() === $employeeId) {

                echo "Trenutni ID: " . $array[$i]->getId() . " \n";
                echo "Novi ID: ";
                $array[$i]->setId(checkId(readline(), $array));

                echo "Trenutno IME: " . $array[$i]->getIme() . " \n";
                echo "Novo IME: ";
                $array[$i]->setIme(readline());

                echo "Trenutno PREZIME: " . $array[$i]->getPrezime() . " \n";
                echo "Novo PREZIME: ";
                $array[$i]->setPrezime(readline());

                echo "Trenutni DATUM: " . $array[$i]->getDatum() . " \n";
                echo "Novi DATUM: ";
                $array[$i]->setDatum(readline());

                echo "Trenutni SPOL: " . $array[$i]->getSpol() . " \n";
                echo "Novi SPOL: ";
                $array[$i]->setSpol(readline());

                echo "Trenutna PRIMANJA: " . $array[$i]->getPrimanja() . " \n";
                echo "Nova PRIMANJA: ";
                $array[$i]->setPrimanja(readline());
            }
        }
        return $array;
    }

/**
 * Brisanje Zaposlenika
 * @param $array Employee[]
 * @param $employeeId
 * @return mixed
 */
    function deleteEmployee($array, $employeeId)
    {
        for ($i = 0; $i <= count($array); $i++) {

        if (isset($array[$i]) && $array[$i]->getId() === $employeeId) {
            $array[$i] = null;
            unset($array[$i]);
        }
    }
        echo "Zaposlenik uspješnoo obrisan \n";
    $array = array_values($array);
    return $array;
    }

/**
 * Statistika
 *
 */
    function stats()
    {

    }

