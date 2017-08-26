@if(env('APP_ENV') == 'production')
  <script type="text/javascript" src="{{ URL::asset('js/analyticstracking.js') }}"></script>
@endif