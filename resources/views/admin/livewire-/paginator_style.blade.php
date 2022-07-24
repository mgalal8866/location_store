
@if ($paginator->hasPages())

<nav class="d_inline_b">
<ul  class="hr_list">
    <!-- prev -->
    @if ($paginator->onFirstPage())
    {{-- <li class="w-16 px-2 py-1 text-center rounded border bg-gray-200">Prev</li> --}}
    <li class="m_right_3"><a class="button_type_4 tr_delay grey state_2 d_block vc_child t_align_c fs_ex_small  border_black"><i class="fa fa-angle-left d_inline_m"></i></a></li>
    @else
    {{-- <li class="w-16 px-2 py-1 text-center rounded border shadow bg-white cursor-pointer" wire:click="previousPage">Prev</li> --}}
    <li class="m_right_3"><a  class="button_type_4 tr_delay grey state_2 d_block vc_child t_align_c fs_ex_small " wire:click="previousPage"><i class="fa fa-angle-left d_inline_m"></i></a></li>
    @endif
    <!-- prev end -->

    <!-- numbers -->
    @foreach ($elements as $element)
    {{-- <div class="flex"> --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="m_right_3"><a  class="button_type_4 tr_delay grey state_2 d_block vc_child t_align_c border_black" wire:click="gotoPage({{$page}})"><span class="d_inline_m fs_small">{{$page}}</span></a></li>
        {{-- <li class="mx-2 w-10 px-2 py-1 text-center rounded border shadow bg-blue-500 text-white cursor-pointer" wire:click="gotoPage({{$page}})">{{$page}}</li> --}}
        @else
        <li class="m_right_3"><a  class="button_type_4 tr_delay grey state_2 d_block vc_child t_align_c" wire:click="gotoPage({{$page}})"><span class="d_inline_m fs_small">{{$page}}</span></a></li>
        @endif
        @endforeach
        @endif
    {{-- </div> --}}
    @endforeach
    <!-- end numbers -->


    <!-- next  -->
    @if ($paginator->hasMorePages())
    {{-- <li class="w-16 px-2 py-1 text-center rounded border shadow bg-white cursor-pointer" wire:click="nextPage">Next</li> --}}
    <li class="m_right_3"><a  class="button_type_4 tr_delay grey state_2 d_block vc_child t_align_c fs_ex_small" wire:click="nextPage"><i class="fa fa-angle-right d_inline_m"></i></a></li>

    @else
    <li class="m_right_3"><a  class="button_type_4 tr_delay grey state_2 d_block vc_child t_align_c fs_ex_small  border_black"><i class="fa fa-angle-right d_inline_m"></i></a></li>

    {{-- <li class="w-16 px-2 py-1 text-center rounded border bg-gray-200">Next</li> --}}
    @endif
    <!-- next end -->
</ul>
</nav>
@endif
