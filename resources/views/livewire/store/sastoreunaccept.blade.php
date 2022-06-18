<div>
   @if( $branchnNotAccept->count() != 0)
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">STORES Waiting For Accept
            <span class="badge bg-danger">{{ $branchnNotAccept->count() != 0 ?$branchnNotAccept->count():'' }}</span>
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
                <th style="width: 40px">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ( $branchnNotAccept as $branch)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td class="text-success" >{{ $branch->stores->name??'' }}</td>
                        <td>{{ $branch->stores->user->name??'' }}</td>
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
                        <td>
                            <div class="btn-group">
                                {!! $branch->Activebtn !!}
                                  <div class="dropdown-menu">
                                      <button class="dropdown-item"  wire:click="changeactive('{{ $branch->id }}',0)"  href="">Active</button>
                                      <button class="dropdown-item"   wire:click="changeactive('{{ $branch->id }}',1)" href="">Deactivate</button>
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
