<?php

function pagination_template($controllerName, $data, $currentPage, $dataLimit) {
    $dataCount = count($data);
    $pageCount = ceil($dataCount / $dataLimit);

    function makeButton($controllerName, $page, $text, $disabled = false) {
        $disable = $disabled ? 'disabled' : '';
        return 
            "
            <button type='button' onclick=\"window.location.href = '/$controllerName/$page'\" $disable>$text</button>
            ";
    }
    
    $prev = $currentPage-1;
    $next = $currentPage+1;

    $paginationHTML = "";
    $paginationHTML .= makeButton($controllerName, 1, "first");
    $paginationHTML .= makeButton($controllerName, $prev, "$prev", $prev === 0);
    $paginationHTML .= makeButton($controllerName, $currentPage, "$currentPage", true);
    $paginationHTML .= makeButton($controllerName, $next, "$next", $next == ($pageCount + 1));
    $paginationHTML .= makeButton($controllerName, $pageCount, "last");
    return $paginationHTML;
}