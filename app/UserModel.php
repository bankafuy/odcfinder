<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model {

    protected $table = "tb_user";

    protected $fillable = ['username', 'nik', 'nama_lengkap', 'no_hp', 'level', 'photo', 'password'];

    protected $hidden = ['password'];

    public $timestamps = false;

    public $primaryKey = "id";

}
