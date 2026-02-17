<?php

namespace App\Services;

use App\Repositories\Eloquent\RestaurantRepository;

class RestaurantService
{
    public function __construct(
        private RestaurantRepository $restaurantRepository
    )
    {}

    public function findByUser(int $user_id)
    {
        return $this->restaurantRepository->findByUser($user_id);
    }   
}