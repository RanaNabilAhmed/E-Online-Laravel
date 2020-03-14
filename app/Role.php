<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;
use Illuminate\Foundation\Auth\User as Authenticatable;

class role extends Model
{
    protected $table = 'roles';
    use Notifiable;
    use HasRoleAndPermission;
}
