@extends('layout.main')
@section('content')

<form action="/migration/save/{{ $id }} " method="POST">
	
<select name="field" id="field">
	<option value="char">char</option>
	<option value="string">string</option>
	<option value="text">text</option>
	<option value="mediumText">mediumText</option>
	<option value="longText">longText</option>
	<option value="integer">integer</option>
	<option value="tinyInteger">tinyInteger</option>
	<option value="smallInteger">smallInteger</option>
	<option value="mediumInteger">mediumInteger</option>
	<option value="bigInteger">bigInteger</option>
	<option value="float">float</option>
	<option value="double">double</option>
	<option value="decimal">decimal</option>
	<option value="date">date</option>
	<option value="time">time</option>
	<option value="binary">binary</option>
	<option value="boolean">boolean</option>
	<option value="softDeletes">softDeletes</option>
</select>

</form>


@stop