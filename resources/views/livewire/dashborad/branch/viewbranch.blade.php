<div>
    <form enctype="multipart/form-data">
        <div class="row" >
            <div class="col-md-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('maindetails')}}</h3>
                        <div class="card-tools">
                             <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="row" >
                            <div class="col-md-8" >
                                <div class="row" >
                                    <div class="col-md-6" >
                                        <div class="form-group">
                                            <label for="inputName">{{ __('minestore')}}</label>
                                            <input type="text" id="inputName" wire:model.dafer='name' class="form-control @error('name') is-invalid @enderror" >
                                            @error('name')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3" >
                                        <div  class="form-group">
                                            <label for="selectactive1">{{ __('active') }}</label>
                                            <select id="selectactive1"  wire:model.dafer='activestore' class="form-control pt-1   @error('activestore') is-invalid @enderror" >
                                                <option value="">Select active</option>
                                                <option value="0">{{ __('active') }}</option>
                                                <option value="1">{{ __('unactive') }}</option>
                                            </select>
                                            @error('activestore')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror

                                        </div>

                                    </div>
                                    <div class="col-md-3" >
                                        <div class="form-group">
                                            <label for="inputnumberbranch">{{ __('numberbranch')}}</label>
                                            <input type="text" id="inputnumberbranch" wire:model.dafer='numberbranch' class="form-control @error('numberbranch') is-invalid @enderror" >
                                            @error('numberbranch')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" >
                                        <div   class="form-group">
                                            <label for="selectcategory">{{ __('category') }}</label>
                                            <select id="selectcategory"  wire:model.lazy='selectcategory' class="form-control pt-1   @error('selectcategory') is-invalid @enderror" >
                                                <option value="">Select category</option>
                                                @foreach ( $categorys as $category )
                                                    @if(!$category->parent_id)
                                                      <option value="{{$category->id}}" >{{$category->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        @error('selectcategory')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6" >
                                        @empty(!$subcategorys)
                                            <div   class="form-group">
                                                <label for="selectsubcategory">{{ __('subcategory') }}</label>
                                                <select id="selectsubcategory"  wire:model.lazy='selectsubcategory' class="form-control pt-1   @error('selectsubcategory') is-invalid @enderror"  required>
                                                    <option value="">Select Sub category</option>
                                                        @foreach ( $subcategorys as $subcategory )
                                                            <option value="{{$subcategory->id}}" >{{$subcategory->name}}</option>
                                                        @endforeach
                                                </select>
                                            @error('selectsubcategory')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                            </div>
                                        @endempty
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer bg-secondary">
                        <button class="btn btn-primary" wire:click.prevent='savestore()'> Save </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <x-table.table :headers="['ID','image','city','description','product','address','time','date','status','action']">
        @foreach($branchs as $branch)
        <tr>
            <td>{{$branch->id}}</td>
            <td><img class="img-thumbnail w-25" src="{{$branch->image}}" alt=""></td>
            <td>{{$branch->city->name ?? '' }} , {{$branch->region->name ?? '' }}</td>
            <td>{{$branch->description}}</td>
            <td>{{$branch->product->count()}}</td>
            <td>{{($branch->address ?? '')}}</td>
            <td>From :  {{($branch->opentime ?? '') . ' To : ' . $branch->closetime ?? ''}}</td>
            <td>From :  {{($branch->start_date ?? '') . ' To : ' . $branch->expiry_date ?? ''}}</td>
            <td >
                <div class="btn-group" wire:click="active('{{ $branch->slug }}')">
                    {!!($branch->activebtn ?? '') !!}
                      {{-- <div class="dropdown-menu">
                          <button class="dropdown-item"  wire:click="active('{{ $category->slug }}')"  href="">Active</button>
                          <button class="dropdown-item"   wire:click="active('{{ $category->slug }}')" href="">Deactivate</button>
                      </div> --}}
               </div>
            </td>
            <td><a href="{{route('editbranch',['slug'=>$branch->slug])}}" class="btn btn-outline-success btn-sm"> <i class="fas fa-edit"></i> view</a></td>
        </tr>
        @endforeach
    </x-table.table>
    <div>{{$branchs->links()}}</div>
</div>
