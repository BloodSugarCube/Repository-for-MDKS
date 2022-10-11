<?php
function calculator(string $expressionStr): float
{
    $enumerationOperators = ['+', '-', '*', '/'];
    $enumerationNumbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    $checkedExpStr = '';
    $previousElementArr = '';
    $counterTransitArr = 1;
    $checkError = false;

    if (strpos($expressionStr, '/0')) {
        echo("Введено деление на 0, части с делением на 0 вырезаются.\n");
        $expressionStr = trim($expressionStr, '/0');
    }

    $expressionArray = str_split($expressionStr);
    $lengthExpArr = count($expressionArray);

    foreach ($expressionArray as $element) {
        if (!(!in_array($element, $enumerationOperators) && !in_array($element, $enumerationNumbers))) {
            if (($counterTransitArr == 1 && ($element == '/' || $element == '*'))) {
                echo("Первый символ выражения - знак деления или умножения - вырезается из выражения.\n");
                $checkError = true;
                $lengthExpArr -= 1;
            }
            if ((in_array($element, $enumerationOperators) == in_array($previousElementArr, $enumerationOperators))) {
                echo("Символ №$counterTransitArr является знаком выражения после знака выражения - вырезается.\n");
                $checkError = true;
                $lengthExpArr -= 1;
            }
            if ($counterTransitArr >= $lengthExpArr && in_array($element, $enumerationOperators)) {
                echo("Один из последних символов выражения - знак операции - вырезается из выражения.\n");
                $checkError = true;
            }
            if (!$checkError) {
                $checkedExpStr .= $element;
                $previousElementArr = $element;
            }
        } else {
            exit('Incorrect input');
        }
        $checkError = false;
        $counterTransitArr += 1;
    }
    return eval('return ' . $checkedExpStr . ';');
}

echo calculator('---1+2++3*1-3/2---/2-----');