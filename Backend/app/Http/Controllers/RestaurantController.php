<?php

namespace App\Http\Controllers;

use App\Services\RestaurantService;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function __construct(
        private RestaurantService $restaurantService,
    )
    {}

    public function index(int $restaurant_id)
    {

    }

    public function show()
    {

    }

    public function store()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
