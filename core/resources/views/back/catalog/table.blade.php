@foreach($datas as $data)
<tr>
  <td>{{ $data->name }}</td>
  <td>
    <a href="{{ $data->photo ? asset('assets/images/catalogs/'.$data->photo) : asset('assets/images/placeholder.png') }}" target="_blank">
      <img src="{{ $data->photo ? asset('assets/images/catalogs/'.$data->photo) : asset('assets/images/placeholder.png') }}" alt="Image Not Found">
    </a>
  </td>
  <td>
    <div class="dropdown">
      <button class="btn btn-{{  $data->status == 1 ? 'success' : 'danger'  }} btn-sm btn-rounded dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{  $data->status == 1 ? __('Enabled') : __('Disabled')  }}
      </button>
      <div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="{{ route('back.catalog.status',[$data->id,1]) }}">{{ __('Enable') }}</a>
        <a class="dropdown-item" href="{{ route('back.catalog.status',[$data->id,0]) }}">{{ __('Disable') }}</a>
      </div>
    </div>
  </td>
  <td>
    <div class="action-list">
      <a class="btn btn-secondary btn-sm btn-rounded" href="{{ route('back.catalog.edit',$data->id) }}">
        <i class="fas fa-edit"></i> {{ __('Edit') }}
      </a>
      <a class="btn btn-danger btn-sm btn-rounded" data-toggle="modal" data-target="#confirm-delete" href="javascript:;" data-href="{{ route('back.catalog.destroy',$data->id) }}">
        <i class="fas fa-trash-alt"></i>
      </a>
    </div>
  </td>
</tr>
@endforeach