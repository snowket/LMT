<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LMTMigration extends Model
{
    protected $table='LMTmigrations';
    
    protected $fillable = ['migration_name', 'folder_name','table_name'];
   
}
