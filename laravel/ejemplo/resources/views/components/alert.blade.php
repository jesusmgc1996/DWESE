<div class="p-4 mb-4 text-sm text-{{$colortext}}-800 rounded-lg bg-{{$colorfondo}}-50 dark:bg-{{$colorfondo}}-800 dark:text-{{$colortext}}-400" role="alert">
  <span class="font-medium">{{$slot}}</span>{{$texto}}
  {{$peligro()}}
  <p {{$attributes}}>TEXTO DEL COMPONENTE</p>
</div>