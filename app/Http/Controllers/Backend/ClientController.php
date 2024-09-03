<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        // Eager load subcategories with categories
        $categories = Category::with('subcategories')->get();

        return view('frontend.client.client_list', compact('categories'));
    }
}
