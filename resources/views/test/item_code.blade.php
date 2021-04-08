@foreach ($list_filtered as $item)
   {{ substr($item->item_code, 0, 2) . ' => ' . $item->item_code }}<br>
@endforeach