<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class Customer extends Model
{
    use HasFactory;

    private static $customer;
    public static function saveCustomer($request)
    {
        self::$customer = new Customer();
        self::$customer->name       = $request->name;
        self::$customer->email      = $request->email;
        self::$customer->mobile      = $request->mobile;
        self::$customer->password   = bcrypt($request->password);
        self::$customer->save() ;

        return self::$customer;
    }

}
