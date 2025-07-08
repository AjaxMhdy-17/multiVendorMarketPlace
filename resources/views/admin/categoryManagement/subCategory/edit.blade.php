@extends('admin.layout.main')

@section('title', $title)

@section('content')

    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <x-admin.page-title title="{{ __($title) }}" />
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <span class="d-none d-sm-inline">
                            <a href="#" class="btn">
                                New view
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ __($title) }}</h3>
                            <a href="{{ route('admin.category.all.index') }}"
                                class="btn btn-primary">{{ __('BACK') }}</a>
                        </div>
                        <form action="{{ route('admin.category.all.update', ['all' => $category->id]) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <x-admin.input-icon name="icon" :value="$category->icon" :label="__('Category Icon')" />
                                    </div>
                                    <div class="col-md-6">
                                        <x-admin.input-text type="text" name="name" :value="$category->name"
                                            label="{{ __('Category Name') }}" />
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('File Types') }}</label>
                                            <input id="input-tags" name="file_types" value="{{ $category->file_types }}"
                                                autocomplete="off" />
                                            <x-input-error :messages="$errors->get('file_types')" class="mt-1" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('css')
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/css/tom-select.css" rel="stylesheet">
    <!-- Tabler Icons CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/3.21.0/tabler-icons.min.css"
        integrity="sha512-XrgoTBs7P5YtpkeKqKOKkruURsawIaRrhe8QrcWeMnFeyRZiOcRNjBAX+AQeXOvx9/9fSY32dVct1PccRoCICQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/ez-icon-picker.css') }}" />

    <style>
        .ez_main {
            max-width: 450px !important;
        }

        .ez_search {
            width: 100% !important;
        }

        .ez_container {
            max-width: 100%;
        }

        .ez_footer {
            width: 100% !important;
        }
    </style>
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.4.3/dist/js/tom-select.complete.min.js"></script>
    <script src="{{ asset('assets/admin/dist/js/ez-icon-picker.iife.js') }}"></script>
@endpush

@push('js')
    <script>
        const availableOptions = [{
                value: 'jpg',
                text: 'jpg'
            },
            {
                value: 'jpeg',
                text: 'jpeg'
            },
            {
                value: 'png',
                text: 'png'
            },
            {
                value: 'zip',
                text: 'zip'
            },
            {
                value: 'rar',
                text: 'rar'
            }
        ];

        const initialValue = document.getElementById('input-tags').value;
        const initialItems = initialValue ? initialValue.split(',') : [];

        new TomSelect("#input-tags", {
            plugins: {
                remove_button: {
                    title: 'Remove this item',
                }
            },
            options: availableOptions,
            items: initialItems,
            persist: false,
            createOnBlur: true,
            create: true,
            hideSelected: true
        });
    </script>



    <script>
        document.addEventListener('DOMContentLoaded', () => {
            new EzIconPicker({
                selector: '.icon-picker'
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            const prevBtn = document.querySelector(".ez_prev");
            const nextBtn = document.querySelector(".ez_next");
            if (prevBtn && nextBtn) {
                prevBtn.setAttribute('type', 'button');
                nextBtn.setAttribute('type', 'button');
            }
        });
    </script>
@endpush
