<?php

/**
 * Description of Util
 *
 * @author Leandro
 */
function FormataDataBanco($data) {
    $newData = "null";
    if (!empty($data)) {
        $arrayData = explode('/', $data);
        $newData = "'" . $arrayData[2] . '-' . $arrayData[1] . '-' . $arrayData[0] . "'";
    }
    return $newData;
}

function FormataBancoData($data) {
    if (!empty($data) && $data != null) {
        $arrayData = explode('-', $data);
        return $arrayData[2] . '/' . $arrayData[1] . '/' . $arrayData[0];
    } else {
        return '';
    }
}

function inverteData(&$data) {
    if (count(explode("/", $data)) > 1) {
        return implode("-", array_reverse(explode("/", $data)));
    } elseif (count(explode("-", $data)) > 1) {
        return implode("/", array_reverse(explode("-", $data)));
    }
}

function getDataExtenso($data) {
    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    return utf8_encode(ucfirst(strftime('%B %Y', strtotime(date_format($data, 'Y-m-d')))));
}

function getDiaSemana($data) {
    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
    date_default_timezone_set('America/Sao_Paulo');
    return utf8_encode(strftime("%A", strtotime($data->format('Y-m-d'))));
}

function converterNumeroMes($mes) {
    switch ($mes) {
        case 1:
            return 'Janeiro';
            break;
        case 2:
            return 'Fevereiro';
            break;
        case 3:
            return 'Março';
            break;
        case 4:
            return 'Abril';
            break;
        case 5:
            return 'Maio';
            break;
        case 6:
            return 'Junho';
            break;
        case 7:
            return 'Julho';
            break;
        case 8:
            return 'Agosto';
            break;
        case 9:
            return 'Setembro';
            break;
        case 10:
            return 'Outubro';
            break;
        case 11:
            return 'Novembro';
            break;
        case 12:
            return 'Dezembro';
            break;

        default:
            break;
    }
}

function converterArrayNumeroMes($array) {
    foreach ($array as $value) {
        $newArray[$value] = converterNumeroMes($value);
    }
    return $newArray;
}

function converterArrayNumeroMesAno($array) {
    foreach ($array as $value) {
        $data = explode('/', $value);
        $newArray[$value] = converterNumeroMes($value) . '/' . $data[1];
    }
    return $newArray;
}

function converterArrayIndice($data, $id, $descricao) {
    foreach ($data as $value) {
        $newArray[$value[$id]] = $value[$descricao];
    }
    return $newArray;
}

function converteMoedaBanco(&$valor) {
    $valor = str_replace(',', '.', str_replace('.', '', $valor));
}

function chk_array($array, $key) {
    // Verifica se a chave existe no array
    if (isset($array[$key]) && !empty($array[$key])) {
        // Retorna o valor da chave
        return $array[$key];
    }

    // Retorna nulo por padrão
    return null;
}

function redirect($public = true, $action = null, $controller = null) {

    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    
    $url = $public ? 'admin/' : '';
    $url .= $controller ? "$controller/" : '';
    $url .= $action;
    
    header("Location: http://$host$uri/$url");
}
