<?php

namespace App\Http\Helper;

class Helper {

	public static function createFolder($folderName)
	{
		$folder = base_path().env('MIGRATION_FOLDER_PATH') .'/'. env('LARAVEL_PROJECT_NAME') . "/".$folderName."/";

		if(file_exists($folder))
		{
			return "Folder exists at :  ". $folder;
		}
		else
		{
			//Check if project folder exists in migrations 
			if( file_exists( base_path().env('MIGRATION_FOLDER_PATH').env('LARAVEL_PROJECT_NAME') ) )
			{
				mkdir(base_path().env('MIGRATION_FOLDER_PATH').env('LARAVEL_PROJECT_NAME').$folderName,0777);
			}
			else
			{
				mkdir(base_path().env('MIGRATION_FOLDER_PATH').env('LARAVEL_PROJECT_NAME'),0777);
				mkdir(base_path().env('MIGRATION_FOLDER_PATH').env('LARAVEL_PROJECT_NAME').$folderName,0777);
			}
			return "Folder created :  ". $folder;
			
		}
	}
}
