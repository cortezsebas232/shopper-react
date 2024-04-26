<?php

namespace Mckenziearts\Shopper\Plugins\Promo\Repositories;

use Mckenziearts\Shopper\Plugins\Promo\Models\Discount;

class DiscountRepository
{
    /**
     * @var \Illuminate\Database\Eloquent\Builder
     */
    protected $model;

    public function __construct()
    {
        $this->model = Discount::query();
    }

    /**
     * Return New Model instance
     *
     * @return \Illuminate\Database\Eloquent\Model|static
     */
    public function getModel()
    {
        return $this->model->newModelInstance();
    }

    /**
     * Save a new model and return the instance. Allow mass-assignment.
     *
     * @param array $data
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function save(array $data)
    {
        return $this->model->create([
            'active'        => $data['active'],
            'name'          => $data['name'],
            'value'         => $data['value'],
            'type'          => $data['type'],
            'code'          => $data['code'],
            'date_begin'    => $data['date_begin'],
            'date_end'      => $data['date_end'],
            'preview_text'  => $data['preview_text'],
            'description'   => $data['description']
        ]);
    }

    /**
     * Update a model and return the instance. Allow mass-assignment.
     *
     * @param array $data
     * @param $id
     * @return bool|int
     */
    public function update(array $data, $id)
    {
        return $this->model->findOrFail($id)->update([
            'active'        => $data['active'],
            'name'          => $data['name'],
            'value'         => $data['value'],
            'type'          => $data['type'],
            'code'          => $data['code'],
            'date_begin'    => $data['date_begin'],
            'date_end'      => $data['date_end'],
            'preview_text'  => $data['preview_text'],
            'description'   => $data['description']
        ]);
    }

    /**
     * Delete a record
     *
     * @param $id
     * @return bool|mixed|null
     */
    public function delete($id)
    {
        return $this->model->findOrFail($id)->delete();
    }

    /**
     * Return single record
     *
     * @param int $id
     * @param array $relations
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|static|static[]
     */
    public function find($id, array $relations = [])
    {
        if (count($relations) < 1) {
            return $this->model->findOrFail($id);
        }

        return $this->model->with($relations)->findOrFail($id);
    }

    /**
     * Return paginate record list
     *
     * @param int $count
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginateList(int $count = 10)
    {
        return $this->model->orderBy('created_at', 'desc')->paginate($count);
    }

    /**
     * Get all records
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->getByActive(1)->get();
    }

    /**
     * @param $state
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getByActive($state)
    {
        return $this->model->where('active', $state);
    }
}
