<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Vite;

function tenant($param)
{
    return session('tenant')[$param] ?? '';

}

function orImage($image, $option)
{

    if ($image != null && Storage::disk('public')->exists($image)) {

        return asset('storage/'.$image);

    }else {

        return Vite::image($option);

    }

}

function price($value)
{
    return number_format($value, 2, ',','.');
}

function dateToBr($date)
{
    return Carbon::make($date)->format('d/m/Y');
}

function dateTimeToBr($date)
{
    return Carbon::make($date)->format('d/m/Y H:i');
}

function code($param)
{
    return str_pad($param, 8, 0, STR_PAD_LEFT);
}

function total($items)
{
    $total = 0;

    foreach ($items as $item) {
        $total += ($item->pivot->price * $item->pivot->amount);
    }

    return $total;
}


function totalFloat($items)
{
    $total = 0;

    foreach ($items as $item) {
        $total += ($item->price * $item->amount);
    }

    return $total;
}

function totalItems($items)
{
    $total = 0;

    foreach ($items as $item) {
        $total += ($item->price * $item->amount);
    }

    return $total;
}

/*
function isPermission($uuid, $slug) {

    $user = User::with('permissions')->whereId($uuid)->first();

    return $user->permissions()->whereSlug($slug)->first() ? true : false;

}*/