<?php
function calculator(string $expressionStr): float
{
    $enumerationOperators = ['+', '-', '*', '/'];
    $enumerationNumbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    $checkedExpStr = '';
    $previousElementArr = '-';
    $counterTransitArr = 1;
    $lastSignExp = '';
    $checkError = false;

    if (strpos($expressionStr, '/0') !== false) {
        echo ("Введено деление на 0, части с делением на 0 вырезаются.\n");
        $arrayReplace = array("/0" => "");
        $expressionStr = strtr($expressionStr, $arrayReplace);
    }

    echo ("$expressionStr\n");
    $expressionArray = str_split($expressionStr);

    foreach ($expressionArray as $element) {
        if (in_array($element, $enumerationOperators) || in_array($element, $enumerationNumbers)) {
            if (in_array($element, $enumerationOperators) && in_array($previousElementArr, $enumerationOperators)) {
                echo ("Символ №$counterTransitArr - некорректен при учёте прошлых символов - вырезается.\n");
                $checkError = true;
            }
            if (in_array($element, $enumerationOperators) && !$checkError) {
                $lastSignExp = $element;
                $previousElementArr = $element;
            } else {
                if (!$checkError) {
                    $checkedExpStr .= $lastSignExp;
                    $checkedExpStr .= $element;
                    $lastSignExp = '';
                    $previousElementArr = $element;
                }
            }
        } else {
            exit('Incorrect input');
        }
        $checkError = false;
        $counterTransitArr += 1;
    }
    if ($lastSignExp != '') {
        echo ("В конце выражения остался знак выражения - вырезается.\n");
    }
    echo ("$checkedExpStr\n");
    return eval('return ' . $checkedExpStr . ';');
}

echo calculator('/0/---1+2/0++3*0/0-0/2---/2-----/0');
