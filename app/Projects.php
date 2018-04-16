<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\Projects;

class Projects extends Model
{
    use  SoftDeletes;

    protected $fillable = [
        'id', 'name', 'description', 'avatar', 'alias', 'status',
        'initial_date', 'final_date', 'leader_user', 'email',
    ];

    public function usuarioproyectos(){
    	return $this->hasMany(Projects::class, 'leader_user', User::class);
    }
}
