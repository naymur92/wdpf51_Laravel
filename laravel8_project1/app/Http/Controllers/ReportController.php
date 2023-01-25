<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
  public function index()
  {
    // Select using the fluent builder
    // $users = DB::table('products')->get();

    // echo "<pre>";
    // print_r($users);
    // echo "</pre>";

    $con = DB::connection('querybuilder');

    // // Report 1
    // $builder = $con->table('offices');
    // $builder = $builder->where('country', 'USA');
    // $result = $builder->get()->toArray();

    // // Report 2
    // $builder = $con->table('employees');
    // $builder = $builder->whereIn('officeCode', [1, 2, 3]);
    // $result = $builder->get()->toArray();

    // // Report 3
    // $builder = $con->table('employees');
    // $builder = $builder->whereIn('officeCode', [1, 2, 3])->where('jobTitle', 'Sales Rep');
    // $result = $builder->get()->toArray();

    // // Report 4
    // $builder = $con->table('employees');
    // $builder = $builder->select(DB::raw('CONCAT(firstName, " ", lastName) AS Name'));
    // $result = $builder->get()->toArray();

    // // Report 4
    // $builder = $con->table('employees');
    // $builder = $builder->select('jobTitle', DB::raw('count(jobTitle) AS "Total"'))->groupBy('jobTitle');
    // $result = $builder->get()->toArray();


    // // Report 5
    // $builder = $con->table('employees');
    // $builder = $builder->where('officeCode', 3)->orWhere('officeCode', 1);
    // $result = $builder->get()->toArray();

    // // Report 6
    // $builder = $con->table('employees');
    // $builder = $builder->whereBetween('officeCode', [1, 3]);
    // $result = $builder->get()->toArray();

    // Report 6
    $builder = $con->table('employees')->join('offices', 'employees.officeCode', '=', 'offices.officeCode')->select('employees.*', 'offices.country');
    $result = $builder->get()->toArray();


    echo count($result);
    echo "<pre>";
    print_r($result);
    echo "</pre>";
  }
}
