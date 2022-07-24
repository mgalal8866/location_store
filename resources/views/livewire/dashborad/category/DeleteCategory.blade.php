<div >

    <div wire:ignore.self  class="modal fade" id="modal-delete">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">{{ __('tran.delcategory') }}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div wire:loading>

              Processing ...

           </div>
            <div class="modal-body">
              <p>  {{ __('tran.surefordelete') }} </p>
              <p>
                @isset($name)
                <strong>{{ $name }} </strong>
                @endisset
                &hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button  wire:loading.attr="disabled" type="button" class="btn btn-outline-light" data-dismiss="modal">{{ __('tran.close') }}</button>
              <button  wire:loading.attr="disabled" type="button" class="btn btn-danger" wire:click="delete()">{{ __('tran.delete') }}</button>
            </div>
          </div>
        </div>
      </div>
</div>
