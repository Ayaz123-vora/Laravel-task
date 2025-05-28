<?php

namespace App\Http\Controllers;

use App\Services\ItemService;

    public function index(ItemService $itemService)
   {
       $items = $itemService->getAllItems();

       // Debugging: Check if $items is null
       if (is_null($items)) {
           dd('Items is null');
       }

       return view('items.index', ['items' => $items]);
   }
   
