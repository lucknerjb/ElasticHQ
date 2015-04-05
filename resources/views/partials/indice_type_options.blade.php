@if (count($types))
   <option value="">Select a type</option>
   @foreach($types as $type)
      <option value="{!! $type !!}">{!! $type !!}</option>
   @endforeach
@else
   <option value="">No types found</option>
@endif
