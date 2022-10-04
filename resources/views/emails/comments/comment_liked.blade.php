@component('mail::message')
# Introduction

{{ $liker->name }} liked one of your post.

@component('mail::button', ['url' => route('comment.show', $post)])
    View Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
