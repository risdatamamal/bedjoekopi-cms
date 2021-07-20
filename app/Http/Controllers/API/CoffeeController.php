<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Coffee;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;

class CoffeeController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 1000);
        $name = $request->input('name');
        $types = $request->input('types');
        $code = $request->input('code');

        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        $rate_from = $request->input('rate_from');
        $rate_to = $request->input('rate_to');

        if($id)
        {
            $coffee = Coffee::find($id);

            if($coffee) {
                return ResponseFormatter::success(
                    $coffee,
                    'Data menu berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data menu tidak ada',
                    404
                );
            }
        }

        $coffee = Coffee::query();

        if($name) {
            $coffee->where('name', 'like', '%' . $name . '%');
        }

        if($types) {
            $coffee->where('types', 'like', '%' . $types . '%');
        }

        if($code) {
            $coffee->where('code', 'like', '%' . $code . '%');
        }

        if($price_from) {
            $coffee->where('price', '>=', $price_from);
        }

        if($price_to) {
            $coffee->where('price', '<=', $price_to);
        }

        if($rate_from) {
            $coffee->where('rate', '>=', $rate_from);
        }

        if($rate_to) {
            $coffee->where('rate', '<=', $rate_to);
        }

        return ResponseFormatter::success(
            $coffee->paginate($limit),
            'Data list produk berhasil diambil'
        );
    }
}
