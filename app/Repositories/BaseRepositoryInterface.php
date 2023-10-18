<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    /**
     * Returns a list of all items
     * @return mixed
     */
    public function index(): mixed;

    /**
     * Creates a new resource
     * @param array $data
     * @return mixed
     */
    public function store(array $data): mixed;

    /**
     * Returns a given model after id
     * @param $id
     * @return mixed
     */
    public function show($id): mixed;

    /**
     * Updates a given model after id
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id): mixed;
}
