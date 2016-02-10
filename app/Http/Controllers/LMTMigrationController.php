<?php

namespace App\Http\Controllers;


use App\LMTMigration;
use Illuminate\Http\Request;
use App\Http\helper\Helper as helper;
class LMTMigrationController extends Controller
{
    public function save(Request $request)
    {
        $folder=$request->input('folder');
        
        $migrationTemplate=base_path().'/public/templates/migration.txt';
        if(!empty($folder)){

        $newFolder=helper::createFolder($request->input('folder'));
        $newFolder=trim($newFolder,'/');
        $id = substr($newFolder, strrpos($newFolder, '/') + 1);
        $filePath=base_path() . env('MIGRATION_FOLDER_PATH').env('LARAVEL_PROJECT_NAME').'/' .$id.'/';
        $fileCreate = shell_exec(env('LARAVEL_PROJECT_PATH').' && php artisan make:migration ' 
            .$request->input('migration_name') .' --path="database/migrations/'
            .env('LARAVEL_PROJECT_NAME').'/' .$id.'"');
        

        }else{
            $filePath=base_path() . env('MIGRATION_FOLDER_PATH');
            $fileCreate = shell_exec(env('LARAVEL_PROJECT_PATH').' && php artisan make:migration ' . $request->input('migration_name'));
        }

        // create migration file in project    
        
        // Get created file name 
        if ( ( $pos = strpos($fileCreate, ":") ) !== FALSE ) { 
            $fileName = substr($fileCreate, $pos + 1); 
        } else {
            exit('error to create file');
        }
        
        // file name
        $fileName = trim( $fileName );
        // Get Content
        $migrationTemplateContent = file_get_contents( $migrationTemplate, FILE_USE_INCLUDE_PATH );

        // Replace Class Name
        $migrationTemplateContent = str_replace('%className%', ucfirst($request->input('migration_name')), $migrationTemplateContent);
        $migrationTemplateContent = str_replace('%tableName%', $request->input('table_name'), $migrationTemplateContent);
      
        file_put_contents( $filePath. $fileName.'.php', $migrationTemplateContent);
        if(isset($id)){
            $migration = LMTMigration::create([
            'migration_name' => $fileName,
            'folder_name'    => $id,
            'table_name'     => $request->input('table_name')
        ]);

        }else
        {
             $migration = LMTMigration::create([
            'migration_name' => $fileName,
            'table_name' => $request->input('table_name')
        ]);
        }

         return view('components.migration')->with('message',$fileCreate);

    }

    public function renderList()
    {
        $all=LMTMigration::all()->toArray();
        return view('include.migration_list',compact('all'))->render();
    }

    public function edit(Request $request,$id)
    {

        return view('include.table_form',compact('id'));
    }


}
