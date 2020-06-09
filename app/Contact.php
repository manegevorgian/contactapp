<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\ContactScope;

class Contact extends Model
{

    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'address', 'company_id'];

    public function company()
    {
        return $this -> belongsTo(Company::class);
    }

    public static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ContactScope);
    }

}
