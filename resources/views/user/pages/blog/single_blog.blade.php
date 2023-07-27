@extends('user.layout')
@section('contain')
@section('programming-blog')
    active
@endsection
<style>
    .program {
        color: white;
        background: #000;

    }

    .radious {
        border-radius: 10px;
    }

    .java {
        background: #2e2e2e;
    }

    .blog {
        color: #ffff;
    }

    h4,
    h5 {
        color: #afafaf;
    }

    .calender {
        margin-right: 10px;
    }

    hr {
        height: 0;
        margin-top: -0.75em;
        margin-bottom: -1.75em;
    }

    button {
        -moz-appearance: none;
        -webkit-appearance: none;
        appearance: none;
        font-size: 14px;
        padding: 4px 8px;
        color: rgba(0, 0, 0, 0.85);
        background-color: #fff;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-radius: 4px;
    }

    button:hover,
    button:focus,
    button:active {
        cursor: pointer;
        background-color: #ecf0f1;
    }

    .comment-thread {
        width: 100%;
        max-width: 100%;
        margin: auto;
        padding: 0 30px;
        background-color: #fff;
        border: 1px solid transparent;
        /* Removes margin collapse */
    }

    .m-0 {
        margin: 0;
    }

    .sr-only {
        position: absolute;
        left: -10000px;
        top: auto;
        width: 1px;
        height: 1px;
        overflow: hidden;
    }

    /* Comment */

    .comment {
        position: relative;
        margin: 20px auto;
    }

    .comment-heading {
        display: flex;
        align-items: center;
        height: 50px;
        font-size: 14px;
    }

    .comment-voting {
        width: 20px;
        height: 32px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-radius: 4px;
    }

    .comment-voting button {
        display: block;
        width: 100%;
        height: 50%;
        padding: 0;
        border: 0;
        font-size: 10px;
    }

    .comment-info {
        color: rgba(0, 0, 0, 0.5);
        margin-left: 10px;
    }

    .comment-author {
        color: rgba(0, 0, 0, 0.85);
        font-weight: bold;
        text-decoration: none;
    }

    .comment-author:hover {
        text-decoration: underline;
    }

    .replies {
        margin-left: 20px;
    }

    /* Adjustments for the comment border links */

    .comment-border-link {
        display: block;
        position: absolute;
        top: 50px;
        left: 0;
        width: 12px;
        height: calc(100% - 50px);
        border-left: 4px solid transparent;
        border-right: 4px solid transparent;
        background-color: rgba(0, 0, 0, 0.1);
        background-clip: padding-box;
    }

    .comment-border-link:hover {
        background-color: rgba(0, 0, 0, 0.3);
    }

    .comment-body {
        padding: 0 20px;
        padding-left: 28px;
    }

    .replies {
        margin-left: 28px;
    }

    /* Adjustments for toggleable comments */

    details.comment summary {
        position: relative;
        list-style: none;
        cursor: pointer;
    }

    details.comment summary::-webkit-details-marker {
        display: none;
    }

    details.comment:not([open]) .comment-heading {
        border-bottom: 1px solid rgba(0, 0, 0, 0.2);
    }

    .comment-heading::after {
        display: inline-block;
        position: absolute;
        right: 5px;
        align-self: center;
        font-size: 12px;
        color: rgba(0, 0, 0, 0.55);
    }

    details.comment[open] .comment-heading::after {
        content: "Click to hide";
    }

    details.comment:not([open]) .comment-heading::after {
        content: "Click to show";
    }

    /* Adjustment for Internet Explorer */

    @media screen and (-ms-high-contrast: active),
    (-ms-high-contrast: none) {

        /* Resets cursor, and removes prompt text on Internet Explorer */
        .comment-heading {
            cursor: default;
        }

        details.comment[open] .comment-heading::after,
        details.comment:not([open]) .comment-heading::after {
            content: " ";
        }
    }

    /* Styling the reply to comment form */

    .reply-form textarea {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
        font-size: 16px;
        width: 100%;
        max-width: 100%;
        margin-top: 15px;
        margin-bottom: 5px;
    }

    .d-none {
        display: none;
    }

    .form {
        margin-top: 38px;
        width: 70%;
        margin-left: 30px
    }
