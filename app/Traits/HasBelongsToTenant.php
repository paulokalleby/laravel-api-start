<?php

namespace App\Traits;

use App\Models\Tenant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

trait HasBelongsToTenant
{

    protected static function bootHasBelongsToTenant()
    {
        static::creating(function (Model $model) {

            if ( Auth::check() && Auth::user()->tenant_id ) {

                $model->tenant_id = Auth::user()->tenant_id;
            }
        });

        static::addGlobalScope('tenant_id', function (Builder $builder) {

            if ( Auth::check() && Auth::user()->tenant_id ) {

                $builder->where('tenant_id', Auth::user()->tenant_id);
            }
        });
    }

    public function tenant()
    {
        // return $this->belongsTo(Tenant::class);
    }
}
