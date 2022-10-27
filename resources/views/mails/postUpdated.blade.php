@component('mail::message')
# Modifica contenuti post esistente
 
Sono state eseguite delle modifiche al post {{ $post->title}} in data {{ $post->updated_at }}.

@component('mail::button', ['url' => route('admin.posts.show', $post)])
guarda le modifiche
@endcomponent
 
Thanks,<br>
{{ config('app.name') }}
@endcomponent