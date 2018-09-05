<?php

namespace App\Filters;

use App\User;
use Illuminate\Http\Request;

class ThreadFilters
{
    protected $filters = ['by', 'popular'];

    /**
     * Filter the query by a given username
     * @param $username
     * @return mixed
     */
    public function by($username)
    {
        $user = User::where('name', request('name'))->firstOrFail();

        return $user;
    }

    /**
     * Filter the query according to most popular threads
     * @return mixed
     */
    public function popular()
    {
        $this->builder->getQuery()->orders = [];
        return $this->builder->orderBy('replies_count', 'acs');
    }

    public static function apply(Request $request)
    {
        $user = (new User)->newQuery();

        // Search for a user based on their name.
        if ($request->has('name')) {
            $user->where('name', $request->input('name'));
        }
        return $user->get();
    }
}
