<?php

if (!function_exists('getMenus')){
    function getMenus()
    {
        return \App\Models\Menu::with('subMenus')->whereNull('menu_id')->get();
    }
}
