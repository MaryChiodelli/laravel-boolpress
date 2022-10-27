@component('mail::message')
# Creato nuovo post
 
Congratulazioni! Un nuovo articolo è stato aggiunto al tuo blog.
 
@component('mail::button', ['url' => route('admin.posts.show', $post)])
vai al post
@endcomponent
 
Thanks,<br>
{{ config('app.name') }}
@endcomponent