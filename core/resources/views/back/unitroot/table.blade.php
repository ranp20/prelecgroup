@foreach($datas as $data)
<tr>
  <td>{{ $data->id }}</td>
  <td>{{ $data->name }}</td>
  <td>
    <div class="action-list">
      <a class="btn btn-secondary btn-sm " href="{{ route('back.unitroot.edit',$data->id) }}">
        <i class="fas fa-edit"></i>
      </a>
      <a class="btn btn-danger btn-sm " data-toggle="modal" data-target="#confirm-delete" href="javascript:;" data-href="{{ route('back.unitroot.destroy',$data->id) }}">
        <i class="fas fa-trash-alt"></i>
      </a>
    </div>
  </td>
</tr>
@endforeach