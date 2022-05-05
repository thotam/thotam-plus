<?php

namespace Thotam\ThotamPlus\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Thotam\ThotamPlus\DataTables\ChiNhanhTable;

class ChiNhanhController extends Controller
{
    /**
     * admin_chinhanh
     *
     * @return void
     */
    public function admin_chinhanh(ChiNhanhTable $dataTable)
    {
        $hr = Auth::user()->hr;

        if ($hr->hasAnyPermission(["view-chinhanh", "add-chinhanh", "edit-chinhanh", "delete-chinhanh"])) {
            return $dataTable->render('thotam-plus::chinhanh.chinhanh', ['title' => 'Chi nhánh']);
        } else {
            return view('errors.dynamic', [
                'error_code' => '403',
                'error_description' => 'Không có quyền truy cập',
                'title' => 'Chi nhánh',
            ]);
        }
    }
}
