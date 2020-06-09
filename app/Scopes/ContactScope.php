<?php


namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ContactScope implements Scope
{

    public function apply(Builder $builder, Model $model)
    {
        if ($companyId = request('company_id'))
        {
            $builder -> where('company_id', $companyId);
        }

        if ($search = request('search'))
        {
            $builder -> where('first_name',  'LIKE', "{$search}%")
                     -> orWhere('last_name', 'LIKE', "{$search}%");
        }
        return $builder -> orderBy('id', 'desc');
    }

}
