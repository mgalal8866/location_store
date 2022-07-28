<div>
    @if( $products->count() != 0)
     <div class="card">
         <div class="card-header">
           <h3 class="card-title">Product Waiting For Active
             <span class="badge bg-danger">{{ $products->count() != 0 ?$products->count():'' }}</span>
           </h3>

           <div class="card-tools">
             <div wire:click='$refresh'  class="btn btn-tool">
                 <i class="fas fa-redo"></i>
             </div>
             <button type="button" class="btn btn-tool" data-card-widget="collapse">
                 <i class="fas fa-minus"></i>
               </button>
               <button type="button" class="btn btn-tool" data-card-widget="remove">
                 <i class="fas fa-times"></i>
               </button>


           </div>
         </div>

         <div class="card-body  table-responsive p-0">
           <table class="table table-sm table-head-fixed text-nowrap">
             <thead>
               <tr>
                 <th>#</th>
                 <th>{{__('branch')}}</th>
                 <th>{{__('product')}}</th>
                 <th>{{__('city')}}</th>
               </tr>
             </thead>
             <tbody>
                 @foreach ( $products as  $index  =>  $product )
                     <tr>
                         <td>{{ $products->firstItem() + $index }}</td>
                         <td class="text-success">
                             <a href="{{route('editbranch',['slug' => $product->branch->slug ]) }}" class="nav-link">{{ $product->branch->stores->name ??'N/A'}}</a>
                         </td>
                         <td>{{ $product->name ?? 'N/A'}}</td>
                         <td><span class="badge badge-info">{{ $product->branch->city->name??'N/A' }} - {{ $product->branch->region->name?? 'N/A'}}</span></td>

                     </tr>
                 @endforeach

             </tbody>
           </table>
           <div class="pagination pagination-sm  d-flex justify-content-center">
             {!! $products->links() !!}
         </div>
         </div>
         <!-- /.card-body -->
       </div>
       @endif
 </div>
