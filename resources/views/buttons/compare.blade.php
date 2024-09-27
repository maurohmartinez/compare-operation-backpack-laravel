@if ($crud->hasAccess('compare') && $crud->get('list.bulkActions'))
    <a href="javascript:void(0)" onclick="compareEntries()" class="btn btn-sm btn-secondary bulk-button">
        <i class="la la-not-equal me-1 mr-1"></i> Compare
    </a>
@endif

@push('after_scripts')
    <script>
        if (typeof compareEntries != 'function') {

            function compareEntries() {
                if (typeof crud.checkedItems === 'undefined' || crud.checkedItems.length === 0) {
                    return new Noty({
                        type: "warning",
                        text: "<strong>{!! trans('backpack::crud.bulk_no_entries_selected_title') !!}</strong><br>{!! trans('backpack::crud.bulk_no_entries_selected_message') !!}"
                    }).show();
                }

                if (crud.checkedItems.length === 1) {
                    return new Noty({
                        type: "warning",
                        text: "<strong>Not so fast!</strong><br>Select one more entry to compare."
                    }).show();
                }

                if (crud.checkedItems.length > 2) {
                    return new Noty({
                        type: "warning",
                        text: "<strong>Not so fast!</strong><br>You cannot select more than 2 entries to compare."
                    }).show();
                }

                window.location.href = '/{{ $crud->route }}/compare/' + crud.checkedItems[0] + '/' + crud.checkedItems[1];
            }
        }
    </script>
@endpush