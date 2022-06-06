<div

    x-data="
        {
             isEditing: false,
             isName: '{{ $isName }}',
             focus: function() {
                const dateInput = this.$refs.dateInput;
                dateInput.focus();
                dateInput.select();
             }
        }
    "
    x-cloak
>
{{-- p-2 --}}
{{-- {{dd($key)}} --}}
    <div class="" x-show=!isEditing>
        <span
            x-on:click="isEditing = true; $nextTick(() => focus())"
        >{{ $origDate }}</span>
    </div>
    <div x-show=isEditing class="flex flex-col">
        <form class="flex" wire:submit.prevent="save">
            <x-datepicker

                          shadowless
                          id='{{$inid}}'
                          :error="'{{$inid}}'"
                          class="border-0 truncate focus:border-lh-yellow focus:ring focus:ring-lh-yellow focus:ring-opacity-50 h-7 rounded text-sm"
                          placeholder="0000-00-00"
                          x-ref="dateInput"
                          wire:model.lazy="date"
                          x-on:keydown.enter="isEditing = false"
                          x-on:keydown.escape="isEditing = false"

                        />

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
