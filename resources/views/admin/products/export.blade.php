<table>
    <thead>
	<tr>
        @if(isset($data[0]))
	    @foreach($data[0] as $key => $value)
		<th>{{ ucfirst($key) }}</th>
	    @endforeach
        @endif
    	</tr>
    </thead>
    <tbody>
    @foreach($data as $row)
    	<tr>
        @foreach ($row as $value)
    	    <td>{{ $value }}</td>
        @endforeach        
	</tr>
    @endforeach
    </tbody>
</table>