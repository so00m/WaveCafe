<x-mail::message>
<div >
   Hello admin ,
<br><br>
</div>
 
<div >
    this is {{$data['full_name']}} 
    <br>
    {{$data['content']}}
</div>
 
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>