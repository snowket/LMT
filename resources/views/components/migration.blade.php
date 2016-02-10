@extends('layout.main')
@section('content')

<form action="/migration" method="POST">

	<input type="text" name='migration_name' placeholder='Enter Migration Name'>
	<input type="text" name='table_name' placeholder='Enter Table Name'>
	<input type="text" name='folder' placeholder='Enter Folder Name'>

	
	<button>Submit</button>
</form>


<?= $app->make('App\Http\Controllers\LMTMigrationController')->renderList();?>
@stop