<div>
    <div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">{{$products[1]['name']}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
           <form>
            <div class="file-manager">
                <div class="file-manager-left">
                    <div class="dm-uploader-container">
                        <div id="drag-and-drop-zone-file-manager" class="dm-uploader text-center">
                            <p class="file-manager-file-types">
                                <span>JPG</span>
                                <span>JPEG</span>
                                <span>PNG</span>
                            </p>
                            <p class="dm-upload-icon">
                                <i class="icon-upload"></i>
                            </p>
                            <p class="dm-upload-text">قم بسحب وإسقاط الصور هنا مباشرة أو قم بالضغط على زر تصفح الملفات</p>
                            <p class="text-center">
                                <button class="btn btn-default btn-browse-files">تصفح الملفات</button>
                            </p>
                            <a class="btn btn-md dm-btn-select-files">
                                <input type="file" name="file" size="40" multiple="">
                            </a>
                            <ul class="dm-uploaded-files" id="files-file-manager"></ul>
                            <button type="button" id="btn_reset_upload_image" class="btn btn-reset-upload" style="display: none;">إعادة ضبط</button>
                        </div>
                    </div>
                </div>
                <div class="file-manager-right">
                    <div class="file-manager-content">
                        <div id="ckimage_file_upload_response"></div>
                    </div>
                </div>
                <input type="hidden" id="selected_ckimg_file_id" value="1">
                <input type="hidden" id="selected_ckimg_file_path" value="http://almakhzakhana.com/uploads/images-file-manager/202206/img_629fd8e7d15aa4-91030855-74051904.jpg">
            </div>
                <div class="form-group">
                    <label for="name">{{__('name')}}</label>
                    <input type="text" wire:model.dafer='products.{{$index}}.name' class="form-control" id="name" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="description">{{__('description')}}</label>
                    <input type="text" wire:model.dafer='products.{{$index}}.description'  class="form-control" id="description" placeholder="description">
                </div>
                <div class="form-group">
                    <label for="price">{{__('price')}}</label>
                    <input type="text"  wire:model.dafer='products.{{$index}}.price'  class="form-control" id="price" placeholder="price">
                </div>
                <div class="form-group">
                    <label for="create">{{__('create')}}</label>
                    <input type="text" wire:model.dafer='products.{{$index}}.create'  class="form-control" id="create" placeholder="create">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="price">{{__('start_date')}}</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            </div>
                            <x-datepicker wire:model.defer="products.{{$index}}.start_date" id="modalstart_date" :error="'branchlist.{{$index}}.start_date'" />
                            {{-- <x-datepicker wire:model.defer="products.{{$index}}.start_date" id="modalstart_date{{$index}}" :error="'branchlist.{{$index}}.start_date'" /> --}}
                            @error('products'.$index.'.start_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="price">{{__('expiry_date')}}</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            </div>
                            <x-datepicker wire:model.defer="products.{{$index}}.expiry_date" id="modalexpiry_date{{$index}}" :error="'branchlist.{{$index}}.expiry_date'" />
                            @error('products'.$index.'.expiry_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>



           </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save </button>
            </div>
          </div>
        </div>
    </div>

</div>
