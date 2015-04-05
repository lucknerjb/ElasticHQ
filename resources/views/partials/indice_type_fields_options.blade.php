<table class="table">
   <thead>
      <tr>
         <th>Field</th>
         <th>Value</th>
      </tr>
   </thead>
   <tbody>
      @foreach($fields as $field)
         <tr>
            <td>{!! $field !!}</td>
            <td>
               <input name="fields[{!! $field !!}]" class="form-control filter-field">
            </td>
         </tr>
      @endforeach
   </tbody>
</table>
<input class="fields-json" type="hidden" value="{!! e(json_encode($fields)) !!}">
