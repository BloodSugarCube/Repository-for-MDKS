<?php
function calculator(string $expressionStr): string
{
    $enumerationOperators = ['+', '-', '*', '/'];
    $enumerationNumbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    $checkedExpStr = '';
    $previousElementArr = '-';
    $counterTransitArr = 1;
    $lastSignExp = '';
    $checkError = false;

    if (strpos($expressionStr, '/0') !== false) {
        $arrayReplace = array("/0" => "");
        $expressionStr = strtr($expressionStr, $arrayReplace);
    }

    $expressionArray = str_split($expressionStr);

    foreach ($expressionArray as $element) {
        if (in_array($element, $enumerationOperators) || in_array($element, $enumerationNumbers)) {
            if (in_array($element, $enumerationOperators) && in_array($previousElementArr, $enumerationOperators)) {
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
            return 'Incorrect input';
        }
        $checkError = false;
        $counterTransitArr += 1;
    }
    return eval('return ' . $checkedExpStr . ';');
}

echo calculator('/0/---1+2/0++3*0/0-0/2--4-/2-----/0');
