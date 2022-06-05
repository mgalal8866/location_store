<div
    x-data="
        {
             isEditing: false,
             isName: '{{ $isName }}',
             focus: function() {
                const textInput = this.$refs.textInput;
                textInput.focus();
                textInput.select();
             }
        }
    "
    x-cloak
>
{{-- p-2 --}}
    <div class="" x-show=!isEditing>
        <span
            x-on:click="isEditing = true; $nextTick(() => focus())"
        >{{ $origName }}</span>
    </div>
    <div x-show=isEditing class="flex flex-col">
        <form class="flex" wire:submit.prevent="save">
            <input shadowless
                          type="text"
                          class="border-0 truncate focus:border-lh-yellow focus:ring focus:ring-lh-yellow focus:ring-opacity-50 h-7 rounded text-sm @error($origName) is-invalid @enderror"
                          placeholder="100 characters max."
                          x-ref="textInput"
                          wire:model.lazy="newName"
                          x-on:keydown.enter="isEditing = false"
                          x-on:keydown.escape="isEditing = false"
            />
            @error($origName)<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            <button type="button" class="btn pl-2 focus:outline-none text-danger" title="{{__('cancel')}}" x-on:click="isEditing = false"><i class="fas fa-undo-alt"></i></button>
            <button
                type="submit"
                class="btn pl-1 focus:outline-none text-success"
                title="{{__('save')}}"
                x-on:click="isEditing = false"
            ><i class="fas fa-check"></i></button>
        </form>
        <small class="text-xs text-danger">Enter to save, Esc to cancel</small>
    </div>
</div>
