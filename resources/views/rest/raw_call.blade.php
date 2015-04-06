<h3>{!! $title !!}</h3>
<div class="row">
   <section class="col-md-12">
      <span>{!! $url !!}</span>

<!-- JSON_ENCODE line needs to start at pos 0 for formatting -->
      <pre>
{!! json_encode($response, JSON_PRETTY_PRINT) !!}
      </pre>
   </section>
</div>
