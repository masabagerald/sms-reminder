<div class="m-3">
    @can('infant_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.infants.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.infant.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.infant.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Infant">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.infant.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.infant.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.infant.fields.mother') }}
                            </th>
                            <th>
                                {{ trans('cruds.mother.fields.phone') }}
                            </th>
                            <th>
                                {{ trans('cruds.mother.fields.anc_no') }}
                            </th>
                            <th>
                                {{ trans('cruds.infant.fields.age') }}
                            </th>
                            <th>
                                {{ trans('cruds.infant.fields.eid_no') }}
                            </th>
                            <th>
                                {{ trans('cruds.infant.fields.dob') }}
                            </th>
                            <th>
                                {{ trans('cruds.infant.fields.gender') }}
                            </th>
                            <th>
                                {{ trans('cruds.infant.fields.pcr_exp_date') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($infants as $key => $infant)
                            <tr data-entry-id="{{ $infant->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $infant->id ?? '' }}
                                </td>
                                <td>
                                    {{ $infant->name ?? '' }}
                                </td>
                                <td>
                                    {{ $infant->mother->name ?? '' }}
                                </td>
                                <td>
                                    {{ $infant->mother->phone ?? '' }}
                                </td>
                                <td>
                                    {{ $infant->mother->anc_no ?? '' }}
                                </td>
                                <td>
                                    {{ $infant->age ?? '' }}
                                </td>
                                <td>
                                    {{ $infant->eid_no ?? '' }}
                                </td>
                                <td>
                                    {{ $infant->dob ?? '' }}
                                </td>
                                <td>
                                    {{ App\Infant::GENDER_RADIO[$infant->gender] ?? '' }}
                                </td>
                                <td>
                                    {{ $infant->pcr_exp_date ?? '' }}
                                </td>
                                <td>
                                    @can('infant_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.infants.show', $infant->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('infant_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.infants.edit', $infant->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('infant_delete')
                                        <form action="{{ route('admin.infants.destroy', $infant->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('infant_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.infants.massDestroy') }}",
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
  $('.datatable-Infant:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
