<?php


// Функция getFullnameFromParts принимает как аргумент три строки — фамилию, имя и отчество. 
// Возвращает как результат их же, но склеенные через пробел.

function getFullnameFromParts($surname, $name, $patronomyc) {
      return $surname .' '. $name .' '. $patronomyc;
}

print_r(getFullnameFromParts('Шварцнегер', 'Арнольд', 'Густавович'));

// Функция getPartsFromFullname принимает как аргумент одну строку — склеенное ФИО. 
// Возвращает как результат массив из трёх элементов с ключами ‘name’, ‘surname’ и ‘patronomyc’.

function getPartsFromFullname($stringFullname) {
    $arrFullname = explode(' ', $stringFullname);
    $arrParts = array('surname' => $arrFullname[0],
                    'name' => $arrFullname[1],
                    'patronomyc' => $arrFullname[2]);
    return $arrParts;
    }
print_r(getPartsFromFullname('Шварцнегер Арнольд Густавович'));

// Функция getShortName принимает как аргумент строку, содержащую ФИО и возвращающую строку, 
// где сокращается фамилия и отбрасывается отчество.

function getShortName($stringFullname1) {
    $arrFullname1 = getPartsFromFullname($stringFullname1);
    $arrShortNname = $arrFullname1['name'] . ' ' . mb_substr($arrFullname1['surname'], 0, 1) . '.';
return $arrShortNname;
}

print_r(getShortName('Шварцнегер Арнольд Густавович'));

// Функция определения пола по ФИО  getGenderFromName, принимающая как аргумент строку, содержащую ФИО 

function getGenderFromName($stringFullname2) {
    $arrFullname2 = getPartsFromFullname($stringFullname2);
    $gender = 0;
    if (mb_substr($arrFullname2['patronomyc'], -3, 3) == 'вна')
        {$gender -= 1;}
    if (mb_substr($arrFullname2['name'], -1, 1) == 'а')
        {$gender -= 1;}
    if (mb_substr($arrFullname2['surname'], -2, 2) == 'ва')
        {$gender -= 1;}
    if (mb_substr($arrFullname2['patronomyc'], -3, 3) == 'вич')
        {$gender += 1;}
    if (mb_substr($arrFullname2['name'], -1, 1) == 'й' || mb_substr($arrFullname2['name'], -1, 1) == 'н')
        {$gender += 1;}
    if (mb_substr($arrFullname2['surname'], -1, 1) == 'в')
        {$gender += 1;}    

        echo $gender;
        
    return $gender <=> 0;

}

//print_r(getGenderFromName('Шварцнегер Арнольд Густавович'));
print_r(getGenderFromName('Быстрая Юлия Сергеевна'));

?>

