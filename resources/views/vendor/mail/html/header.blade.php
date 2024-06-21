@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://cdn-icons-png.flaticon.com/512/595/595777.png" class="logo" alt="Barbeshop Icon">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
