@extends('layouts.admin')
@section('content')
@can('shipping_address_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.shipping-addresses.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.shippingAddress.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.shippingAddress.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ShippingAddress">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.shippingAddress.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.shippingAddress.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.shippingAddress.fields.city') }}
                        </th>
                        <th>
                            {{ trans('cruds.shippingAddress.fields.postcode') }}
                        </th>
                        <th>
                            {{ trans('cruds.shippingAddress.fields.mobile') }}
                        </th>
                        <th>
                            {{ trans('cruds.shippingAddress.fields.payment_method') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($shippingAddresses as $key => $shippingAddress)
                        <tr data-entry-id="{{ $shippingAddress->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $shippingAddress->id ?? '' }}
                            </td>
                            <td>
                                {{ $shippingAddress->address ?? '' }}
                            </td>
                            <td>
                                {{ $shippingAddress->city ?? '' }}
                            </td>
                            <td>
                                {{ $shippingAddress->postcode ?? '' }}
                            </td>
                            <td>
                                {{ $shippingAddress->mobile ?? '' }}
                            </td>
                            <td>
                                {{ $shippingAddress->payment_method->name ?? '' }}
                            </td>
                            <td>
                                @can('shipping_address_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.shipping-addresses.show', $shippingAddress->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('shipping_address_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.shipping-addresses.edit', $shippingAddress->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('shipping_address_delete')
                                    <form action="{{ route('admin.shipping-addresses.destroy', $shippingAddress->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('shipping_address_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.shipping-addresses.massDestroy') }}",
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
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-ShippingAddress:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection