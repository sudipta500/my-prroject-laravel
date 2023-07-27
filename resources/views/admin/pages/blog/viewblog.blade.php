@extends('admin.layout')
@section('contain')
    <style>
        .program {
            color: white;
            background: #000;

        }
        .radious{
            border-radius: 10px;
        }
        .java{
            background: #2e2e2e;
        }
        .blog{
            color: #ffff;
        }
        h4,h5 {
            color: #afafaf;
        }
    </style>

    <div class="col-xxl">
        <div class=" mb-4 mx-3">
            <div class="pb-4 ">
                <p class="h2">{{ $blogdetails->Program_name }}</p>
            </div>
            <div class="program radious rounded-md mb-4">
                <div
                    class="flex items-center relative radious text-gray-200 java px-4 py-2 text-xs font-sans justify-between rounded-t-md">
                    <span>Java</span>
                    <button class="flex ml-auto gap-2 float-end">
                        copy
                    </button>
                </div>
                <div class="p-4 overflow-y-auto text-white">
                    <code class="text-white blog">
                        {!! $blogdetails->code !!}
                    </code>
                </div>
            </div>
            @if ($blogdetails->output)
            <div class="program radious rounded-md mb-4">
                <div
                class="flex radious items-center relative text-gray-200 java px-4 py-2 text-xs font-sans justify-between rounded-t-md">
                <span>Output</span>
            </div>
                <div class="px-3 py-2">
                    {!! $blogdetails->output !!}
                </div>
            </div>
            @endif
            <div>
                {!! $blogdetails->explain !!}
            </div>
        </div>
    </div>
@endsection
