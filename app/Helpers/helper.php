<?php

use App\Models\Categories;

function getCategories()
{
    return Categories::orderBy('name', 'asc')->get();
}

?>