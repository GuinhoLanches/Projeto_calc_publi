<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['number'])) {
        appendToDisplay($_POST['number']);
    } elseif (isset($_POST['operator'])) {
        appendToDisplay($_POST['operator']);
    } elseif (isset($_POST['decimal'])) {
        appendToDisplay($_POST['decimal']);
    } elseif (isset($_POST['clear'])) {
        clearDisplay();
    } elseif (isset($_POST['calculate'])) {
        calculate();
    }
}

function appendToDisplay($value) {
    if (!isset($_SESSION)) {
        session_start();
    }
    $_SESSION['display'] .= $value;
}

function clearDisplay() {
    if (!isset($_SESSION)) {
        session_start();
    }
    $_SESSION['display'] = '';
}

function calculate() {
    if (!isset($_SESSION)) {
        session_start();
    }
    $expression = $_SESSION['display'];
    $_SESSION['display'] = eval("return $expression;");
}
?>
