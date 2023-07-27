@extends('user.layout')
@section('contain')
@section('programming-blog')
    active
@endsection
<style>
    .calender {
        margin-right: 10px;
    }
</style>
<div class="content-wrap border">
    <!-- Page title-->
    <div class="position-relative py-50 d-lg-block d-none">
        <div class="container">
            <h1 class="mb-0 text-center">Our Blog</h1>
        </div>
    </div>
    <div class="pb-130">
        <div class="container">
            <!-- Isotope-->
            <div class="isotope">
                <ul class="nav justify-content-center isotope-filters mb-60">

                    <li class="nav-item @if ($id == 0) active @endif "><a class="nav-link"
                            href="{{ url('/blog') }}" data-filter="all">All</a></li>
                    {{-- @php
                        if ($id==false) {
                           $route = 0;
                        }else{
                            $route = 1;
                        }
                        @endphp --}}
                    @foreach ($program as $item)
                        <li
                            class="nav-item mx-2 @if ($id != 0) @if ($item->id == $id) active @endif  @endif">
                            <a class="nav-link" href="{{ url('blog/view/' . $item->id) }}">{{ $item->program_name }}</a>
                        </li>
                    @endforeach
                    </li>
                </ul>
                <div class="row isotope gy-30">
                    @if ($blog->count() > 0)
                        @foreach ($blog as $blogName)
                            <div class=" isotope-item col-12 col-lg-9 m-auto mt-25 " data-filters="architecture">
                                <!-- Blog-->
                                <div
                                    class="card card-blog  card-vertical card-hover-zoom card-blog-bordered rounded-4 overflow-hidden bg-white">
                                    <div class="card-body pt-40 px-50 text-justify"><a class="card-title res"
                                            href="{{ route('blog.single-view', $blogName->id) }}">{{ $blogName->Program_name }}</a>
                                        <p class="pt-3 cl-text"> <i
                                                class="fas fa-calendar-alt calender"></i>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $blogName->creation_date)->isoFormat('MMMM Do YYYY', 'UTC') }}
                                        </p>
                                        <p class="card-text font-size-14 text-justify ">
                                            {{ Str::limit(strip_tags($blogName->explain), 800) }}...</p>
                                        <a class="btn btn-accent-1 btn-link btn-clean"
                                            href="{{ route('blog.single-view', $blogName->id) }}" target="_self">Learn
                                            more</a>
                                        <div class="pt-10 d-flex align-items-center justify-content-between">
                                            <p class="font-size-14 font-bold"><i
                                                    class="fa fa-thumbs-up calender"></i>Like({{ $blogName->user()->count() }})
                                            </p>
                                            <p class="font-size-14 font-bold"><i
                                                    class="fas fa-comment calender"></i>Comment({{ $blogName->user_comment()->count() }})
                                            </p>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        @endforeach
                    @else
                        <p class="text-center mt-20 h2">Blog Not Found</p>
                    @endif

                </div>
                @if ($blog->count() > 0)
                    <div class="text-center mt-60">
                        {{ $blog->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
</div><!-- Footer-->
@endsection
