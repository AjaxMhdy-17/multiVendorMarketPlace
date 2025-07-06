@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css" />

    <style>
        .dt-input {
            margin-right: 10px;
            color: rgba(var(--tblr-secondary-rgb), var(--tblr-text-opacity)) !important;
        }

        .dt-search label {
            margin-right: 10px;
            color: rgba(var(--tblr-secondary-rgb), var(--tblr-text-opacity)) !important;
        }

        .dt-info {
            --tblr-text-opacity: 1;
            color: rgba(var(--tblr-secondary-rgb), var(--tblr-text-opacity)) !important;
        }

        .table thead th {
            background: var(--tblr-bg-surface-tertiary);
            font-size: .75rem;
            font-weight: var(--tblr-font-weight-medium);
            text-transform: uppercase;
            letter-spacing: .04em;
            line-height: 1rem;
            color: var(--tblr-secondary);
            white-space: nowrap;
        }

        tbody tr td {
            padding: .15rem .15rem !important;
            color: var(--tblr-table-color-state, var(--tblr-table-color-type, var(--tblr-table-color))) !important;
            background-color: var(--tblr-table-bg) !important;
            border-bottom-width: var(--tblr-border-width) !important;
            box-shadow: inset 0 0 0 9999px var(--tblr-table-bg-state, var(--tblr-table-bg-type, var(--tblr-table-accent-bg))) !important;
            vertical-align: middle !important;
        }


        .dt-paging-button {
            padding: 5px !important;
        }

        .dt-paging-button {
            z-index: 3;
            color: var(--tblr-pagination-active-color) !important;
            background-color: var(--tblr-pagination-active-bg) !important;
            border-color: var(--tblr-pagination-active-border-color) !important;
        }

        .current {
            background: #2fb344 !important;
        }


        .dt-paging-button:hover {
            background: #4299e1 !important;
        }
    </style>
@endpush

@push('js')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
@endpush
