<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'first_name'     => $row['first_name'],
            'last_name'    => $row['last_name'],
            'email'    => $row['email'],
            'company'    => '',
            'address1'    => $row['address1'],
            'address2'    => $row['address2'],
            'city'    => $row['city'],
            'province'    => $row['province'],
            'province_Code'    => "",
            'country'    => $row['province'],
            'country_code'    => $row['country_code'],
            'zip'    => $row['zip'],
            'phone'    => $row['phone'],
            'accepts_marketing'    => "accepts_marketing",
            'total_spent'    => $row['total_spent'],
            'total_orders'    => $row['total_orders'],
            'tags'    => $row['tags'],
            'note'    => $row['note'],
            'noteone'    => "",
            'notetwo'    => "",
        ]);
    }
}