</style>

<div class="py-50 border">
    <div class="container">
        <!-- Isotope-->
        <div class="isotope">
            <div class=" mb-4 ">
                <div class="pb-4 ">
                    <p class="h2">{{ $blogdetails->Program_name }}</p>
                </div>
                <div class="program radious rounded-md mb-4">
                    <div
                        class="flex items-center relative radious text-gray-200 java px-4 py-2 text-xs font-sans justify-between rounded-t-md">
                        <span>Java</span>
                        {{-- <button class="flex ml-auto gap-2 float-end">
                            copy
                        </button> --}}
                    </div>
                    <div class="p-lg-40 pb-4 overflow-y-auto text-white">
                        <code class="text-white blog">
                            {!! $blogdetails->code !!}
                        </code>
                    </div>
                </div>
                @if ($blogdetails->output)
                    <div class="program radious rounded-md my-10">
                        <div
                            class="flex radious items-center relative text-gray-200 java px-4 py-2 text-xs font-sans justify-between rounded-t-md">
                            <span>Output</span>
                        </div>
                        <div class="px-3 py-2">
                            {!! $blogdetails->output !!}
                        </div>
                    </div>
                @endif
                <div class="pt-10">
                    {!! $blogdetails->explain !!}
                </div>
                <div class="pt-10 d-flex align-items-center justify-content-between">
                    @guest
                        <p style="cursor: pointer"><i
                                class="fa-regular fa-thumbs-up calender"></i>Like({{ $blogdetails->user->count() }})</p>
                    @else
                        <p style="cursor: pointer"
                            onclick="document.getElementById('favorite-form-{{ $blogdetails->id }}').submit();"><i
                                class="{{ Auth::user()->post()->where('blog_id', $blogdetails->id)->count() == 0? 'fa-regular fa-thumbs-up': 'fa-solid fa-thumbs-up' }} calender"></i>Like({{ $blogdetails->user->count() }})
                        </p>
                        <form action="{{ route('post.like', $blogdetails->id) }}" id="favorite-form-{{ $blogdetails->id }}"
                            method="POST" style="display: none">
                            @csrf
                        </form>

                    @endguest
                    <p><i class="fa-regular fa-comment calender"></i>Comment({{ $blogdetails->user_comment->count() }})</p>

                </div>
                <hr>
                {{-- comment pass --}}
                @guest

                @else
                @if (Auth::user()->post_comment()->where('blog_id', $blogdetails->id)->count() < 3)
                <div class=" form">
                    <form action="{{ route('post.comment', $blogdetails->id) }}" method="POST" class="reply-form">
                        @csrf
                        <textarea placeholder="Reply to comment" name="comment" rows="4"></textarea>
                        <button type="submit">Submit</button>
                    </form>
                </div>
                @endif

                @endguest
                <div class="comment-thread mt-10">
                    <!-- Comment 1 start -->
                    @foreach ($comment as $item)
                        <details open class="comment" id="comment-1">
                            <a href="#comment-1" class="comment-border-link">
                                <span class="sr-only">Jump to comment-1</span>
                            </a>
                            <summary>
                                <div class="comment-headin">
                                    <div class="comment-info">
                                        <a href="#" class="comment-author">{{ $item->user->name }}</a>
                                        <p class="m-0" style="font-size: 13px">
                                            {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->creation_date)->isoFormat('MMMM Do YYYY','UTC') }}
                                        </p>
                                    </div>
                                </div>
                            </summary>
                            <div class="comment-body">
                                <p>
                                    {{ $item->comment }}
                                </p>
                        </details>
                    @endforeach
                    <!-- Comment 1 end -->
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
