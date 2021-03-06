<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use jeremykenedy\LaravelRoles\Traits\HasRoleAndPermission;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Permission extends Model
{
    //
    protected $table = 'permissions';
    use Notifiable;
    use HasRoleAndPermission;
}
