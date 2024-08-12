<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BMI extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'height',
        'weight',
        'age',
        'name',
        'bmi',
    ];

    protected $table = 'BMIs';

    protected $appends = ['class'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function class(): Attribute
    {
        return new Attribute(
            get: fn () => $this->getClass(),
        );
    }

    public function getClass(): string
    {
        $bmi = $this->attributes['bmi'];
        if ($bmi < 18.5) {
            return 'Underweight';
        } elseif ($bmi < 25) {
            return 'Normal';
        } elseif ($bmi < 30) {
            return 'Overweight';
        } else {
            return 'Obese';
        }
    }
}
