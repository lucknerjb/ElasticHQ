<table class="table table-striped col-md-12">
   <thead>
      <tr>
         @foreach($fields as $field)
            <th>{!! $field !!}</th>
         @endforeach
      </tr>
   </thead>
   <tbody>
      @if ($haveResults)
         @foreach($results['hits']['hits'] as $hit)
            <tr>
               @foreach($fields as $field)
                  <td>
                     @if (isset($hit['_source'][$field]))
                        {!! $hit['_source'][$field] !!}
                     @endif
                  </td>
               @endforeach
            </tr>
         @endforeach
      @else
         <tr>
            <td colspan="{!! count($fields) !!}">
               <div class="alert alert-info">No results found</div>
            </td>
         </tr>
      @endif
   </tbody>
</table>
