<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model {

    protected $table = "tb_user";

    protected $fillable = ['username', 'nama', 'level', 'photo'];

    protected $hidden = ['password'];

    public $timestamps = false;

    public $primaryKey = "id_odc";

}
