<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_archive extends Model
{
    public function pdf()
    {
        return $this->hasOne(pdf_file::class,'id','pdf_id');
    }
}
