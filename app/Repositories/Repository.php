<?php


namespace App\Repositories;

use Config;
use Illuminate\Support\Facades\Storage;

abstract class Repository
{
    protected $model = false;

    /**
     * @param string $select
     * @param bool $orderBy
     * @param bool $pagination
     * @param bool $where
     * @param bool $take
     * @return mixed
     */
    public function get($select = '*', $orderBy = false, $pagination = false, $where = false, $take = false) {
        $builder = $this->model->select($select);

        if($where){
            $builder->where($where[0], $where[1], $where[2] ?? null);
        }
        if ($take) {
            $builder->take($take);
        }

        if (isset($orderBy) && is_array($orderBy) ) {
            $builder = $builder->orderBy($orderBy['column'], $orderBy['direction']);
        }
        if ($pagination) {
            return $builder->paginate(Config::get('settings.admin-articles-paginate'));
        }

        return $builder->get();
    }

    /**
     * @param $img
     * @param bool $old_image
     * @return bool|string
     */
    public function uploadImage($img, $old_image = false)
    {
        $this->deleteImage($old_image);
        $filename = str_random(10) . '.' . $img->extension();

        if ($img->storeAs('uploads', $filename)) {
            return $filename;
        }
        return false;
    }

    /**
     * @param $img
     */
    public function deleteImage($img)
    {
        if ($img != null) {
            Storage::delete('uploads/' . $img);
        }
    }

    /**
     * @param $request
     * @return mixed
     */
    public function getAjax($request){
        $certificates = $this->model
            ->where('title', 'like', '%' . $request->session()->get('search') . '%')
            ->orderBy($request->session()->get('field'), $request->session()->get('sort'))->paginate(10);
        return $certificates;
    }

    /**
     * @param $code
     * @return bool
     */
    public function checkCode($code){
        $certificate = $this->model
            ->where('code', $code)
            /*->whereNotIn('status_id', [1, 4, 5])*/
            ->first();
        return $certificate ?? false;
    }
}
