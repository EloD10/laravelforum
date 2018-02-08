<?php
/**
 * Created by PhpStorm.
 * User: Eloha
 * Date: 08/02/2018
 * Time: 18:45
 */

namespace App\Filters;


use Illuminate\Http\Request;

abstract class Filters
{

    protected $request, $builder;
    protected $filters = [];

    /**
     * Filters constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param $builder
     * @return mixed
     */
    public function apply($builder)
    {
        $this->builder = $builder;

        foreach ($this->getFilters() as $filter => $value) {
            if (method_exists($this, $filter)) {
                $this->$filter($value);
            }
        }

        return $this->builder;
    }

    public function getFilters()
    {
        return collect($this->request->only($this->filters));

    }
}