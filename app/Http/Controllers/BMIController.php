<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetBMIRequest;
use App\Http\Requests\ReduceBMIRequest;
use App\Models\BMI;
use Illuminate\Support\Facades\Auth;

class BMIController extends Controller
{
    public function getBMI(GetBMIRequest $request)
    {
        $validated = $request->validated();
        $height = $validated['height'] / 100;
        $bmi = $height * $height;
        $bmi = $validated['weight'] / $bmi;
        $validated['bmi'] = round($bmi, 1);
        $validated['user_id'] = Auth::id();
        $bmi = BMI::create($validated);

        return $bmi;
    }

    public function reduceBMI(ReduceBMIRequest $request)
    {
        $validated = $request->validated();
        $height = $validated['height'] / 100;
        $height = $height * $height;
        $bmi = $validated['weight'] / $height;
        if ($bmi < 18.5) {
            return '0 KG';
        } elseif ($bmi < 25) {
            $weight = 18.5 * $height;

            return floor($validated['weight'] - $weight) + 1 .' KG';
        } elseif ($bmi < 30) {
            $weight = 25 * $height;

            return floor($validated['weight'] - $weight) + 1 .' KG';
        } else {
            $weight = 30 * $height;

            return floor($validated['weight'] - $weight) + 1 .' KG';
        }
    }
}
