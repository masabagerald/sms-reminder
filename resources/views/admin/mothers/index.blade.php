@extends('layouts.admin')
@section('content')
@can('mother_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.mothers.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.mother.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>

            @include('admin.csvImport.modal', ['model' => 'Mother', 'route' => 'admin.mothers.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.mother.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Mother">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.mother.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.mother.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.mother.fields.age') }}
                        </th>
                        <th>
                            {{ trans('cruds.mother.fields.marital_status') }}
                        </th>
                        <th>
                            {{ trans('cruds.mother.fields.village') }}
                        </th>
                        <th>
                            {{ trans('cruds.mother.fields.parish') }}
                        </th>
                        <th>
                            {{ trans('cruds.mother.fields.subcounty') }}
                        </th>
                        <th>
                            {{ trans('cruds.mother.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.mother.fields.anc_no') }}
                        </th>
                        <th>
                            {{ trans('cruds.mother.fields.hiv_status') }}
                        </th>
                        <th>
                            {{ trans('cruds.mother.fields.newly_tested') }}
                        </th>
                        <th>
                            {{ trans('cruds.mother.fields.newly_art') }}
                        </th>
                        <th>
                            {{ trans('cruds.mother.fields.edd') }}
                        </th>
                        <th>
                            {{ trans('cruds.mother.fields.notes') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mothers as $key => $mother)
                        <tr data-entry-id="{{ $mother->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $mother->id ?? '' }}
                            </td>
                            <td>
                                {{ $mother->name ?? '' }}
                            </td>
                            <td>
                                {{ $mother->age ?? '' }}
                            </td>
                            <td>
                                {{ App\Mother::MARITAL_STATUS_RADIO[$mother->marital_status] ?? '' }}
                            </td>
                            <td>
                                {{ $mother->village ?? '' }}
                            </td>
                            <td>
                                {{ $mother->parish ?? '' }}
                            </td>
                            <td>
                                {{ $mother->subcounty ?? '' }}
                            </td>
                            <td>
                                {{ $mother->phone?? '' }}
                            </td>
                            <td>
                                {{ $mother->anc_no ?? '' }}
                            </td>
                            <td>
                                {{ App\Mother::HIV_STATUS_RADIO[$mother->hiv_status] ?? '' }}
                            </td>
                            <td>
                                {{ App\Mother::NEWLY_TESTED_RADIO[$mother->newly_tested] ?? '' }}
                            </td>
                            <td>
                                {{ App\Mother::NEWLY_ART_RADIO[$mother->newly_art] ?? '' }}
                            </td>
                            <td>
                                {{ $mother->edd ?? '' }}
                            </td>
                            <td>
                                {{ $mother->notes ?? '' }}
                            </td>
                            <td>
                                @can('mother_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.mothers.show', $mother->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('mother_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.mothers.edit', $mother->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('mother_delete')
                                    <form action="{{ route('admin.mothers.destroy', $mother->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('mother_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.mothers.massDestroy') }}",
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
  $('.datatable-Mother:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
