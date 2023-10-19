<?php

function arrayPagination($data, $currentPage, $dataLimit) {
    $pagedData = array();
    $dataCount = count($data);
    $newDataCount = min($dataLimit, $dataCount - ($currentPage - 1) * $dataLimit);
    for($i = 0; $i < $newDataCount; $i++) {
        $idx = $i + ($currentPage - 1) * $dataLimit;
        $pagedData[$idx] = $data[$idx];
    }
    return $pagedData;
}