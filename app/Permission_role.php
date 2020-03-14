<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Permission_role extends Model
{
    //
    protected $table = 'permission_role';
    use Notifiable;
    use HasRoleAndPermission;
}
