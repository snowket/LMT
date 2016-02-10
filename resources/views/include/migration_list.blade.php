
@if(count($all)>0)
	<ol>
		@foreach($all as $item)
			<li>
				<a href="/migration/controll/{{ $item['id']}}">
					{{ $item['table_name']."  ".$item['migration_name']."   ".$item['folder_name'] }} 
				</a>	
			</li>
		@endforeach
	</ol>

@endif
