@push('csslive')
<style>
     /* Container holding the image and the text */
.container {
  position: relative;
  text-align: center;
  color: rgb(252, 1, 1);
}

/* Bottom left text */
.bottom-left {
  position: absolute;
  bottom: 8px;
  left: 16px;
}

/* Top left text */
.top-left {
  position: absolute;
  top: 8px;
  left: 16px;
}

/* Top right text */
.top-right {
  position: absolute;
  top: 8px;
  right: 16px;
}

/* Bottom right text */
.bottom-right {
  position: absolute;
  bottom: 8px;
  right: 16px;
}

/* Centered text */
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.btclose{
  position: absolute;
  z-ind: 1;
  right: 20px;
}

.img-head img {
  position: relative;
}

.btclose span {
  color: red; // for testing purpose
}
</style>
@endpush
<div>
    <div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabind="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">{{$products[$ind??0]['name']}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                {{-- <div wire:loading >
                    <div class="overlay">
                        <i class="fas fa-2x fa-sync fa-spin"></i>
                    </div>
                </div> --}}
                <div class="row mb-2">
                    <div class="col-md-4">
                        <div class="1st img-head">
                            <button  wire:click='imagedelete({{$ind??0}},1)'  class="close btclose">
                              <span>&times;</span>
                            </button>
                            <div class="container">
                            <div class="text-center" x-data="{ imagePreview: '{{ $products[$ind??0]['image']['img1'] }}' }">
                                <input wire:model="products.{{$ind??0}}.image.img1" accept="image/png, image/gif, image/jpeg"  type="file" class="d-none" x-ref="image"
                                    x-on:change="
                                                reader = new FileReader();
                                                reader.onload = (event) => {
                                                    imagePreview = event.target.result;
                                                    document.getElementById('profileImage{{$ind??0}}3').src = `${imagePreview}`;
                                                };
                                                reader.readAsDataURL($refs.image.files[0]);;;
                                            "/>
                                <img x-on:click="$refs.image.click()" class="border-dark border border-2 w-100 rounded float-left img-thumbnail"  x-bind:src="imagePreview ? imagePreview : '{{$products[$ind??0]['image']['img1'] }}'" alt="Branch picture">
                                <div class="centered">Main</div>
                            </div>
                        </div>
                            {{-- <img src="{{ $products[$in dex??0]['image']['img'] }}" class="border-dark border border-2 w-100 rounded float-left img-thumbnail"  > --}}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="2st img-head">
                            <button  wire:click='imagedelete({{$ind??0}},2)' class="close btclose">
                              <span >&times;</span>
                            </button>
                            <div class="text-center" x-data="{ imagePreview: '{{ $products[$ind??0]['image']['img2'] }}' }">
                                <input wire:model="products.{{$ind??0}}.image.img2" accept="image/png, image/gif, image/jpeg"  type="file" class="d-none" x-ref="image"
                                    x-on:change="
                                                reader = new FileReader();
                                                reader.onload = (event) => {
                                                    imagePreview = event.target.result;
                                                    document.getElementById('profileImage{{$ind??0}}2').src = `${imagePreview}`;
                                                };
                                                reader.readAsDataURL($refs.image.files[0]);;;
                                            "/>
                                <img  x-on:click="$refs.image.click()" class="border-dark border border-2 w-100 rounded float-left img-thumbnail"  x-bind:src="imagePreview ? imagePreview : '{{$products[$ind??0]['image']['img2'] }}'" alt="Branch picture">
                            </div>
                         </div>
                    </div>
                    <div class="col-md-4">
                        <div class="3st img-head">
                            <button   wire:click='imagedelete({{$ind??0}},3)'   class="close btclose">
                              <span>&times;</span>
                            </button>
                            <div class="text-center" x-data="{ imagePreview: '{{ $products[$ind??0]['image']['img3'] }}' }">
                                <input wire:model="products.{{$ind??0}}.image.img3" accept="image/png, image/gif, image/jpeg"  type="file" class="d-none" x-ref="image"
                                    x-on:change="
                                                reader = new FileReader();
                                                reader.onload = (event) => {
                                                    imagePreview = event.target.result;
                                                    document.getElementById('profileImage{{$ind??0}}3').src = `${imagePreview}`;
                                                };
                                                reader.readAsDataURL($refs.image.files[0]);;;
                                            "/>
                                <img x-on:click="$refs.image.click()" class="border-dark border border-2 w-100 rounded float-left img-thumbnail"  x-bind:src="imagePreview ? imagePreview : '{{$products[$ind??0]['image']['img3'] }}'" alt="Branch picture">
                            </div>
                        </div>
                    </div>
                </div>
                    <form>
                        {{-- <div class="file-manager">
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
                        </div> --}}
                            {{-- <div class="dropdown open">
                                <button class="btn bg-purple dropdown-toggle btn-select-option" type="button" data-toggle="dropdown" aria-expanded="true">حدد اختيارا                                                <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu options-dropdown">
                                    <li>
                                        <a href="http://almakhzakhana.com/admin/product-details/6335"><i class="fa fa-info option-icon"></i>عرض التفاصيل</a>
                                    </li>
                                                                                        <li>
                                            <a href="javascript:void(0)" onclick="$('#day_count_product_id').val('6335');" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus option-icon"></i>أضف إلى المميز</a>
                                        </li>
                                                                                                                                        <li>
                                            <a href="javascript:void(0)" onclick="add_remove_special_offers('6335');"><i class="fa fa-plus option-icon"></i>أضف إلى العروض الخاصة</a>
                                        </li>
                                                                                    <li>
                                        <a href="http://almakhzakhana.com/dashboard/edit-product/6335" target="_blank"><i class="fa fa-edit option-icon"></i>تعديل</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" onclick="delete_item('product_controller/delete_product','6335','هل أنت متأكد أنك تريد حذف هذا المنتج؟');"><i class="fa fa-times option-icon"></i>حذف</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" onclick="delete_item('product_controller/delete_product_permanently','6335','هل أنت متأكد أنك تريد حذف هذا المنتج نهائيًا؟');"><i class="fa fa-trash option-icon"></i>الحذف بشكل نهائي</a>
                                    </li>
                                </ul>
                            </div> --}}


                            <div class="form-group">
                                <label for="name">{{__('name')}}</label>
                                <input type="text" wire:model.dafer='products.{{$ind}}.name' class="form-control" id="name" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label for="description">{{__('description')}}</label>
                                <input type="text" wire:model.defer='products.{{$ind}}.description'  class="form-control" id="description" placeholder="description">
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price">{{__('price')}}</label>
                                        <input type="number"  min="1" step="any"  wire:model.dafer='products.{{$ind}}.price'  class="form-control" id="price" placeholder="price">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price">{{__('active')}}</label>
                                        <select id="selectactive1"  wire:model.dafer='products.{{$ind}}.active' class="form-control pt-1   @error('activestore') is-invalid @enderror" >
                                            <option value="">Select active</option>
                                            <option value="0">{{ __('active') }}</option>
                                            <option value="1">{{ __('unactive') }}</option>
                                        </select>
                                        @error('activestore')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <label for="price">{{__('start_date')}}</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                        </div>
                                        <x-datepicker wire:model.dafer="products.{{$ind}}.start_date" id="modalstart_date" :error="'branchlist.{{$ind}}.start_date'" />

                                        @error('products'.$ind.'.start_date')
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
                                        <x-datepicker wire:model.dafer="products.{{$ind}}.expiry_date" id="modalexpiry_date" :error="'branchlist.{{$ind}}.expiry_date'" />
                                        @error('products'.$ind.'.expiry_date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <small>
                                    <label for="create"><i class="fa fa-plus-circle" aria-hidden="true"></i> {{__('created')}} </label>
                                    <span class="text-danger"> {{$products[$ind??0]['create']}}</span>
                                </small>
                                <br>
                                <small>
                                    <label for="updated"><i class="fa fa-pencil-square" aria-hidden="true"></i> {{__('updated')}} </label>
                                    <span class="text-danger"> {{$products[$ind??0]['update']}}</span>
                                </small>
                            </div>

                    </form>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button"  wire:click.prevent='update({{ $ind??0 }})' class="btn btn-primary">Save </button>
            </div>
          </div>
        </div>
    </div>
</div>
