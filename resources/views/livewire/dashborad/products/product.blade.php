@push('csslive')
    <style>
        .imgprod {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            width: 150px;
        }
    </style>
@endpush
<div>
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
        aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Confirm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                    <button type="button" wire:click.prevent="delete('soft')" class="btn btn-danger close-modal"
                        data-dismiss="modal">{{ __('softdelete') }}</button>
                    <button type="button" wire:click.prevent="delete('hard')" class="btn btn-danger close-modal"
                        data-dismiss="modal">{{ __('harddelete') }}</button>

                </div>
            </div>
        </div>
    </div>
    <div class="card card-primary card-outline card-outline-tabs">
        <div wire:ignore class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                @foreach ($products as $product)
                    <li class="nav-item">
                        <a class="nav-link {{ $loop->index == 0 ? 'active' : '' }}" id="{{ $product->slug }}-tab"
                            data-toggle="pill" href="#{{ $product->slug }}"role="tab"
                            aria-controls="{{ $product->slug }}" aria-selected="true"><i
                                class="fas fa-store-alt    "></i> {{ $product->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-four-tabContent">
                @foreach ($products as $product)
                    <div wire:ignore.self class="tab-pane fade {{ $loop->index == 0 ? ' show active' : '' }}"
                        id="{{ $product->slug }}" role="tabpanel" aria-labelledby="{{ $product->slug }}-tab">

                        <form id="F{{ $loop->index }}" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="control-label">صورة main
                                        </label>
                                        <div x-data="{ isUploading: false, progress: 5 }" x-on:livewire-upload-start="isUploading = true"
                                            x-on:livewire-upload-finish="isUploading = false; progress = 5"
                                            x-on:livewire-upload-error="isUploading = false"
                                            x-on:livewire-upload-progress="progress = $event.detail.progress">
                                            <div class="display-block">
                                                <a class="btn btn-success btn-sm btn-file-upload">
                                                    اختر صورة <input type="file" name="file" size="40"
                                                        accept=".png, .jpg, .jpeg, .gif"
                                                        wire:model.dafer='productlist.{{ $loop->index }}.image1'>
                                                </a>
                                            </div>
                                            <div x-show.transition="isUploading"
                                                class="progress progress-sm mt-2 rounded">
                                                <div class="progress-bar bg-success  progress-bar-striped"
                                                    role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                    aria-valuemax="100" x-bind:style="`width: ${progress}%`">
                                                    <span class="sr-only">40% Complete (success)</span>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($productlist[$loop->index]['photo1'] && $productlist[$loop->index]['image1'] == null)
                                            <img src="{{ $productlist[$loop->index]['photo1'] ?? '' }}"
                                                class="img imgprod d-block mt-2 w-20 rounded">
                                        @else
                                            <img src="{{ $productlist[$loop->index]['image1']->temporaryUrl() }}"
                                                class="img imgprod d-block mt-2 w-20 rounded">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="control-label">صورة 2
                                        </label>
                                        <div x-data="{ isUploading: false, progress: 5 }" x-on:livewire-upload-start="isUploading = true"
                                            x-on:livewire-upload-finish="isUploading = false; progress = 5"
                                            x-on:livewire-upload-error="isUploading = false"
                                            x-on:livewire-upload-progress="progress = $event.detail.progress">
                                            <div class="display-block">
                                                <a class="btn btn-success btn-sm btn-file-upload">
                                                    اختر صورة <input type="file" name="file" size="40"
                                                        accept=".png, .jpg, .jpeg, .gif"
                                                        wire:model.dafer='productlist.{{ $loop->index }}.image2'>
                                                </a>
                                            </div>
                                            <div x-show.transition="isUploading"
                                                class="progress progress-sm mt-2 rounded">
                                                <div class="progress-bar bg-success  progress-bar-striped"
                                                    role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                    aria-valuemax="100" x-bind:style="`width: ${progress}%`">
                                                    <span class="sr-only">40% Complete (success)</span>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($productlist[$loop->index]['photo2'] && $productlist[$loop->index]['image2'] == null)
                                            <img src="{{ $productlist[$loop->index]['photo2'] ?? '' }}"
                                                class="img imgprod d-block mt-2 w-20 rounded">
                                        @else
                                            <img src="{{ $productlist[$loop->index]['image2']->temporaryUrl() }}"
                                                class="img imgprod d-block mt-2 w-20 rounded">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="control-label">صورة 3
                                        </label>
                                        <div x-data="{ isUploading: false, progress: 5 }" x-on:livewire-upload-start="isUploading = true"
                                            x-on:livewire-upload-finish="isUploading = false; progress = 5"
                                            x-on:livewire-upload-error="isUploading = false"
                                            x-on:livewire-upload-progress="progress = $event.detail.progress">
                                            <div class="display-block">
                                                <a class="btn btn-success btn-sm btn-file-upload">
                                                    اختر صورة <input type="file" name="file" size="40"
                                                        accept=".png, .jpg, .jpeg, .gif"
                                                        wire:model.dafer='productlist.{{ $loop->index }}.image3'>
                                                </a>
                                            </div>
                                            <div x-show.transition="isUploading"
                                                class="progress progress-sm mt-2 rounded">
                                                <div class="progress-bar bg-success  progress-bar-striped"
                                                    role="progressbar" aria-valuenow="40" aria-valuemin="0"
                                                    aria-valuemax="100" x-bind:style="`width: ${progress}%`">
                                                    <span class="sr-only">40% Complete (success)</span>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($productlist[$loop->index]['photo3'] && $productlist[$loop->index]['image3'] == null)
                                            <img src="{{ $productlist[$loop->index]['photo3'] ?? '' }}"
                                                class="img imgprod d-block mt-2 w-20 rounded">
                                        @else
                                            <img src="{{ $productlist[$loop->index]['image3']->temporaryUrl() }}"
                                                class="img imgprod d-block mt-2 w-20 rounded">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="name{{ $loop->index }}">{{ __('name') }}</label>
                                        <input type="text" id="name{{ $loop->index }}"
                                            wire:model.defer='productlist.{{ $loop->index }}.name'
                                            class="form-control @error('productlist.' . $loop->index . '.name') is-invalid @enderror">
                                        @error('productlist.' . $loop->index . '.name')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="price{{ $loop->index }}">{{ __('price') }}</label>
                                        <input type="text" id="price{{ $loop->index }}"
                                            wire:model.defer='productlist.{{ $loop->index }}.price'
                                            class="form-control @error('productlist.' . $loop->index . '.price') is-invalid @enderror">
                                        @error('productlist.' . $loop->index . '.price')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="selectactive{{ $loop->index }}">{{ __('active') }}</label>
                                        <select id="selectactive{{ $loop->index }}"
                                            wire:model.defer='productlist.{{ $loop->index }}.active'
                                            class="form-control pt-1   @error('productlist.' . $loop->index . '.active') is-invalid @enderror">
                                            <option value="0">{{ __('active') }}</option>
                                            <option value="1">{{ __('unactive') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="price">{{ __('start_date') }}</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                        </div>
                                        <x-datepicker wire:model.dafer="productlist.{{ $loop->index }}.start_date"
                                            id="prostart_date{{ $loop->index }}" :error="'productlist.{{ $loop->index }}.start_date'" />

                                        @error('productlist.' . $loop->index . '.start_date')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="price">{{ __('expiry_date') }}</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                        </div>
                                        <x-datepicker wire:model.dafer="productlist.{{ $loop->index }}.expiry_date"
                                            id="proexpiry_date{{ $loop->index }}" :error="'productlist.{{ $loop->index }}.expiry_date'" />
                                        @error('productlist.' . $loop->index . '.expiry_date')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="inputDescription">{{ __('description') }}</label>
                                        <textarea id="inputdescription" wire:model.defer='productlist.{{ $loop->index }}.description' rows="5"
                                            class="form-control @error('productlist.' . $loop->index . '.description') is-invalid @enderror"></textarea>
                                        @error('productlist.' . $loop->index . '.description')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button  class="btn btn-success" wire:click.prevent="save({{ $loop->index }})" wire:loading.attr="disabled"  >
                                    {{ __('save') }} </button>
                                {{-- <button class="btn btn-danger" wire:click.prevent="deleteId({{$loop->index}})"> {{ __('delete') }} </button> --}}
                                <button type="button" wire:click="deleteId({{ $loop->index }})"
                                    class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                                    {{ __('delete') }}</button>

                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@push('jslive')
    <script>
        var hash = document.location.hash;
        if (hash) {
            $('.nav-tabs a[href="' + hash + '"]').tab('show');
        }

        // Change hash for page-reload
        $('.nav a').on('shown.bs.tab', function(e) {
            window.location.hash = e.target.hash;
        });
    </script>
@endpush
