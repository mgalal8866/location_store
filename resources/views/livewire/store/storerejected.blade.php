<div>
    @if( $branchrejected->count() != 0)
     <div class="card">
         <div class="card-header">
           <h3 class="card-title">STORES Rejected
             <span class="badge bg-danger">{{ $branchrejected->count() != 0 ?$branchrejected->count():'' }}</span>
           </h3>

           <div class="card-tools">
             <button type="button" class="btn btn-tool" data-card-widget="collapse">
                 <i class="fas fa-minus"></i>
               </button>
               <button type="button" class="btn btn-tool" data-card-widget="remove">
                 <i class="fas fa-times"></i>
               </button>
           </div>
         </div>

         <div class="card-body  table-responsive p-0">
           <table class="table  table-head-fixed text-nowrap">
             <thead>
               <tr>
                 <th style="width: 10px">#</th>
                 <th>Store</th>
                 <th>User</th>
                 <th style="width: 40px">City</th>
                 <th style="width: 40px">Accept</th>
               </tr>
             </thead>
             <tbody>
                 @foreach ( $branchrejected as $branch)
                     <tr>

                         <td>1.</td>
                         <td  class="text-success" >{{ $branch->stores->name }}</td>
                         <td>{{ $branch->stores->user->name }}</td>
                         <td>{{ $branch->city->name }}</td>
                         <td>
                             <div class="btn-group">
                                     {!! $branch->Acceptbtn !!}
                                 <div class="dropdown-menu">
                                     <button class="dropdown-item"  wire:click="changeaccept('{{ $branch->id }}',0)"  href="">Accept</button>
                                     <button class="dropdown-item"   wire:click="changeaccept('{{ $branch->id }}',2)" href="">unaccept</button>
                                 </div>
                             </div>
                         </td>

                     </tr>
                 @endforeach

             </tbody>
           </table>
         </div>
         <!-- /.card-body -->
       </div>
       @endif
 </div>
