<?php


namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    /**
     * model property on class instances
     *
     */
    protected Model $model;

    /**
     * Constructor to bind model to repo
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get all instances of model
     * @return Collection|Model[]
     */
    public function index(): array|Collection
    {
        return $this->model->get();
    }

    /**
     * create a new record in the database
     * @param array $data
     * @return Model
     */
    public function store(array $data): Model
    {
        return $this->model::create($data);
    }

    /**
     * update record in the database
     * @param array $data
     * @param $id
     * @return Collection|Model
     */
    public function update(array $data, $id): Model|Collection
    {
        $record = $this->model->findOrFail($id);
        $record->update($data);
        return $record;
    }

    /**
     * Remove record from the database
     * @param $id
     * @return Collection|Model
     * @throws \Exception
     */
    public function destroy($id): Model|Collection
    {
        $record = $this->model->findOrFail($id);
        $record->delete();
        return $record;
    }

    /**
     * show the record with the given id
     * @param $id
     * @return Collection|Model
     */
    public function show($id): Model|Collection
    {
        return $this->model->findOrFail($id);
    }
}
