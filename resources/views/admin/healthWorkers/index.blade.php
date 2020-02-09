@extends('layouts.admin')
@section('content')
@can('health_worker_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.health-workers.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.healthWorker.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.healthWorker.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-HealthWorker">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.healthWorker.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.healthWorker.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.healthWorker.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.healthWorker.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.healthWorker.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.healthWorker.fields.facility') }}
                        </th>
                        <th>
                            {{ trans('cruds.facility.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.facility.fields.contact') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($healthWorkers as $key => $healthWorker)
                        <tr data-entry-id="{{ $healthWorker->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $healthWorker->id ?? '' }}
                            </td>
                            <td>
                                {{ $healthWorker->name ?? '' }}
                            </td>
                            <td>
                                {{ $healthWorker->title ?? '' }}
                            </td>
                            <td>
                                {{ $healthWorker->phone ?? '' }}
                            </td>
                            <td>
                                {{ $healthWorker->email ?? '' }}
                            </td>
                            <td>
                                {{ $healthWorker->facility->name ?? '' }}
                            </td>
                            <td>
                                {{ $healthWorker->facility->email ?? '' }}
                            </td>
                            <td>
                                {{ $healthWorker->facility->contact ?? '' }}
                            </td>
                            <td>
                                @can('health_worker_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.health-workers.show', $healthWorker->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('health_worker_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.health-workers.edit', $healthWorker->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('health_worker_delete')
                                    <form action="{{ route('admin.health-workers.destroy', $healthWorker->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('health_worker_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.health-workers.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  });
  $('.datatable-HealthWorker:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
