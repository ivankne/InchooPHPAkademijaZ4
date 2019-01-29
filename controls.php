<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 29.01.19.
 * Time: 10:36
 */

/**
 * @param $var
 * @param $array Employee[]
 * @return mixed
 */
function checkId($var, $array)
{
    if ($var === "") {
        echo "ID mora biti unesen!.\nUnesite ID:\n";
        return checkId(readline(), $array);
    }
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i]->getId() === $var) {
            echo "Zaposlenik već postoji.\nUnesite ID:\n";
            return checkId(readline(), $array);
        }
    }
    return $var;
}

//https://www.sitepoint.com/community/t/how-to-check-date-format-on-input/7317/4
//radi samo mm-dd-yyyy format
function validateDate($var)
{
    $var = str_replace(["-", "/", "'\'"], ".", $var);
    list($dd, $mm, $yyyy) = explode('.', $var);

    if(checkdate($dd, $mm, $yyyy)){
        //is valid
        return $var;
    }else{
        echo "Neispravan unod datuma! (dd.mm.YYYY.)\n";
        return validateDate(readline());
    }
}

/**
 * @param $var
 * @return string
 */
function checkSpol($var)
{
    $var = strtoupper($var);
    if ($var === "" || $var !== "M" && $var !== "Z"){
        echo "Neispravan unos! (M/Z)\n";
        return checkSpol(readline());
    }else{
        return $var;
    }
}

/**
 * @param $var
 * @return string
 */
function checkPrimanja($var)
{
    $var = floatval(str_replace("," , ".", $var));
    if ($var === "" || !is_float($var) || $var <= 0){
        echo "Broj mora biti decimalni i veći od 0 !\n";
        return checkPrimanja(readline());
    }else{
        return number_format($var, 2, '.', '');
    }

}