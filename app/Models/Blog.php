<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MainDepartment;

class Blog extends Model
{
       
       public function MainDepartmentName(){
     	return MainDepartment::where('id',$this->main_department_id)->first();
}
}
