<?php
// Получаем значение параметра "number" из URL и преобразуем его в целое число
$number = isset($_GET['number']) ? intval($_GET['number']) : 0;

if (isset($number)) {
    echo "Число -> " . htmlspecialchars($number) . "!<br>";

    // Проверяем, что число находится в диапазоне от 2 до 1000
    if ($number >= 2 && $number <= 1000) {
        // Создаем пустой массив для хранения простых чисел
        $primeNumbers = array();

        // Проверяем каждое число от 2 до $number на простоту
        for ($i = 2; $i <= $number; $i++) {
            $isPrime = true;

            // Проверяем, делится ли число нацело на какое-либо число от 2 до sqrt($i)
            for ($j = 2; $j <= sqrt($i); $j++) {
                if ($i % $j === 0) {
                    $isPrime = false;
                    break;
                }
            }

            // Если число простое, добавляем его в массив $primeNumbers
            if ($isPrime) {
                $primeNumbers[] = $i;
            }
        }

        // Выводим массив простых чисел на дисплей
        echo "Простые числа, не превышающие " . $number . ":<br>";
        echo implode(", ", $primeNumbers);
    } else {
        // Если число не находится в допустимом диапазоне, выводим сообщение об ошибке
        echo "Пожалуйста, укажите число от 2 до 1000 в URL-параметре 'number'.";
    }
} else {
    echo "Ошибка";
}
?>