<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $fillable = ['first_name', 'last_name', 'birthday', 'gender'];

    public $timestamps = false;

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn($value, array $attributes) => $attributes['first_name'] . ' ' . $attributes['last_name'],
        );
    }

    protected function getAge(): Attribute
    {
        return Attribute::make(
            get: function ($value, array $attributes) {
                $date = new \DateTime($attributes['birthday']);
                $now = new \DateTime();
                $interval = $now->diff($date);
                return $interval->y;
            },
        );
    }

    protected function getGender(): Attribute
    {
        return Attribute::make(
            get: fn($value, array $attributes) => $attributes['gender'] === 1 ? 'Male' : 'Female'
        );
    }
}
