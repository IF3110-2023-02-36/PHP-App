<?php

function pagination_template($controllerName, $data, $currentPage, $dataLimit, $function = null) {
    $dataCount = count($data);
    $pageCount = ceil($dataCount / $dataLimit);

    function makeButton($controllerName, $page, $text, $disabled, $function) {
        $disable = $disabled ? 'disabled' : '';
        $onclickFunction = "\"window.location.href = '/$controllerName/$page'\"";
        if($function !== null) {
            $onclickFunction = "'$function($page)'";
        }
        return 
            "
            <button type='button' onclick=$onclickFunction $disable>$text</button>
            ";
    }
    
    $prev = $currentPage-1;
    $next = $currentPage+1;

    $paginationHTML = "";
    $paginationHTML .= makeButton($controllerName, 1, "first", false, $function);
    $paginationHTML .= makeButton($controllerName, $prev, "$prev", $prev === 0, $function);
    $paginationHTML .= makeButton($controllerName, $currentPage, "$currentPage", true, $function);
    $paginationHTML .= makeButton($controllerName, $next, "$next", $next == ($pageCount + 1), $function);
    $paginationHTML .= makeButton($controllerName, $pageCount, "last", false, $function);
    return $paginationHTML;
}